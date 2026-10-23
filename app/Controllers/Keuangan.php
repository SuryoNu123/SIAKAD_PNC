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
            ->where('status_tagihan', 'Unpaid')
            ->findAll();

        $riwayat = $this->keuanganModel
            ->where('npm', $npm)
            ->where('status_pembayaran', 'Completed')
            ->orderBy('tanggal_bayar', 'DESC')
            ->findAll();

        $metode = $this->keuanganModel
            ->select('metode_pembayaran, deskripsi_metode')
            ->where('npm', $npm)
            ->findAll();

        $data = [
            'title'     => 'Keuangan Mahasiswa',
            'mahasiswa' => $mahasiswa,
            'summary'   => $summary,
            'tagihan'   => $tagihan,
            'riwayat'   => $riwayat,
            'metode'    => $metode
        ];

        return view('keuangan/index', $data);
    }
}
