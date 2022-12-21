<?php
class Weather
{
    public $temperture;
    public $iconUrl;


    public function __construct($temperture, $iconUrl)
    {
        $this->temperture = $temperture;
        $this->iconUrl = $iconUrl;
        # add https:// to the url
        $this->iconUrl = 'https://' . $this->iconUrl;
    }
}
?>