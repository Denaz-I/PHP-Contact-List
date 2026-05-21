<?php

require_once "../vendor/autoload.php";

use Denib\Rubrica\App;
use Denib\Rubrica\Route;
use Denib\Rubrica\Request;
use Denib\Rubrica\UploadManagerContract;
use Denib\Rubrica\UploadManager;
use Denib\Rubrica\pages\ContactForm;
use Denib\Rubrica\pages\ContactList;
use Denib\Rubrica\pages\ProcessForm;
use Denib\Rubrica\pages\DeleteItem;
// use Denib\Rubrica\repository\json\ContactRepository;
use Denib\Rubrica\repository\database\ContactRepository;

use Denib\Rubrica\repository\RepositoryContract;

Route::Get("/", ContactList::class);
Route::Get("/list", ContactList::class);
Route::Get("/new", ContactForm::class);
Route::Get("/delete", DeleteItem::class);
Route::Post("/", ProcessForm::class);

App::registerService(RepositoryContract::class, new ContactRepository()); // aggiunto in questo modo, così da evitare di dover istanziare ogni volta che ci serve il repository
//perché in caso ci sia bisogno di cambiare repository, andrebbe cambiato ad ogni istanza, facendo così, c'è App che si occupa di tutto, cambiando solo qui

// REGISTRO UN NUOVO SERVIZIO RESPONSABILE DI GESTIRE IL CARICAMENTO DELLE IMMAGINI
App::registerService(UploadManagerContract::class, new UploadManager());

$request = Request::Capture();

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