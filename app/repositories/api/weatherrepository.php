<?php
require_once __DIR__ . '/../../models/weather.php';
class WeatherRepository
{
    public function getCurrentWeatherData()
    {
        $url = "http://api.weatherapi.com/v1/current.json?key=fed1488a8eb04e8d883150519222112&q=Nibbixwoud&aqi=no";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $weatherData = json_decode($output, true);
        $temperture = $weatherData['current']['temp_c'];
        $iconUrl = $weatherData['current']['condition']['icon'];

        # strip the first two characters from the url
        $iconUrl = substr($iconUrl, 2);

        $weather = new Weather($temperture, $iconUrl);
        return $weather;
    }
}
?>