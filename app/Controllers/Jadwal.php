<?php

namespace App\Controllers;

use App\Models\JadwalKuliahModel;
use App\Models\MahasiswaModel;

class Jadwal extends BaseController
{
    protected $jadwalModel;
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalKuliahModel(); 
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        $npm = session()->get('npm');
        if (!$npm) return redirect()->to('/login');

        $hariIni = date('l');

        $data['jadwal'] = $this->jadwalModel
            ->where('hari', $hariIni)
            ->where('npm', $npm)
            ->findAll();

        $data['mahasiswa'] = $this->mahasiswaModel
            ->where('npm', $npm)
            ->first();

        return view('jadwal/index', $data);
    }

    public function week()
    {
        $npm = session()->get('npm');
        if (!$npm) return redirect()->to('/login');

        $mahasiswa = $this->mahasiswaModel
            ->where('npm', $npm)
            ->first();

        if (!$mahasiswa) return "Data mahasiswa tidak ditemukan.";

        $jadwal = $this->jadwalModel
            ->where('npm', $npm)
            ->findAll();

        $data = [
            'mahasiswa'        => $mahasiswa,
            'jadwal_mingguan'  => $jadwal
        ];

        return view('jadwal/week', $data);
    }
}
