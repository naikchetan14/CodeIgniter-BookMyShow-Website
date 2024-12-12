<?php

namespace App\Controllers;

use App\Models\MovieModel;

class Home extends BaseController
{
    protected $movieModel;
    public function __construct()
    {
        $this->movieModel = new MovieModel();
    }
    public function index(): string
    {
        $data = $this->movieModel->AllMovies();
        log_message("info", "data array" . json_encode($data));
        return view('pages/home', ['data' => $data]);
    }

    public function getimg($imagename)
    {
        $filepath = WRITEPATH . 'uploads/' . $imagename;
        if (file_exists($filepath)) {
            $fileinfo = mime_content_type($filepath);
            header('Content-Type: ' . $fileinfo);
            readfile($filepath);
            exit; // Ensure no further output is sent
        } else {
            // Handle the case where the file does not exist
            echo 'File not found.';
        }
    }
    public function logoutUser()
    {
        log_message('info','Running');
        if (session()->get('Roles') === 'admin') {
            session()->remove('isLoggedIn');
            session()->destroy();
            return redirect()->to(base_url('admin/signin'));
        } else if (session()->get('Roles') === 'user') {
            session()->remove('isLoggedIn');
            session()->destroy();
            return redirect()->to(base_url('/signin'));
        }
    }
}
