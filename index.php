<?php
session_start();

require_once __DIR__ . '/model.php';

function renderNavigation()
{
    $entities = [
        'main' => 'Главная',
        'client' => 'Клиенты',
        'tour' => 'Туры',
        'trip' => 'Поездки'
    ];
    echo '<nav><ul class="navigation">';
    foreach ($entities as $key => $name) {
        $active = ($key === ($_GET['entity'] ?? 'main')) ? 'active' : '';
        echo "<li class=\"$active\"><a href=\"index.php?entity=$key&action=list\">$name</a></li>";
    }
    echo '</ul></nav>';
}
$entity = $_GET['entity'] ?? 'main';
$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? 0;

$content = '';
$error = '';

if (isset($_SESSION['flash_error'])) {
    $error = $_SESSION['flash_error'];
    unset($_SESSION['flash_error']);
}

if ($entity !== 'main' && $action) {
    $controllerFile = __DIR__ . "/controllers/{$entity}_controller.php";
    if (file_exists($controllerFile)) {
        require_once $controllerFile;

        if (!empty($_SESSION['redirect'])) {
            $redirect = $_SESSION['redirect'];
            unset($_SESSION['redirect']);
            header("Location: $redirect");
            exit;
        }
    } else {
        $error = "Контроллер не найден";
    }
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Туристическое агентство "Вокруг света"</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #3498db;
            --secondary: #2c3e50;
            --success: #27ae60;
            --danger: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
            --gray: #95a5a6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        header {
            background: linear-gradient(135deg, var(--secondary), var(--primary));
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo i {
            font-size: 2rem;
            color: #fff;
        }

        .logo h1 {
            font-size: 1.8rem;
            font-weight: 600;
        }

        nav {
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .navigation {
            display: flex;
            list-style: none;
        }

        .navigation li {
            position: relative;
        }

        .navigation li a {
            display: block;
            padding: 15px 20px;
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: all 0.3s;
        }

        .navigation li a:hover {
            background-color: var(--light);
            color: var(--primary);
        }

        .navigation li.active a {
            background-color: var(--primary);
            color: white;
        }

        .navigation li.active a:hover {
            background-color: #2980b9;
        }

        main {
            padding: 30px 0;
            min-height: calc(100vh - 200px);
        }

        .content-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            padding: 25px;
        }

        .error {
            background-color: #ffebee;
            color: var(--danger);
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            border-left: 4px solid var(--danger);
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2980b9;
            color: white;
        }

        .btn-success {
            background-color: var(--success);
        }

        .btn-success:hover {
            background-color: #219653;
        }

        .btn-danger {
            background-color: var(--danger);
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 0.9rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th {
            background-color: var(--primary);
            color: white;
            text-align: left;
            padding: 12px 15px;
        }

        table td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }

        table tr:hover {
            background-color: #f5f9ff;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        .hero {
            text-align: center;
            padding: 50px 0;
            background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.8)), url('https://images.unsplash.com/photo-1503220317375-aaad61436b1b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            border-radius: 8px;
            margin-bottom: 0px;
        }

        .hero h2 {
            font-size: 2.5rem;
            margin-bottom: 0px;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 800px;

        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card i {
            font-size: 2.5rem;
            color: var(--primary);
        }

        .stat-card h3 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .stat-card p {
            color: var(--gray);
            font-size: 1.1rem;
        }

        footer {
            background-color: var(--secondary);
            color: white;
            padding: 30px 0;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        .footer-section h3 {
            margin-bottom: 2 0px;
            font-size: 1.3rem;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-section h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--primary);
        }

        .footer-section p {
            margin-bottom: 15px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .contact-info i {
            margin-right: 10px;
            color: var(--primary);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            margin-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body>
    <header>
        <div class="container header-content">
            <div class="logo">
                <i class="fas fa-globe-americas"></i>
                <h1>Турагентство "Вокруг света"</h1>
            </div>
        </div>
    </header>

    <nav>
        <div class="container">
            <?php renderNavigation(); ?>
        </div>
    </nav>

    <main class="container">
        <?php if (!empty($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <div id="content">
            <?php
            if (!empty($content)) {
                echo $content;
            } elseif ($entity === 'main') {
                include __DIR__ . '/views/main.php';
            } elseif ($entity && $action) {
                echo "<p>Действие не выполнено</p>";
            } else {
                echo '<p>Выберите раздел в навигации</p>';
            }
            ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>О компании</h3>
                    <p>Турагентство "Вокруг света" предлагает лучшие туры по всему миру. Мы работаем с 2026 года и
                        помогли нулям клиентов осуществить их мечты о путешествиях.</p>
                </div>

                <div class="footer-section">
                    <h3>Контакты</h3>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt"></i> г. Москва, ул. Путешественников, 15</p>
                        <p><i class="fas fa-phone"></i> +7 (495) 123-45-67</p>
                        <p><i class="fas fa-envelope"></i> info@vokrug-sveta.ru</p>
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Режим работы</h3>
                    <p><i class="fas fa-clock"></i> Пн-Пт: 10:00 - 20:00</p>
                    <p><i class="fas fa-clock"></i> Сб: 11:00 - 18:00</p>
                    <p><i class="fas fa-clock"></i> Вс: выходной</p>
                </div>
            </div>

            <div class="copyright">
                <p>&copy; 2025 Турагентство "Вокруг света". Все права защищены.</p>
            </div>
        </div>
    </footer>
</body>

</html>