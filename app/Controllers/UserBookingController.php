<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\MovieModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class UserBookingController extends BaseController
{
    protected $bookingModel;
    public function __construct()
    {
        $this->bookingModel = new BookingModel();
    }



    public function getAllUserBookingView()
    {
        $id = session()->get('userID');

        // Check if the user ID is set
        if (!$id) {
            // Handle the case where the user is not logged in
            return redirect()->to('/login')->with('error', 'You must be logged in to view your bookings.');
        }

        // Fetch all bookings for the user
        $userBookings = $this->bookingModel->where('userID', $id)->findAll();

        // Check if there are any bookings
        if (empty($userBookings)) {
            return view("pages/userbookings", ["userBookings" => [], "message" => "No bookings found."]);
        }

        // Return the view with the bookings
        return view("pages/userbookings", ["userBookings" => $userBookings]);
    }

    public function userTicketView($id)
    {
        $bookingDetails = $this->bookingModel->where("bookingID", $id)->first();
        return view('pages/userticket', ['bookingDetails' => $bookingDetails]);
    }
    public function generateTicketPDF($bookingID)
    {
        $bookingDetails = $this->bookingModel->find($bookingID);
        $html = view('pages/userticket', ['bookingDetails' => $bookingDetails]);
        $options=new Options();
        $options->set('defaultFont','Courier');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $output = $dompdf->output();
        $dompdf->stream("Ticket-{$bookingID}.pdf", ["Attachment" => 1]);
    }
}
