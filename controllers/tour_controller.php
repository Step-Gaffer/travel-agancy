<?php
global $content;

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? 0;

switch ($action) {
    case 'list':
        $tours = getAllTours();
        ob_start();
        include __DIR__ . '/../views/tour/list.php';
        $content = ob_get_clean();
        break;

    case 'show':
        $id = (int) $id;
        $tour = getTourById($id);
        ob_start();
        include __DIR__ . '/../views/tour/show.php';
        $content = ob_get_clean();
        break;

    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            addTour($_POST);
            $_SESSION['redirect'] = 'index.php?entity=tour&action=list';
        } else {
            ob_start();
            include __DIR__ . '/../views/tour/add.php';
            $content = ob_get_clean();
        }
        break;

    case 'edit':
        $id = (int) $id;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            updateTour($id, $_POST);
            $_SESSION['redirect'] = "index.php?entity=tour&action=show&id=$id";
        } else {
            $tour = getTourById($id);
            ob_start();
            include __DIR__ . '/../views/tour/edit.php';
            $content = ob_get_clean();
        }
        break;

    case 'delete':
        $id = (int) $id;
        if (hasTourDependencies($id)) {
            $_SESSION['flash_error'] = "Невозможно удалить тур: существуют связанные поездки";
            $_SESSION['redirect'] = 'index.php?entity=tour&action=list';
        } else {
            if (deleteTour($id)) {
                $_SESSION['redirect'] = 'index.php?entity=tour&action=list';
            } else {
                $_SESSION['flash_error'] = "Ошибка при удалении тура";
                $_SESSION['redirect'] = 'index.php?entity=tour&action=list';
            }
        }
        break;
}