<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_weather
 *
 * @author Alex
 */
class Model_weather extends Model {

    public $cloudness;
    public $temp;
    public $wind;
    public $humidity;
    public $pressure;

    public function __construct($cloudness, $temp, $wind, $humidity, $pressure) {
        $this->temp = $temp;
        $this->wind = $wind;
        $this->cloudness = $cloudness;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
    }

    public function get_data() {
        
    }

}
