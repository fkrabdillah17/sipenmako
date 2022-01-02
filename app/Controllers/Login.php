<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AkunModel;

class Login extends Controller
{
    protected $akunModel;
    public function __construct()
    {
        $this->akunModel = new AkunModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('pages/login/index', $data);
    }

    public function auth()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->akunModel->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'username'     => $data['username'],
                    'password'    => $data['password'],
                    'role_id' => $data['role_id'],
                    'proyek' => $data['proyek'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/beranda');
            } else {
                $session->setFlashdata('pesan', 'Kata Sandi Anda Salah');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('pesan', 'Nama Pengguna Tidak Terdaftar');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
