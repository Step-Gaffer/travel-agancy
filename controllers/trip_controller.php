<?php
global $content;

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? 0;

switch ($action) {
    case 'list':
        $trips = getAllTrips();
        ob_start();
        include __DIR__ . '/../views/trip/list.php';
        $content = ob_get_clean();
        break;

    case 'show':
        $id = (int) $id;
        $trip = getTripById($id);
        ob_start();
        include __DIR__ . '/../views/trip/show.php';
        $content = ob_get_clean();
        break;

    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            addTrip($_POST);
            $_SESSION['redirect'] = 'index.php?entity=trip&action=list';
        } else {
            $tours = getAllToursForSelect();
            ob_start();
            include __DIR__ . '/../views/trip/add.php';
            $content = ob_get_clean();
        }
        break;

    case 'edit':
        $id = (int) $id;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            updateTrip($id, $_POST);
            $_SESSION['redirect'] = "index.php?entity=trip&action=show&id=$id";
        } else {
            $trip = getTripById($id);
            $tours = getAllToursForSelect();
            ob_start();
            include __DIR__ . '/../views/trip/edit.php';
            $content = ob_get_clean();
        }
        break;

    case 'delete':
        $id = (int) $id;
        if (hasTripDependencies($id)) {
            $_SESSION['flash_error'] = "Невозможно удалить поездку: существуют связанные бронирования";
            $_SESSION['redirect'] = 'index.php?entity=trip&action=list';
        } else {
            if (deleteTrip($id)) {
                $_SESSION['redirect'] = 'index.php?entity=trip&action=list';
            } else {
                $_SESSION['flash_error'] = "Ошибка при удалении поездки";
                $_SESSION['redirect'] = 'index.php?entity=trip&action=list';
            }
        }
        break;
}