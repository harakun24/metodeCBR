<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->kucing = new \App\Models\kucingModel();
    }
    public function index()
    {
        return view('homepage.php');
    }
    public function kucing()
    {
        $current = $this->request->getVar('page_table') ? $this->request->getVar('page_table') : 1;
        $data = [
            'kucing' => $this->kucing->paginate(4, 'table'),
            'pager' => $this->kucing->pager,
            'current' => $current,
        ];
        return view('kucing_list', $data);
    }
    public function kucing_get($id)
    {
        echo json_encode($this->kucing->find($id));
    }
    public function kucing_add()
    {
        $var = $this->request->getVar();
        $c = $this->kucing->where('kucing_jenis', $var['kucing_jenis'])->first();
        if ($c != null) {
            session()->setFlashData('finsert', true);
            return redirect()->to('/kucing');
        }
        $this->kucing->save([
            'kucing_jenis' => $var['kucing_jenis'],
            'kucing_foto' => $var['kucing_foto'],
            'kucing_deskripsi' => $var['kucing_deskripsi'],
        ]);
        session()->setFlashData('insert', true);
        return redirect()->to('/kucing');
    }
    public function kucing_hapus($id)
    {
        $this->kucing->delete($id);
        // dd(true);
        return json_encode(['status' => 200]);
    }
}