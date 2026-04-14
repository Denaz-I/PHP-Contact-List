<?php

require_once "../vendor/autoload.php";

use Denib\Rubrica\pages\ContactForm;
use Denib\Rubrica\pages\ContactList;
use Denib\Rubrica\pages\ProcessForm;
use Denib\Rubrica\repository\json\ContactRepository;
use Denib\Rubrica\Route;
use Denib\Rubrica\Request;

Route::Get("/", ContactList::class);
Route::Get("/list", ContactList::class);
Route::Get("/new", ContactForm::class);
Route::Post("/", ProcessForm::class);

$request = Request::Capture();

$repository = new ContactRepository();
$repository->createContainer();

$routeConfig = Route::Resolve($request);

if (is_callable($routeConfig->delegate)) {
    $delegate = $routeConfig->delegate;
    $value    = $delegate($request);
    echo $value;
} else {
    $delegate = new $routeConfig->delegate();
    $value = $delegate->respond($request);
    $value->send();
}
?>