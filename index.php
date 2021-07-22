<?php
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require __DIR__ . '/src/views/home.php';
        break;
    case '' :
        require __DIR__ . '/src/views/home.php';
        break;
    case '/employees' :
        require __DIR__ . '/src/views/employees.php';
        break;
    case '/projects' :
        require __DIR__ . '/src/views/projects.php';
        break;
    case '/contacts' :
        require __DIR__ . '/src/views/contact.php';
        break;
    case '/login' :
        require __DIR__ . '/src/views/login.php';
        break;
    case '/logout' :
        require __DIR__ . '/src/views/logout.php';
        break;
        case '/admin' :
            require __DIR__ . '/src/views/admin/admin.php';
            break;
    default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;
}