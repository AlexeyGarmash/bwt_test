<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller_feeds
 *
 * @author Alex
 */
require_once 'application/models/model_feedback.php';

class Controller_feeds extends Controller {

    function __construct() {
        $this->view = new View();
        $this->model = new Model_feedback();
    }

    function action_index() {
        session_start();
        if (!isset($_SESSION['logData'])) {
            $this->view->generate('notLoggedPage.php', 'template_view.php');
            return;
        }

        if (isset($_POST['submit'])) {
            unset($_SESSION['logData']);
            header('Location: http://localhost/tutor/main');
            return;
        }
        $data['result'] = $this->model->get_data();
        $this->view->generate('feeds_view.php', 'template_view.php', $data);
    }

}
