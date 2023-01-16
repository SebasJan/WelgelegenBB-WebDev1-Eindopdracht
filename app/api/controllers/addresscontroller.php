<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../../services/service.php';

class AddressController extends Controller
{
    // recieves postal code and housenumber
    // returns streetname and residence
    private $apiKey = 'jLQloPCGMrcYm0aNJlNfp5skT5ltGAaN';
    private $api = 'https://api.postnl.nl/address/national/v1/validate';

    public function getAddress()
    {
        // make sure only POST requests from this server are allowed
        if ($_SERVER['HTTP_ORIGIN'] != 'http://localhost' && $_SERVER['HTTP_ORIGIN'] != 'https://welgelegen.000webhostapp.com') {
            header('HTTP/1.0 403 Forbidden');
            exit;
        }

        // get data from request body
        $data = json_decode(file_get_contents('php://input'), true);
        $postalCode = htmlspecialchars($data['postalCode']);
        $houseNumber = htmlspecialchars($data['houseNumber']);


        // if the postal code or house number is empty
        if (empty($postalCode) || empty($houseNumber)) {
            $this->respondWithError(400, 'Please provide a postal code and house number');
            return;
        }

        // create request with in the body the postal code and house number and in  the header the api key
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // set body of request to json with the PostalCode and HouseNumber value
        $body = json_encode(array('PostalCode' => $postalCode, 'HouseNumber' => $houseNumber));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_POST, 1);
        $headers = array();
        $headers[] = "Accept: application/json";
        $headers[] = "Content-Type: application/json";
        $headers[] = "apikey: $this->apiKey";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);

        // if something went wrong with the request
        if (curl_errno($ch)) {
            $this->respondWithError(500, 'Something went wrong');
            return;
        }
        curl_close($ch);

        // if the postal code and house number are not valid
        echo $result;
    }
}