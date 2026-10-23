<?php

namespace App\Controllers;

use App\Models\SuratModel;
use App\Models\MahasiswaModel;

class Surat extends BaseController
{
    protected $suratModel;
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->suratModel = new SuratModel();
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        $npm = session()->get('npm'); 
        if (!$npm) return redirect()->to('/login');

        $mahasiswa = $this->mahasiswaModel
            ->where('npm', $npm)
            ->first();

        $requests = $this->suratModel
            ->where('npm', $npm)
            ->orderBy('id_surat', 'DESC')
            ->findAll();

        $notifications = [
            [
                'pesan'         => 'Pengajuan surat sedang diproses',
                'keterangan'    => 'Harap tunggu konfirmasi dari BAAP'
            ]
        ];

        $data = [
            'title'         => 'Surat & Pengajuan',
            'mahasiswa'     => $mahasiswa,     
            'requests'      => $requests,
            'notifications' => $notifications
        ];

        return view('surat/index', $data);
    }
}
