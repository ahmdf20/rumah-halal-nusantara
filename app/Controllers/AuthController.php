<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;

class AuthController extends ResourceController
{
    protected $session;
    protected $User;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->User = new User();
    }

    public function index()
    {
        return view('auth/login', [
            'title' => 'Masuk Terlebih Dahulu',
        ]);
    }

    public function credentials()
    {
        $validate = $this->validate([
            'email' => 'required',
            'password' => 'required|min_length[6]'
        ]);
        if (!$validate) {
            $this->session->setFlashdata("alert", $this->validator->listErrors());
            return redirect()->to('/')->withInput();
        }
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $this->User->where('email', $email)->first();
        if (!$user) {
            $this->session->setFlashdata('alert', 'User tidak ditemukan!');
            return redirect()->to('/');
        }
        if (md5($password) != $user['password']) {
            $this->session->setFlashdata('alert', 'Credentials is Invalid!');
            return redirect()->to('/');
        }
        $this->session->setFlashdata('alert', "Selamat datang " . $user['nama']);
        $this->session->set([
            'id' => $user['id'],
            'nama' => $user['nama'],
            'email' => $user['email'],
        ]);
        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('alert', 'Berhasil Logout!');
    }
}
