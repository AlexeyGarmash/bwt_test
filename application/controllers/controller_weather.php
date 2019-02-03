<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller_weather
 *
 * @author Alex
 */
//namespace GuzzleHttp;
require 'vendor/autoload.php';
require 'application/phpQuery/phpQuery.php';
require_once 'application/models/model_weather.php';

use Guzzle\Http\Client;
use Guzzle\Http\EntityBody;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;

class Controller_weather {

    private $client;

    function __construct() {
        $this->view = new View();
        $this->client = new GuzzleHttp\Client();
    }

    function action_index() {
        session_start();
        if (!isset($_SESSION['logData'])) {
            $this->view->generate('notLoggedPage.php', 'template_view.php');
            return;
        }

        if (isset($_POST['submit'])) {
            unset($_SESSION['logData']);
            header('Location: ./main');
            return;
        }

        $body = $this->getHtmlBody('http://www.gismeteo.ua/city/daily/5093/');
        $document = phpQuery::newDocumentHTML($body);

        $wind = $this->getTextBySelector($document, "#weather > div.fcontent > div.section.higher > div.wicon.wind > dl > dd.value.m_wind.ms");
        $cloudy['desc'] = $this->getTextBySelector($document, "#weather > div.fcontent > div.section.higher > dl > dd");
        $cloudy['img'] = $document->find("#tab_wdaily1 > img")->attr('src');
        $temperature_now = $this->getTextBySelector($document, "#weather > div.fcontent > div.section.higher > div.temp > dd.value.m_temp.c");
        $pressure = $this->getTextBySelector($document, "#weather > div.fcontent > div.section.higher > div.wicon.barp > dd.value.m_press.torr");
        $humidity = $this->getTextBySelector($document, "#weather > div.fcontent > div.section.higher > div.wicon.hum");
        
        $weatherDay = $document->find("#weather-daily > div.fcontent > div.wsection.wdata > table");
        $weatherModel = new Model_weather($cloudy, $temperature_now, $wind, $humidity, $pressure);

        
        $data['weather'] = $weatherModel;
        $data['weatherTable'] = $weatherDay;
        $this->view->generate('weather_view.php', 'template_view.php', $data);
    }

    private function getHtmlBody($url) {

        $res = $this->client->request('GET', $url, [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
                'upgrade-insecure-requests' => 1,
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/71.0.3578.98 Safari/537.36'
            ],
            'verify' => false
        ]);
        if ($res->getStatusCode() === 200) {
            return $res->getBody();
        } else {
            return null;
        }
    }

    private function getTextBySelector($document, $selector) {
        $text = $document->find($selector)->text();
        return $text;
    }

}
