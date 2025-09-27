<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/router.php';
// no topo do index.php (APENAS em dev)


require_once __DIR__.'/autoload.php'; // se você usa
// ou: require_once __DIR__.'/controller/ChatController.php';

$pagina = $_GET['pagina'] ?? 'dashboard';

switch ($pagina) {

  case 'chatbot':
    require_once __DIR__.'/controller/ChatController.php';
    $ctrl = new ChatController();
    $ctrl->index(); // lista conversas / tela principal do chatbot
    exit;

  // ...demais rotas...


}
