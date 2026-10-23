<?php

namespace App\Controllers;

use App\Models\TugasakhirModel;
use App\Models\MahasiswaModel;

class Tugasakhir extends BaseController
{
    protected $tugasAkhirModel;
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->tugasAkhirModel = new TugasakhirModel();
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        $npm = session()->get('npm'); 
        if (!$npm) return redirect()->to('/login');

        $mahasiswa = $this->mahasiswaModel
            ->where('npm', $npm)
            ->first(); 

        $data = [
            'mahasiswa' => $mahasiswa,  
            'ipk' => 3.85,
            'total_sks' => '124/144',
            'semester' => '7th',
            'progress_ta' => 65,

            'judul' => 'Machine Learning Application for Student Performance Prediction',
            'dosen' => 'Fajar Mahardika, S.Kom., M.Kom.',
            'mulai' => 'Sep 2024',

            'timeline' => [
                ['title' => 'Pengajuan Judul', 'status' => 'Completed', 'date' => 'August 23, 2024', 'done' => true],
                ['title' => 'Advisor Assignment', 'status' => 'Completed', 'date' => 'September 03, 2024', 'done' => true],
                ['title' => 'Riset dan Penulisan', 'status' => 'In Progress - 65% complete', 'done' => false],
                ['title' => 'Seminar Proposal', 'status' => 'Scheduled for Dec 2024', 'done' => false],
                ['title' => 'Sidang Tugas Akhir', 'status' => 'Pending completion', 'done' => false],
            ],

            'catatan' => [
                [
                    'tanggal' => '5 Oktober 2025',
                    'judul' => 'Literature Review Progress',
                    'isi' => 'Lebih diperbaiki dari tata bahasa pada BAB 2, masih terdapat kalimat yang tidak memenuhi EYD.'
                ],
                [
                    'tanggal' => '24 September 2025',
                    'judul' => 'Perbaikan Metodologi Penelitian',
                    'isi' => 'Metodologi yang anda tidak masuk akal, gunakan metodologi yang selayaknya dapat anda implementasikan.'
                ]
            ],

            'notif' => [
                ['judul' => 'Pengunduran Jadwal Bimbingan', 'waktu' => '2 hours ago'],
                ['judul' => 'Revisi Tugas Akhir', 'waktu' => '3 days ago'],
                ['judul' => 'Thesis Meeting (10:00 AM)', 'waktu' => '2 days ago'],
            ]
        ];

        return view('tugasakhir/index', $data);
    }
}
