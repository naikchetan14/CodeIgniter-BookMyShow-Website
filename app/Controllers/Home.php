<?php

namespace App\Controllers;

use App\Models\MovieModel;
use App\Models\UserTracking\UserTrackingModel;

class Home extends BaseController
{
    protected $movieModel;
    protected $userTrackingModel;
    public function __construct()
    {
        $this->movieModel = new MovieModel();
        $this->userTrackingModel = new UserTrackingModel();
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
     // Set the timezone to Indian Standard Time
    date_default_timezone_set('Asia/Kolkata');
    $userID = session()->get('userID');

    // Update the logout time in the user_sessions table
    if ($userID && session()->get('Roles') === 'user') {
        $this->userTrackingModel->updateLogoutTime($userID, date('Y-m-d H:i:s')); // Current date and time in IST
    }

        session()->remove('isLoggedIn');
        session()->destroy();
        return redirect()->to(base_url('/'));

    }
}
