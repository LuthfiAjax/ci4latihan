<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function index()
    {
        $data['products'] = $this->model->findAll();
        return view('welcome_message', $data);
    }

    public function create()
    {
        $data = [
            'nama_product' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
        ];

        $this->model->insert($data);

        return redirect()->to(base_url(''))->with('success', 'Data produk berhasil ditambahkan.');
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        
        $data = [
            'nama_product' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
        ];

        $this->model->where('id_product', $id)->set($data)->update();

        return redirect()->to(base_url())->with('success', 'Data produk berhasil diperbarui.');
    }
 
    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to(base_url())->with('success', 'Data produk berhasil dihapus.');
    }

}
