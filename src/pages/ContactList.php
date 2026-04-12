<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\Response;
use Denib\Rubrica\ViewResponse;

class ContactList implements ActionContract{

    public function respond(): Response {

        $view = new ViewResponse("list.html.twig", [
            "contacts" => ["Antonio","Paolo","Giuseppe"]
        ]);

        return $view;
    }
}