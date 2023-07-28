<?php

namespace App\Controllers;

use App\Models\Sertifikasi;
use CodeIgniter\RESTful\ResourceController;

class AdminController extends ResourceController
{
    protected $Sertifikasi;

    public function __construct()
    {
        $this->Sertifikasi = new Sertifikasi();
    }

    public function index()
    {
        return view('admin/index', [
            'title' => 'Dashboard Admin',
            'sertif' => $this->Sertifikasi->findAll(),
        ]);
    }

    public function sertifikasi()
    {
        return view('sertifikasi/index', [
            'title' => 'Sertifikasi',
            'sertifikasi' => $this->Sertifikasi->orderBy('id', 'desc')->findAll(),
        ]);
    }
}
