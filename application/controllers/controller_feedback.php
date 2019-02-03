<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller_feedback
 *
 * @author Alex
 */
require_once 'application/core/Utils.php';
require_once 'application/models/model_feedback.php';

class Controller_feedback extends Controller {

    public $errors;

    function __construct() {
        $this->view = new View();
        $this->model = new Model_feedback();
    }

    function action_index() {
        $err = false;

        if (isset($_POST['submit'])) {
            session_start();
            $name = $_POST['name'];
            $email = $_POST['email'];
            $text = $_POST['message'];


            if (!Utils::checkName($name)) {
                $this->errors['name'] = "Name < 2 chars";
                $err = true;
            }
            if (!Utils::checkEmail($email)) {
                $this->errors['email'] = "Enter corect email";
                $err = true;
            }
            if (!Utils::checkName($text)) {
                $this->errors['text'] = "Enter corect text";
                $err = true;
            }
            if (!$err) {
                if ($this->checkCaptcha()) {
                    if ($this->model->sendFeedback($name, $email, $text)) {
                        unset($_SESSION["text"]);
                        //$data['message'] = "Successful";
                        echo "Successful";
                    } else {
                        //$data['message'] = "Failed";
                        echo "Failed";
                    }
                } else {
                    $data['captcha'] = "Confirm you are not the robot";
                }
            } else {
                $_SESSION["text"] = $text;
            }
        }
        $data['err'] = $this->errors;
        $this->view->generate('feedback_view.php', 'template_view.php', $data);
    }

    function checkCaptcha() {
        /* require_once "application/recaptchalib.php";
          $secret = "6LcIc4sUAAAAADLqAXdbz_4fEloNypC07a6rbT8k";
          $response = null;
          $reCaptcha = new ReCaptcha($secret);
          if ($_POST["g-recaptcha-response"]) {
          $response = $reCaptcha->verifyResponse(
          $_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]
          );
          }
          if ($response != null && $response->success) {
          return true;
          } else {
          return false;
          } */
        $response = $_POST["g-recaptcha-response"];
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => '6LcIc4sUAAAAADLqAXdbz_4fEloNypC07a6rbT8k',
            'response' => $response
        );
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);
        if ($captcha_success->success == false) {
            return false;
        } else if ($captcha_success->success == true) {
            return true;
        }
    }

}
