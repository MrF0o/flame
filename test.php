<?php

require_once "./vendor/autoload.php";

use Mrfoo\Flame\Template;
use Mrfoo\Flame\View;

// method 1 for compiled views
// $view = View::fromHTML("");
// $view->with(
//     [
//         "users" => [
//             (object) [
//                 'name' => 'fathi'
//             ]
//         ]
//     ]
// )->render();

// method 2
$flame = new Template();
$flame->render(__DIR__ . '/template.flame.php', [
    "message" => "This is a message"
]);
