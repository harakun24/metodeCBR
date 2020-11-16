<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->kucing = new \App\Models\kucingModel();
        $this->ciri = new \App\Models\ciriModel();
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
    public function kucing_edit($id)
    {
        $var = $this->request->getVar();
        $this->kucing->save([
            'kucing_id' => $id,
            'kucing_jenis' => $var['kucing_jenis'],
            'kucing_foto' => $var['kucing_foto'],
            'kucing_deskripsi' => $var['kucing_deskripsi'],
        ]);
        session()->setFlashData('update', true);
        return redirect()->to('/kucing');
    }
    public function kucing_hapus($id)
    {
        $this->kucing->delete($id);
        // dd(true);
        return json_encode(['status' => 200]);
    }
    //end kucing
    public function ciri()
    {
        $current = $this->request->getVar('page_table') ? $this->request->getVar('page_table') : 1;
        $data = [
            'ciri' => $this->ciri->paginate(4, 'table'),
            'pager' => $this->ciri->pager,
            'current' => $current,
        ];
        return view('ciri_list', $data);
    }
    public function ciri_get($id)
    {
        echo json_encode($this->ciri->find($id));
    }
    public function ciri_add()
    {
        $var = $this->request->getVar();
        $c = $this->ciri->where('ciri_ciri', $var['ciri_ciri'])->first();
        if ($c != null) {
            session()->setFlashData('finsert', true);
            return redirect()->to('/kucing');
        }
        $this->ciri->save([
            'ciri_ciri' => $var['ciri_ciri'],
            'ciri_bobot' => $var['ciri_bobot'],
        ]);
        session()->setFlashData('insert', true);
        return redirect()->to('/ciri');
    }
    public function ciri_edit($id)
    {
        $var = $this->request->getVar();
        $this->ciri->save([
            'ciri_id' => $id,
            'ciri_ciri' => $var['ciri_ciri'],
            'ciri_bobot' => $var['ciri_bobot'],
        ]);
        session()->setFlashData('update', true);
        return redirect()->to('/ciri');
    }
    public function ciri_hapus($id)
    {
        $this->ciri->delete($id);
        // dd(true);
        return json_encode(['status' => 200]);
    }
}