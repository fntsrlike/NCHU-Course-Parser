<?php
ini_set("display_errors", "On"); 
error_reporting(E_ALL & ~E_NOTICE);

require "core/counter_core.php";
require "core/json_core.php";
require "helper.php";
require "parse/LIB_parse.php";

$action = isset($_GET['action']) ? $_GET['action'] : $_POST['action'];

require 'template_header.php';

switch ($action) {
    case 'counter':
        counter_core();
        break;
    case 'json':
        json_core();
        break;

    default:
        require "main.php";
        break;
}

require 'template_footer.php';