<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class Profile extends BaseController
{
    protected $profileModel;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
    }

    // default: redirect ke mahasiswa pertama
    public function default()
    {
        $mahasiswa = $this->profileModel->first();
        if (!$mahasiswa) {
            return "Tidak ada data mahasiswa.";
        }

        return redirect()->to('/profile/' . $mahasiswa['npm']);
    }

    // tampil profile
    public function index($npm)
    {
        $data['mahasiswa'] = $this->profileModel->find($npm);
        if (!$data['mahasiswa']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mahasiswa dengan NPM $npm tidak ditemukan");
        }

        return view('profile/index', $data);
    }

    // edit profile (hanya kontak & lainnya)
    public function edit($npm)
    {
        $data['mahasiswa'] = $this->profileModel->find($npm);
        if (!$data['mahasiswa']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data mahasiswa tidak ditemukan");
        }

        return view('profile/edit', $data);
    }

    // update profile
    public function update($npm)
    {
        $this->profileModel->update($npm, $this->request->getPost());

        return redirect()->to('/profile/' . $npm)
            ->with('success', 'Profil berhasil diperbarui!');
    }
}
