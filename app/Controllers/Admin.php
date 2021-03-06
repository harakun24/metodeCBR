<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->kucing = new \App\Models\kucingModel();
        $this->ciri = new \App\Models\ciriModel();
        $this->hub = new \App\Models\hubModel();
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
    //hub

    public function hub()
    {
        $data = [
            'kucing' => $this->kucing->findAll(),
            'ciri' => $this->ciri->findAll()
        ];
        return view('hub_list', $data);
    }

    public function hub_cat($id)
    {
        $res = $this->hub->where("hub_kucing", $id)->findAll();
        $j = 0;
        foreach ($res as $r)
            $j++;
        for ($i = 0; $i < $j; $i++) {
            $temp = $this->ciri->find($res[$i]['hub_ciri']);
            $res[$i]['ciri_nama'] = $temp['ciri_ciri'];
        }
        echo json_encode($res);
    }

    public function hub_get($id)
    {
        $res = $this->hub->find($id);
        $j = 0;
        foreach ($res as $r)
            $j++;
        $temp = $this->kucing->find($res['hub_kucing']);
        $res['kucing_jenis'] = $temp['kucing_jenis'];
        $temp = $this->ciri->find($res['hub_ciri']);
        $res['ciri_ciri'] = $temp['ciri_ciri'];
        echo json_encode($res);
    }
    public function hub_add()
    {
        $this->session->set('');
        $var = $this->request->getVar();
        $c = $this->hub->where([
            'hub_ciri' => $var['hub_ciri'],
            'hub_kucing' => $var['hub_kucing'],
        ])->first();
        if ($c != null) {
            session()->setFlashData('finsert', true);
            return redirect()->to('/hub');
        }

        $this->hub->save([
            'hub_kucing' => $var['hub_kucing'],
            'hub_ciri' => $var['hub_ciri'],
        ]);
        session()->setFlashData('insert', true);
        return redirect()->to('/hub');
    }
    public function hub_edit($id)
    {
        $var = $this->request->getVar();
        $this->hub->save([
            'hub_id' => $id,
            'hub_ciri' => $var['hub_ciri'],
            'hub_kucing' => $var['hub_kucing'],
        ]);
        session()->setFlashData('update', true);
        return redirect()->to('/hub');
    }
    public function hub_hapus($id)
    {
        $this->hub->delete($id);
        // dd(true);
        return json_encode(['status' => 200]);
    }

    //metode
    public function cbr($arr)
    {
        $arrhasil = [];
        $fhasil = 0.00;
        $r = str_split($arr);
        $cat = $this->kucing->findAll();
        $ciri = $this->ciri->findAll();
        $tmp = [];
        $o = 0;
        foreach ($r as $rr)
            $o++;
        for ($i = 0; $i < $o; $i++) {
            $temp[$i] = [
                'name' => $ciri[$i]['ciri_id'],
                'bobot' => $ciri[$i]['ciri_bobot'],
                'status' => $r[$i],
            ];
        }
        foreach ($cat as $c) {
            $temp2 = [];
            $hub = $this->hub->where('hub_kucing', $c['kucing_id'])->findAll();
            $total = 0;
            $ciriAll = 0;
            foreach ($hub as $h) {
                foreach ($temp as $t) {
                    if ($t['name'] == $h['hub_ciri'] && $t['status'] == 1) {
                        $s = true;
                        foreach ($temp2 as $t2) {
                            if ($t2['name'] == $t['name'])
                                $s = false;
                        }
                        if ($s) {
                            // d([
                            //     'c' => $c['kucing_jenis'],
                            //     't' => $t['name'],
                            //     'h' => $h['hub_ciri'],
                            // ]);
                            array_push($temp2, [
                                'name' => $t['name'],
                                'bobot' => $t['bobot'],
                            ]);
                        }
                    }
                }
                $ciriH = $this->ciri->find($h['hub_ciri']);
                $ciriAll += $ciriH['ciri_bobot'];
            }
            foreach ($temp2 as $te) {
                $total += $te['bobot'];
            }
            // foreach ($temp as $te) {
            //     $ciriAll += $te['bobot'];
            // }
            // d($temp2);
            // d($total);
            $hasil = round(($total / $ciriAll), 5);
            array_push($arrhasil, [
                'kucing' => $c['kucing_jenis'],
                'foto' => $c['kucing_foto'],
                'deskripsi' => $c['kucing_deskripsi'],
                'hasil' => $hasil
            ]);
            array_push($tmp, [
                'kucing' => $c['kucing_jenis'],
                'data' => $temp2,
                'total' => $total,
                'all' => $ciriAll,
                'hasil' => $hasil,
            ]);
            $fhasil = $hasil > $fhasil ? $hasil : $fhasil;
        }
        // echo "hai";
        // d($fhasil);
        // d($tmp);
        // d($arrhasil);
        $data = [
            'fhasil' => $fhasil,
            'tmp' => $tmp,
            'arrhasil' => $arrhasil
        ];
        return view('cbr_hasil', $data);
    }
    public function input_cbr()
    {
        $data = [
            'ciri' => $this->ciri->findAll()
        ];
        return view('cbr_form', $data);
    }
}