<?php
session_start();
require ('vendor/autoload.php');

use App\Controller\HomeController\HomeController;

$url = '';
if (isset($_GET['url'])) {
	$url = $_GET['url'];
}

if ($url === '') {
	$home = new HomeController();
	$home->homePage();
} 