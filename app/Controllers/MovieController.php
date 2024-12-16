<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\MovieModel;
use App\Models\User\User\UserModel;
use CodeIgniter\Files\File;

class MovieController extends BaseController
{
    protected $movieModel;
    protected $bookingModel;
    protected $userModel;
    public function __construct()
    {
        $this->movieModel = new MovieModel();
        $this->bookingModel = new BookingModel();
        $this->userModel = new UserModel();
    }


    public function getMoviesDetails($id)
    {
        $movieDetails = $this->movieModel->getMovieDetails($id);
        return view('pages/moviedetails', ['movieDetails' => $movieDetails]);
    }

    public function updateMovieView($id)
    {
        $movieDetails = $this->movieModel->getMovieDetails($id);
        return view('pages/updatemovie', ['movieDetails' => $movieDetails]);
    }

    public function addMovieView()
    {
        return view('pages/addmovie');
    }

    public function adminView()
    {
        $data = $this->movieModel->AllMovies();
        log_message("info", "data array" . json_encode($data));
        return view('pages/admincard', ['data' => $data]);
    }

    public function getMovieDetailsById($id) {}

    public function getBookMyShowView($id)
    {
        $movieDetails = $this->movieModel->getMovieDetails($id);
        $remainingSeats=$this->bookingModel->getAllSeats();
        log_message('info','The array is' . json_encode($remainingSeats));
        return view('pages/bookshow', [
            'movieDetails' => $movieDetails,
            'seatsArr' => $remainingSeats
        ]);
    }



    // public function bookUserShow()
    // {
    //     log_message('info', 'Booking process started.ncbbn');
    //     log_message('info', 'Session data: ' . json_encode(session()->get()));
    //     $userId = session()->get('userID');
    //     $seats = $this->request->getPost('seats'); // This will be an array of selected seats
    //     log_message('info', 'Session data22: ' . json_encode($seats));

    //     if ($userId === null) {
    //         return redirect()->to(base_url('/'))->with('error', 'User  not logged in.');
    //     }
    
    //     // Check if the user exists in the database
    //     $userExists = $this->userModel->find($userId); // Assuming you have a UserModel
    //     log_message('info', 'Booking process started.'.json_encode($userExists));

    //     if (!$userExists) {
    //         return redirect()->to(base_url('/'))->with('error', 'User  does not exist.');
    //     }
    
    //     $seats = $this->request->getPost('seats');
    //     log_message('info', 'User  ID: ' . json_encode($seats));

    //     $movieID = $this->request->getPost('movie_id');
    //     $movieExists = $this->movieModel->find($movieID); // Assuming you have a UserModel

    //     log_message('info', 'User  ID: ' . $userId . ', Movie ID: ' . $movieID);

    //     if (is_array($seats)) {
    //         $seatsArray = $seats; // Already an array
    //     } else {
    //         $seatsArray = json_decode($seats, true); // Decode if it's a JSON string
    //     }
    
    //     // Convert the array of seats to a comma-separated string
    //     $seatsString = implode(',', $seatsArray);   
    //     $data = [
    //         'seats' => $seatsString, // Store as a comma-separated string
    //         'userID' => (int)$userId,
    //         'movie_id' => (int)$movieID,
    //         'user_name' => $userExists['name'],
    //         'movieName' =>$movieExists['title'],
    //         'poster_image' => $movieExists['poster_image'],
    //         'bookingDate' => date('Y-m-d H:i:s'), // Today's date and time
    //         'bookingExpiryDate' => date('Y-m-d H:i:s', strtotime('+1 day')) ,
    //         'payment_status' =>'Pending'
    //     ];
    
    //     $addNewShow = $this->bookingModel->createNewBooking($data);
    //     log_message('info', 'Booking data: ' . json_encode($data));
    
    //     if (isset($addNewShow['status']) && $addNewShow['status'] === 'success') {
    //         return redirect()->to(base_url('/'))->with('message', 'Your Show Booked Successfully!');
    //     } else {
    //         return redirect()->to(base_url('/'))->with('error', 'Failed to add booking!');
    //     }
    // }


