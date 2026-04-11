<?php

require_once "../vendor/autoload.php";

use Denib\Rubrica\pages\ContactForm;
use Denib\Rubrica\pages\ContactList;
use Denib\Rubrica\pages\ProcessForm;
use Denib\Rubrica\Route;

Route::Get("/", ContactList::class);
Route::Get("/list", fn() => "List");
Route::Get("/new", ContactForm::class);
Route::Post("/", ProcessForm::class);

$routeConfig = Route::Resolve();

if (is_callable($routeConfig->delegate)) {
    $delegate = $routeConfig->delegate;
    $value    = $delegate();
} else {
    $delegate = new $routeConfig->delegate();
    $value = $delegate->respond();
}

print($value); 

?>