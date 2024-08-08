
<?php

const BASE_PATH = __DIR__ . '/';

require BASE_PATH . 'functions.php';
session_start();

$method = $_SERVER['REQUEST_METHOD'];


require base_path("routes.php");