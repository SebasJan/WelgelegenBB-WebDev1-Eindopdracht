<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../../services/service.php';

class RoomController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new Service();
    }

    public function getRoomById()
    {
        $roomId = htmlspecialchars($_GET['id']);
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
        $amountOfGuests = htmlspecialchars($_GET['amountOfGuests']);
        $beginDate = htmlspecialchars($_GET['beginDate']);
        $endDate = htmlspecialchars($_GET['endDate']);

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

        $rooms = $this->service->getAvailableRooms($amountOfGuests, $beginDate, $endDate);

        if (count($rooms) == 0) {
            $this->respond(array('Message' => 'No rooms available'));
        } else {
            $this->respond($rooms);
        }
    }

    public function getAllBookings()
    {
        $bookings = $this->service->getAllBookings();
        if (count($bookings) == 0) {
            $this->respond(array('Message' => 'No bookings found'));
        } else {
            $this->respond($bookings);
        }
    }
}
?>