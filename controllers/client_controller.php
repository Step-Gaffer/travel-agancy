<?php
global $content;

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? 0;

switch ($action) {
    case 'list':
        $clients = getAllClients();
        ob_start();
        include __DIR__ . '/../views/client/list.php';
        $content = ob_get_clean();
        break;

    case 'show':
        $id = (int) $id;
        $client = getClientById($id);
        ob_start();
        include __DIR__ . '/../views/client/show.php';
        $content = ob_get_clean();
        break;

    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            addClient($_POST);
            $_SESSION['redirect'] = 'index.php?entity=client&action=list';
        } else {
            ob_start();
            include __DIR__ . '/../views/client/add.php';
            $content = ob_get_clean();
        }
        break;

    case 'edit':
        $id = (int) $id;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            updateClient($id, $_POST);
            $_SESSION['redirect'] = "index.php?entity=client&action=show&id=$id";
        } else {
            $client = getClientById($id);
            ob_start();
            include __DIR__ . '/../views/client/edit.php';
            $content = ob_get_clean();
        }
        break;

    case 'delete':
        $id = (int) $id;
        if (hasClientDependencies($id)) {
            $_SESSION['flash_error'] = "Невозможно удалить клиента: существуют связанные бронирования";
            $_SESSION['redirect'] = 'index.php?entity=client&action=list';
        } else {
            if (deleteClient($id)) {
                $_SESSION['redirect'] = 'index.php?entity=client&action=list';
            } else {
                $_SESSION['flash_error'] = "Ошибка при удалении клиента";
                $_SESSION['redirect'] = 'index.php?entity=client&action=list';
            }
        }
        break;
}