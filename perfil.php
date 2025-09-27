<?php
session_start();
require_once 'controller/Controller.class.php';

$controller = new Controller();
$controller->exibirPerfil();

