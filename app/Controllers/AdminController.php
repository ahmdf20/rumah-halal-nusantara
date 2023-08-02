<?php

namespace App\Controllers;

use App\Models\Sertifikasi;
use App\Models\User;
use CodeIgniter\RESTful\ResourceController;

class AdminController extends ResourceController
{
    protected $Sertifikasi;
    protected $auth;
    protected $User;

    public function __construct()
    {
        $this->User = new User();
        $this->Sertifikasi = new Sertifikasi();
        $this->auth = $this->User->where('email', session()->get('email'))->first();
        // var_dump($this->auth);
        // die();
    }

    public function index()
    {
        return view('admin/index', [
            'title' => 'Dashboard Admin',
            'sertif' => $this->Sertifikasi->findAll(),
            'auth' => $this->auth,
        ]);
    }

    public function user()
    {
        return view('user/index', [
            'title' => 'List Akun Admin',
            'akun' => $this->User->findAll(),
            'auth' => $this->auth
        ]);
    }

    public function sertifikasi()
    {
        return view('sertifikasi/index', [
            'title' => 'Sertifikasi',
            'sertifikasi' => $this->Sertifikasi->orderBy('id', 'desc')->findAll(),
            'auth' => $this->auth,
        ]);
    }

    public function profile()
    {
        return view('user/profile', [
            'title' => 'My Profile',
            'auth' => $this->auth,
        ]);
    }

    public function editProfile($id = null)
    {
        return view('user/edit-profile', [
            'title' => 'Edit Profile',
            'auth' => $this->auth
        ]);
    }

    public function updateProfile($id = null)
    {
        $validate = $this->validate([
            'nama' => 'required',
            'email' => 'required|valid_email'
        ]);

        if (!$validate) {
            return redirect()->to(previous_url())->with('alert', $this->validator->listErrors())->withInput();
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email')
        ];

        $this->User->update($id, $data);
        return redirect()->to("/profile/$id")->with('alert', 'Berhasil mengupdate profile!');
    }
}
