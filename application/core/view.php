<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of view
 *
 * @author Alex
 */
class View {

    function generate($content_view, $template_view, $data = null) {
        include 'application/views/'.$template_view;
    }

}
