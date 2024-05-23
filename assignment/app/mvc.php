<?php
// Include necessary files for the MVC components
require 'view/load.php';
require 'model/model.php';
require 'controller/controller.php';

// Get the current page URI and extract the part after 'index.php'
$pageURI = $_SERVER['REQUEST_URI'];
$pageURI = substr($pageURI, strrpos($pageURI, 'index.php') + 10);

// Create a new Controller instance
// If no specific page is requested, load the 'home' page
if (!$pageURI) {
    new Controller('home');
} else {
    new Controller($pageURI);
}
?>
