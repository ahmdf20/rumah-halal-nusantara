<?php

namespace App\Controllers;

use App\Models\Sertifikasi;
use CodeIgniter\RESTful\ResourceController;

class SertifikasiController extends ResourceController
{
    protected $Sertifikasi;
    public function __construct()
    {
        helper(['form']);
        $this->Sertifikasi = new Sertifikasi();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        return view('sertifikasi/tambah', [
            'title' => 'Tambah Data Sertifikasi',
        ]);
    }

    public function detail($id = null)
    {
        return view('sertifikasi/detail', [
            'title' => 'Detail Data Sertifikasi',
            'sertif' => $this->Sertifikasi->where('id', $id)->first(),
        ]);
    }

    public function edit($id = null)
    {
        return view('sertifikasi/edit', [
            'title' => 'Tambah Data Sertifikasi',
            'sertif' => $this->Sertifikasi->where('id', $id)->first(),
        ]);
    }

    public function tambah()
    {
        $validate = $this->validate([
            'nama_umkm' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'nama_produk' => 'required',
            'keterangan' => 'required',
        ]);

        if (!$validate) {
            return redirect()->to(previous_url())->with('alert', $this->validator->listErrors())->withInput();
        }

        $data = [
            'nama_umkm' => $this->request->getPost('nama_umkm'),
            'alamat' => $this->request->getPost('alamat'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'nama_produk' => $this->request->getPost('nama_produkm'),
            'sertifikat' => $this->request->getPost('sertifikat'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->Sertifikasi->insert($data);
        return redirect()->to('/sertifikasi')->with('alert', 'Berhasil menambahkan sertifikasi baru');
    }

    public function import()
    {
        // Check if the file was uploaded successfully
        if ($this->request->getFile('csv')->isValid()) {
            // Get the uploaded file
            $file = $this->request->getFile('csv');
            var_dump($file);

            // Load the model
            $model = new Sertifikasi(); // Replace YourModel with the actual model name you want to use

            // Read the CSV file and import data
            if ($file->getExtension() === 'csv') {
                $handle = fopen($file->getTempName(), 'r');
                var_dump($handle);
                // Assuming the CSV file has a header row, we skip the first row
                $header = fgetcsv($handle);

                while (($row = fgetcsv($handle)) !== false) {
                    $data = array_combine($header, $row);
                    var_dump($data);
                    $model->insert($data);
                }

                fclose($handle);

                return redirect()->to(base_url('sertifikasi/tambah'))->with('alert', 'Data imported successfully.');
            } else {
                return redirect()->to(base_url('sertifikasi/tambah'))->with('alert', 'Invalid file type. Only CSV files are allowed.');
            }
        } else {
            return redirect()->to(base_url('sertifikasi/tambah'))->with('alert', 'File upload failed.');
        }
    }

    public function update($id = null)
    {
        $validate = $this->validate([
            'nama_umkm' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'nama_produk' => 'required',
            'keterangan' => 'required',
        ]);

        if (!$validate) {
            return redirect()->to(previous_url())->with('alert', $this->validator->listErrors())->withInput();
        }

        $data = [
            'nama_umkm' => $this->request->getPost('nama_umkm'),
            'alamat' => $this->request->getPost('alamat'),
            'kode_pos' => $this->request->getPost('kode_pos'),
            'nama_produk' => $this->request->getPost('nama_produkm'),
            'sertifikat' => $this->request->getPost('sertifikat'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->Sertifikasi->update($id, $data);
        return redirect()->to('/sertifikasi')->with('alert', 'Berhasil mengubah data sertifikasi');
    }

    public function delete($id = null)
    {
        $this->Sertifikasi->delete($id);
        return redirect()->to('/sertifikasi')->with('alert', 'Berhasil menghapus data sertifikasi');
    }
}