    public function bookUserShow()
{
    log_message('info', 'Booking process started.');
    log_message('info', 'Session data: ' . json_encode(session()->get()));
    // get Available seats

   
    // Retrieve user ID from session
    $userId = session()->get('userID');
    if ($userId === null) {
        return redirect()->to(base_url('/signin'))->with('error', 'User  not logged in.');
    }

    // Check if the user exists in the database
    $userExists = $this->userModel->find($userId);
    log_message('info', 'User  existence check: ' . json_encode($userExists));

    if (!$userExists) {
        return redirect()->to(base_url('/signin'))->with('error', 'User  does not exist.');
    }

    // Retrieve selected seats and movie ID from POST request
    $seats = $this->request->getPost('seats'); // This will be an array of selected seats
    log_message('info', 'Selected seats: ' . json_encode($seats));

    $movieID = $this->request->getPost('movieId');
    $movieExists = $this->movieModel->find($movieID);

    log_message('info', 'User  ID: ' . $userId . ', Movie ID: ' . $movieID);

    // Validate movie existence
    if (!$movieExists) {
        return redirect()->to(base_url('/'))->with('error', 'Movie does not exist.');
    }

    // Ensure seats is an array
    if (!is_array($seats)) {
        return redirect()->to(base_url('/'))->with('error', 'Invalid seat data.');
    }

    // Convert the array of seats to a comma-separated string
    $seatsString = implode(',', $seats);

    // Prepare booking data
    $data = [
        'seats' => $seatsString, // Store as a comma-separated string
        'userID' => (int)$userId,
        'movie_id' => (int)$movieID,
        'user_name' => $userExists['name'],
        'movieName' => $movieExists['title'],
        'poster_image' => $movieExists['poster_image'],
        'bookingDate' => date('Y-m-d H:i:s'), // Today's date and time
        'bookingExpiryDate' => date('Y-m-d H:i:s', strtotime('+1 day')),
        'payment_status' => 'Pending'
    ];

    // Attempt to create a new booking
    $addNewShow = $this->bookingModel->createNewBooking($data);
    log_message('info', 'Booking data: ' . json_encode($data));

    // Check the result of the booking attempt
    if (isset($addNewShow['status']) && $addNewShow['status'] === 'success') {
        log_message('info','Createdhcjhc');
        session()->setFlashdata('success', 'Your booking was successful!');
        return redirect()->to(base_url('/'));
    } else {
        session()->setFlashdata('errors', 'Your booking failed!');
        return redirect()->to(base_url('/'));
    }
}
    //Only Admin Can Add New Movies
    public function addNewMovieAdmin()
    {
        log_message('info', 'New movie submission initiated.');
        $validation = \Config\Services::validation();

        // Set validation rules
        $validation->setRules([
            'title' => 'required|max_length[30]',
            'genre' => 'required',
            'duration' => 'required',
            'release_date' => 'required',
            'price' =>'required',
            'language' => 'required',
            'director' => 'required',
            'cast' => 'required',
            'description' => 'required',
            'rating' => 'required',
            // 'poster_image' => 'required|uploaded[poster_image]|is_image[poster_image]|max_size[poster_image,2048]',
        ]);

        $data = $this->request->getPost();

        // Validate the input
        if (!$this->validate($validation->getRules())) {
            log_message('error', 'Validation errors: ' . json_encode($this->validator->getErrors()));
            return redirect()->to(base_url('/admin/add/movie'))->with('message', 'Validation failed!')->withInput()->with('errors', $this->validator->getErrors());
        }

        log_message('info', 'Validation passed. Processing movie addition.');

        // Get the uploaded file
        $file = $this->request->getFile('poster_image');

        // Debugging file upload
        log_message('info', 'File upload status: ' . json_encode([
            'isValid' => $file->isValid(),
            'hasMoved' => $file->hasMoved(),
            'errors' => $file->getErrorString() . ' (' . $file->getError() . ')'
        ]));

        // Check if the file is valid and has not been moved
        if ($file->isValid() && !$file->hasMoved()) {
            $filePath = WRITEPATH . 'uploads/';
            $fileName = $file->getRandomName(); // Generate a random name for the file
            $file->move($filePath, $fileName); // Move the file to the uploads directory
        } else {
            log_message('error', 'File upload failed: ' . $file->getErrorString());
            return redirect()->to(base_url('/admin/add/movie'))->with('message', 'Failed to upload the poster image.')->withInput();
        }

        // Prepare data for the database
        $addMovie = $this->movieModel->addNewMovieAdmin([
            'title' => $data['title'],
            'genre' => $data['genre'],
            'duration' => $data['duration'],
            'price'  => $data['price'],
            'release_date' => $data['release_date'],
            'language' => $data['language'],
            'director' => $data['director'],
            'cast' => $data['cast'],
            'description' => $data['description'],
            'rating' => $data['rating'],
            'poster_image' => $fileName,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);

        log_message('info', 'Movie addition process completed.');

        // Check if the movie was added successfully
        if ($addMovie) { // Assuming $addMovie returns true on success
            return redirect()->to(base_url('/admin/add/movie'))->with('success', 'Movie added successfully!');
        } else {
            return redirect()->to(base_url('/admin/add/movie'))->with('error', 'Failed to add the movie. Please try again.')->withInput();
        }
    }



    //only admin can Update The Movie
    public function updateCurrentMovieAdmin($id)
    {
        log_message('info', 'New movie submission initiated.');
        $validation = \Config\Services::validation();

        // Set validation rules
        $validation->setRules([
            'title' => 'required|max_length[30]',
            'genre' => 'required',
            'duration' => 'required',
            'release_date' => 'required',
            'language' => 'required',
            'director' => 'required',
            'cast' => 'required',
            'description' => 'required',
            'rating' => 'required',
            // 'poster_image' => 'required|uploaded[poster_image]|is_image[poster_image]|max_size[poster_image,2048]',
        ]);

        $data = $this->request->getPost();

        // Validate the input
        if (!$this->validate($validation->getRules())) {
            log_message('error', 'Validation errors: ' . json_encode($this->validator->getErrors()));
            return redirect()->to(base_url('/admin/update/' . $id))->with('message', 'Validation failed!')->withInput()->with('errors', $this->validator->getErrors());
        }

        log_message('info', 'Validation passed. Processing movie addition.');

        // Get the uploaded file
        $file = $this->request->getFile('poster_image');

        // Debugging file upload
        log_message('info', 'File upload status: ' . json_encode([
            'isValid' => $file->isValid(),
            'hasMoved' => $file->hasMoved(),
            'errors' => $file->getErrorString() . ' (' . $file->getError() . ')'
        ]));

        // Check if the file is valid and has not been moved
        if ($file->isValid() && !$file->hasMoved()) {
            $filePath = WRITEPATH . 'uploads/';
            $fileName = $file->getRandomName(); // Generate a random name for the file
            $file->move($filePath, $fileName); // Move the file to the uploads directory
        } else {
            log_message('error', 'File upload failed: ' . $file->getErrorString());
            return redirect()->to(base_url('/admin/update/' . $id))->with('message', 'Failed to upload the poster image.')->withInput();
        }

        // Prepare data for the database
        $updatedMovie = $this->movieModel->updateMovieDetails($id, [
            'title' => $data['title'],
            'genre' => $data['genre'],
            'duration' => $data['duration'],
            'release_date' => $data['release_date'],
            'language' => $data['language'],
            'director' => $data['director'],
            'cast' => $data['cast'],
            'description' => $data['description'],
            'rating' => $data['rating'],
            'poster_image' => $fileName,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);

        log_message('info', 'Movie addition process completed.');

        // Check if the movie was added successfully
        if ($updatedMovie) { // Assuming $addMovie returns true on success
            return redirect()->to(base_url('/admin/update/' . $id))->with('success', 'Movie Updated successfully!');
        } else {
            return redirect()->to(base_url('/admin/update/' . $id))->with('error', 'Failed to Update the movie. Please try again.')->withInput();
        }
    }
    //Only Admin Can Delete the Movies

    public function deleteMovie($id)
    {
        log_message('info', 'deleted run here');
        $isDeleted = $this->movieModel->deleteMovie($id);
        if ($isDeleted) {
            return redirect()->to(base_url('/'))->with('success', $isDeleted['message']);
        } else {
            return redirect()->to(base_url('/'))->with('error', $isDeleted['message']);
        }
    }
}
