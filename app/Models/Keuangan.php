<?php

namespace App\Controllers;

use App\Models\KeuanganModel;
use App\Models\MahasiswaModel;

class Keuangan extends BaseController
{
    protected $keuanganModel;
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->keuanganModel = new KeuanganModel();
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {

        $npm = session()->get('npm');
        if (!$npm) return redirect()->to('/login');

        $mahasiswa = $this->mahasiswaModel
            ->where('npm', $npm)
            ->first();

        $summary = $this->keuanganModel
            ->select('total_balance, outstanding, paid_this_semester, percent_change, percent_completed')
            ->where('npm', $npm)
            ->orderBy('id', 'DESC')
            ->first();

        $tagihan = $this->keuanganModel
            ->where('npm', $npm)
            ->where('status_tagihan', 'Unpaid') // ambil semua tagihan belum dibayar
            ->findAll();

        $riwayat = $this->keuanganModel
            ->where('npm', $npm)
            ->where('status_tagihan', 'Paid')
            ->orderBy('tanggal_bayar', 'DESC')
            ->findAll();

        $metode = $this->keuanganModel
            ->select('metode_pembayaran, deskripsi_metode')
            ->where('npm', $npm)
            ->findAll();

        $tagihan_single = $tagihan ? $tagihan[0] : null;

        $data = [
            'title'     => 'Keuangan Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'summary'   => $summary,
            'tagihan'   => $tagihan,
            'tagihan_single' => $tagihan_single, // INI BARU
            'riwayat'   => $riwayat,
            'metode'    => $metode
        ];

        return view('keuangan/index', $data);
    }

    public function uploadBukti(){

    $npm = session()->get('npm');
    if (!$npm) return redirect()->to('/login');

    $file = $this->request->getFile('bukti');

    if ($file && $file->isValid()) {

        $newName = $file->getRandomName();
        $file->move('uploads/bukti/', $newName);

        $jumlah = $this->request->getPost('jumlah_tagihan');

        $this->keuanganModel
            ->where('npm', $npm)
            ->where('status_tagihan', 'Unpaid')
            ->set([
                'status_tagihan'        => 'Paid',
                'status_pembayaran'     => 'Completed',
                'jumlah_pembayaran'     => $jumlah,
                'tanggal_bayar'         => date('Y-m-d'),
                'keterangan_pembayaran' => 'Upload bukti pembayaran',
                'deskripsi_metode'      => $newName
            ])
            ->update();

        return redirect()->to('/keuangan')->with('success', 'Bukti pembayaran berhasil diupload!');
    }

    return redirect()->back()->with('error', 'Gagal upload bukti pembayaran!');
    }

    public function detail($id){
        $npm = session()->get('npm');
        if (!$npm) return redirect()->to('/login');

        $tagihan = $this->keuanganModel
                        ->where('id', $id)
                        ->where('npm', $npm)
                        ->first();

        if (!$tagihan) {
            return redirect()->to('/keuangan')->with('error', 'Tagihan tidak ditemukan.');
        }

        return view('keuangan/detail', [
            'title' => 'Detail Pembayaran',
            'tagihan' => $tagihan
        ]);
    }

}
