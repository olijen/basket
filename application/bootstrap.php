<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: text/html; charset=utf-8");

include 'core/model.php';
include 'core/view.php';
include 'core/controller.php';
include 'core/route.php';
Route::start();