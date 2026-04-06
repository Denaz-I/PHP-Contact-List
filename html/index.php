<?php

require_once "../vendor/autoload.php";

use Denib\Rubrica\Route;

Route::Get("/", function() {echo "Home";});

Route::Get("/list", function() {echo "List";});

Route::Get("/new", function() {echo "New";});

$routeConfig = Route::Resolve();
$delegate = $routeConfig->delegate;

$delegate();

?>