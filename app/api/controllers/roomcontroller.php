<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../../services/bookingservice.php';

class RoomController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new BookingService();
    }

    public function getRoomById()
    {
        $roomId = $_GET['id'];
        $room = $this->service->getRoomById($roomId);
        $this->respond($room);
    }

    public function getAllRooms()
    {
        $rooms = $this->service->getAllRooms();
        $this->respond($rooms);
    }

    public function getAvailableRooms()
    {
        # get data from request
        $amountOfGuests = $_GET['amountOfGuests'];
        $beginDate = $_GET['beginDate'];
        $endDate = $_GET['endDate'];

        # if the begin or end date is empty
        if (empty($beginDate) || empty($endDate)) {
            $this->respondWithError(400, 'Please provide a begin and end date');
            return;
        }
        # if begin date is greater than end date 
        if ($beginDate > $endDate) {
            $this->respondWithError(400, 'Begin date cannot be greater than end date');
            return;
        }
        # if the begin or end date are in the past        
        // if ($checkIn < $now || $checkOut < $now) {
        //     $this->respondWithError(400, 'Begin and end date cannot be in the past');
        //     return;
        // }


        $rooms = $this->service->getAvailableRooms($amountOfGuests, $beginDate, $endDate);

        if (count($rooms) == 0) {
            $this->respond(array('errorMessage' => 'No rooms available'));
        } else {
            $this->respond($rooms);
        }
    }
}
?>