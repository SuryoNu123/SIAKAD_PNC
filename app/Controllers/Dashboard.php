<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\JadwalModel;
use App\Models\PengumumanModel;

class Dashboard extends BaseController
{
    protected $mahasiswaModel;
    protected $jadwalModel;
    protected $pengumumanModel;

    public function __construct()
    {
        $this->mahasiswaModel  = new MahasiswaModel();
        $this->jadwalModel     = new JadwalModel();
        $this->pengumumanModel = new PengumumanModel();
    }

    public function index(): string
    {
        // Ambil data mahasiswa
        $npm = session()->get('npm'); 
        $mahasiswa = $this->mahasiswaModel->where('npm', $npm)->first();

        if (!$mahasiswa) {
            return "Data mahasiswa tidak ditemukan";
        }

        // Ambil jadwal berdasarkan mahasiswa & hari sekarang
        $jadwal = $this->jadwalModel
            ->where('npm', $mahasiswa['npm'])
            ->where('hari', date('l'))
            ->findAll();

        // Ambil semua pengumuman terbaru
        $pengumuman = $this->pengumumanModel
            ->orderBy('tanggal', 'DESC')
            ->findAll();

        // Data yang dikirim ke view
        $data = [
            'title'       => 'Dashboard',
            'mahasiswa'   => $mahasiswa,
            'jadwal'      => $jadwal,
            'pengumuman'  => $pengumuman,
            'tanggal'     => date('l, j F Y')
        ];

        return view('dashboard_view', $data);
    }
}
