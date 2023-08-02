<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\RESTful\ResourceController;

class UserController extends ResourceController
{
    protected $User;
    protected $auth;

    public function __construct()
    {
        $this->User = new User();
        $this->auth = $this->User->where('email', session()->get('email'))->first();
    }

    public function tambah()
    {
        return view('user/tambah', [
            'title' => 'Tambah Akun Admin',
            'auth' => $this->auth,
        ]);
    }

    public function store()
    {
        $validate = $this->validate([
            'nama' => 'required',
            'email' => 'required|is_unique[users.email]',
            'password' => 'required|min_length[4]',
        ]);

        if (!$validate) {
            return redirect()->to(previous_url())->with('alert', $this->validator->listErrors())->withInput();
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => md5($this->request->getPost('password')),
        ];

        $this->User->insert($data);
        return redirect()->to('/user')->with('alert', 'Berhasil menambah akun baru');
    }

    public function ubahPassword($id = null)
    {
        return view('user/ubah-password', [
            'title' => 'Ubah Password admin',
            'auth' => $this->auth,
            'user' => $this->User->where('id', $id)->first()
        ]);
    }

    public function passwordBerubah($id = null)
    {
        $user = $this->User->where('id', $id)->first();
        $validate = $this->validate([
            'password' => 'required|min_length[4]',
            'repeat_password' => 'required|matches[password]',
        ]);

        if (!$validate) {
            return redirect()->to(previous_url())->with('alert', $this->validator->listErrors())->withInput();
        }

        if ($id != $this->auth['id']) {
            $data = [
                'password' => md5($this->request->getPost('password')),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        } else {
            if ($user['password'] != md5($this->request->getPost('old-password'))) {
                return redirect()->to(previous_url())->with('alert', 'Password lama yang diinputkan tidak sama');
            }
            $data = [
                'password' => md5($this->request->getPost('password')),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }


        $this->User->update($id, $data);
        return redirect()->to($this->auth['id'] == $user['id'] ? '/profile/' . $this->auth['id'] : '/user')->with('alert', 'Berhasil mengubah password!');
    }
}
