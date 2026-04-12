<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\Response;
use Denib\Rubrica\ViewResponse;
use Denib\Rubrica\entity\Contact;

class ContactList implements ActionContract{

    public function respond(): Response {

        $c1 = New Contact();
        $c1->name = "Antonio";
        $c1->surname = "Bruno";

        $c2 = New Contact();
        $c2->name = "Paolo";
        $c2->surname = "Prova2";

        $c3 = New Contact();
        $c3->name = "Giuseppe";
        $c3->surname = "Prova3";

        $view = new ViewResponse("list.html.twig", [
            "title" => "Lista Contatti",

            "contatti" => [$c1, $c2, $c3]
        ]);

        return $view;
    }
}