<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\repository\RepositoryContract;
use Denib\Rubrica\App;
use Denib\Rubrica\Response;
use Denib\Rubrica\ViewResponse;
use Denib\Rubrica\entity\Contact;
use Denib\Rubrica\Request;

class ContactList implements ActionContract{

    public function respond(Request $request): Response {

        $repository = App::getService(RepositoryContract::class);

        $contacts = $repository->all();

        $view = new ViewResponse("list.html.twig", [
            "title" => "Lista Contatti",

            "contatti" => $contacts
        ]);

        return $view;
    }
}