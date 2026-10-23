<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginPost()
    {
        $session = session();
        $model = new UserModel();

        $npm = $this->request->getPost('npm');
        $password = $this->request->getPost('password');

        // Cari mahasiswa berdasarkan npm
        $mahasiswa = $model->where('npm', $npm)->first();

        if ($mahasiswa) {

            if ($password === $mahasiswa['password']) {

                // Session tanpa email
                $session->set([
                    'id_mahasiswa' => $mahasiswa['id_mahasiswa'],
                    'npm'          => $mahasiswa['npm'],
                    'logged_in'    => true
                ]);

                return redirect()->to('/dashboard');

            } else {
                $session->setFlashdata('error', 'Kata sandi salah!');
                return redirect()->to('/login');
            }

        } else {
            $session->setFlashdata('error', 'Akun mahasiswa tidak ditemukan!');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth/login');

    
    }

    public function lupa_sandi()
    {
        return view('auth/lupa_sandi'); 
    }
}
