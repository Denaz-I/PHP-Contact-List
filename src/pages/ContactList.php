<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\View;

class ContactList implements ActionContract{

    public function respond(): string {

        $view = new View();

        return $view->render("list.html.twig", [
            "contacts" => ["antonio","paolo","giuseppe"]
        ]);
    }
}