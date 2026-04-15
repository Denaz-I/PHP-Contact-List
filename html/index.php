<?php

require_once "../vendor/autoload.php";

use Denib\Rubrica\App;
use Denib\Rubrica\pages\ContactForm;
use Denib\Rubrica\pages\ContactList;
use Denib\Rubrica\pages\ProcessForm;
use Denib\Rubrica\repository\json\ContactRepository;
use Denib\Rubrica\repository\RepositoryContract;
use Denib\Rubrica\Route;
use Denib\Rubrica\Request;

Route::Get("/", ContactList::class);
Route::Get("/list", ContactList::class);
Route::Get("/new", ContactForm::class);
Route::Post("/", ProcessForm::class);

$request = Request::Capture();

App::registerService(RepositoryContract::class, new ContactRepository()); // aggiunto in questo modo, così da evitare di dover istanziare ogni volta che ci serve il repository
//perché in caso ci sia bisogno di cambiare repository, andrebbe cambiato ad ogni istanza, facendo così, c'è App che si occupa di tutto, cambiando solo qui


//PRIMO UTILIZZO DEL REPOSITORY
$repository = App::getService(RepositoryContract::class);
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