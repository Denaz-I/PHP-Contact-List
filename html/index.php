<?php

require_once "../vendor/autoload.php";

use Denib\Rubrica\pages\ContactForm;
use Denib\Rubrica\pages\ContactList;
use Denib\Rubrica\Route;

Route::Get("/", ContactList::class);
Route::Get("/list", fn() => "List");
Route::Get("/new", ContactForm::class);
Route::Post("/", fn() => "POST-List");

$routeConfig = Route::Resolve();

if (is_callable($routeConfig->delegate)) {
    $delegate = $routeConfig->delegate;
    $value    = $delegate();
} else {
    $delegate = new $routeConfig->delegate();
    $value = $delegate->respond();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1><?= $value ?></h1>

    <form action="/" method="post">
        <input type="text" name="prova" id="prova" />
        <button type="submit">submit</button>
    </form>
</body>
</html>