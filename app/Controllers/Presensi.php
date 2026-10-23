<?php

namespace App\Controllers;

use App\Models\PresensiModel;
use App\Models\JadwalModel;
use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class Presensi extends Controller
{
    protected $presensiModel;
    protected $jadwalModel;
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->presensiModel  = new PresensiModel();
        $this->jadwalModel    = new JadwalModel();
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {
        $npm = session()->get('npm');

        $mahasiswa = $this->mahasiswaModel
            ->where('npm', $npm)    
            ->first();

        if (!$mahasiswa) {
            return "Data mahasiswa tidak ditemukan";
        }

        $today = date('l');

        $jadwalHariIni = $this->jadwalModel
            ->where('hari', $today)
            ->orderBy('jam_mulai', 'ASC')
            ->findAll();

        $presensi = $this->presensiModel
            ->where('npm', $npm)
            ->where('tanggal', date('Y-m-d'))
            ->findAll();


        $presensiHariIni = [];
        foreach ($jadwalHariIni as $j) {
            $status = 'belum';

            foreach ($presensi as $p) {
                if ($p['id_jadwal'] == $j['id_jadwal']) {
                    $status = 'present';
                    break;
                }
            }

            $presensiHariIni[] = [
                'id_jadwal'   => $j['id_jadwal'],
                'nama_matkul' => $j['mata_kuliah'],
                'kode'        => $j['kode'] ?? '', 
                'ruangan'     => $j['ruangan'],
                'jam_mulai'   => $j['jam_mulai'],
                'pertemuan_ke'=> 1,
                'status'      => $status
            ];
        }

        $presentasi = $this->presensiModel->presentasiKehadiran($npm);

        $data = [
            'title'            => 'Presensi',
            'mahasiswa'        => $this->mahasiswaModel->where('npm',$npm)->first(),
            'presentasi'       => $presentasi,
            'presensiHariIni'  => $presensiHariIni,
            'jadwalHariIni'    => $jadwalHariIni
        ];

        return view('presensi/index', $data);
    }

    public function absen()
    {
        $presensiModel = new PresensiModel();

        $data = [
            'npm' => session()->get('npm'),
            'id_jadwal'    => $this->request->getPost('id_jadwal'),
            'pertemuan_ke' => $this->request->getPost('pertemuan_ke'),
            'tanggal'      => date('Y-m-d'),
            'waktu_masuk'  => date('H:i:s'),
            'status'       => 'present'
        ];

        $cek = $presensiModel->where([
            'npm' => session()->get('npm'),
            'id_jadwal'    => $data['id_jadwal'],
            'tanggal'      => $data['tanggal']
        ])->first();

        if (!$cek) {
            $presensiModel->insert($data);
        }

        return redirect()->to('/presensi');
    }

}
