<?php
ini_set("display_errors", "On"); 
error_reporting(E_ALL & ~E_NOTICE);

require "models/app_core.php";
require "models/helper.php";
require "models/LIB_parse.php";
require "models/class_parse.php";

$action = isset($_GET['action']) ? $_GET['action'] : $_POST['action'];

require 'views/template_header.php';

switch ($action) {
    case 'counter':
        counter_core();
        break;
    case 'json':
        json_core();
        break;

    default:
        require "views/main.php";
        break;
}

require 'views/template_footer.php';