<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utils
 *
 * @author Alex
 */
class Utils {

    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkPassword($password) {
        if (strlen($password) >= 6) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

}
