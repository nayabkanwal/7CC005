<?php
session_start();

if (!isset($_SESSION['items'])) {
    $_SESSION['items'] = [];
}

header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        if ($data && isset($data['text'])) {
            $_SESSION['items'][] = ['text' => $data['text'], 'completed' => false];
        }
        echo json_encode($_SESSION['items']);
        break;
    
    case 'GET':
        echo json_encode($_SESSION['items']);
        break;
}
?>
