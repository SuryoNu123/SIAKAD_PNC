<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\KRSModel;
use App\Models\JadwalModel;

class KRS extends BaseController
{
    protected $mahasiswaModel;
    protected $krsModel;
    protected $jadwalModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
        $this->krsModel       = new KRSModel();
        $this->jadwalModel    = new JadwalModel();
    }

    public function index()
    {
        $npm = session()->get('npm'); 
        if (!$npm) return redirect()->to('/login');

        $mahasiswa = $this->mahasiswaModel
            ->where('npm', $npm)
            ->first();

        $jadwal = $this->jadwalModel
            ->where('npm', $npm)
            ->findAll();

        $krs = $this->krsModel
            ->where('npm', $npm)
            ->orderBy('id_krs', 'DESC')
            ->findAll();

        $data = [
            'title'     => 'KRS Online',
            'mahasiswa' => $mahasiswa,
            'jadwal'    => $jadwal,
            'krs'       => $krs
        ];

        return view('krs/index', $data);
    }

    public function save()
    {
        $npm = session()->get('npm'); 

        $matkulDipilih = $this->request->getPost('matkul');

        if (!$matkulDipilih) {
            return redirect()->back()->with('error', 'Anda belum memilih mata kuliah.');
        }

        foreach ($matkulDipilih as $matkul) {
            $this->krsModel->insert([
                'npm'           => $npm,
                'mk'            => $matkul,
                'semester'      => 6,
                'tahun_ajaran'  => '2023/2024',
                'status'        => 'Pending',
                'dosen'         => 'Nur Wahyu Rahadi, S.Kom, M.Eng.',
                'foto_dosen'   => 'Desain tanpa judul (7) 1.png'
            ]);
        }

        return redirect()->to('/krs/success');
    }

    public function success()
    {
        $npm = session()->get('npm'); 
        if (!$npm) return redirect()->to('/login');

        $mahasiswa = $this->mahasiswaModel
            ->where('npm', $npm)
            ->first();

        $jadwal = $this->jadwalModel
            ->where('npm', $npm)
            ->findAll();

        $krs = $this->krsModel
            ->where('npm', $npm)
            ->orderBy('id_krs', 'DESC')
            ->findAll();

        $data = [
            'title'     => 'KRS Online',
            'mahasiswa' => $mahasiswa,
            'jadwal'    => $jadwal,
            'krs'       => $krs
        ];

        return view('krs/save', $data);
    }
}
