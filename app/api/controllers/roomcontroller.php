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
        $now = date('Y-m-d');

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
        // # check if the begin and or enddate are in the past
        // if ($beginDate < $now || $endDate < $now) {
        //     $this->respondWithError(400, 'Begin and end date cannot be in the past');
        //     return;
        // }

        $rooms = $this->service->getAvailableRooms($amountOfGuests, $beginDate, $endDate);

        if (count($rooms) == 0) {
            $this->respond(array('Message' => 'No rooms available'));
        } else {
            $this->respond($rooms);
        }
    }
}
?>