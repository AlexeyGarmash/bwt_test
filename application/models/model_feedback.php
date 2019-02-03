<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_feedback
 *
 * @author Alex
 */
class Model_feedback extends Model {

    public function get_data() {
        $mysqli = new mysqli("localhost", "root", "", "bwt_test");
        $mysqli->query("SET NAMES 'utf8'");
        $sql = "SELECT * FROM feedbacks";
        $res = $mysqli->query($sql);
        $mysqli->close();
        return $res;
    }

    public function sendFeedback($name, $email, $message) {
        $mysqli = new mysqli("localhost", "root", "", "bwt_test");
        $mysqli->query("SET NAMES 'utf8'");
        $date = time();
        $sql = "INSERT INTO feedbacks (Name, Email, Message, FeedTime) VALUES ('$name', '$email', '$message', '$date')";
        // Получение и возврат результатов. Используется подготовленный запрос
        $res = $mysqli->query($sql);
        $mysqli->close();
        return $res;
    }

}
