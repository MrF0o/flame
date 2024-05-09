<?php

require_once "./vendor/autoload.php";

use Mrfoo\Flame\Template;

// method 2
$flame = new Template();
$flame->render(__DIR__ . '/template.flame.php', [
    "message" => "This is a message"
]);
