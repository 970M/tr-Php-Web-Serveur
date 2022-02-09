<?php

require_once 'ControllerVoiture.php';
$action = $_GET['action'];
ControllerVoiture::$action();
