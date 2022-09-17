<?php

namespace App\Controllers;

use App\Models\VideoModel;

class Video extends BaseController
{
    function __construct()
    {
        $this->videoModel = new VideoModel();
    }

    public function index()
    {
        $rules = [
            'judul' => 'required',
            'video' => 'required'
        ];
        if (!$this->validate($rules)) {
            $video = $this->videoModel->getAll();
            $data = [
                'title' => 'Video',
                'video' => $video,
                'total' => count($video),
            ];
            return view('video/index', $data);
        } else {
            $id_video = $this->request->getVar('id_video');
            $data = [
                'judul' => $this->request->getVar('judul'),
                'video' => $this->request->getVar('video'),
            ];
            if ($id_video) {
                $this->videoModel->update($id_video, $data);
                session()->setFlashdata('success', 'Data Berhasil Diubah');
            } else {
                $this->videoModel->insert($data);
                session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
            }
            return redirect()->to('/video');
        }
    }

    public function hapus($id_video)
    {
        $this->videoModel->where('id_video', $id_video)->delete();
        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/video');
    }
}
