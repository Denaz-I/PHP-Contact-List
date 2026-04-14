<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\Response;
use Denib\Rubrica\ViewResponse;
use Denib\Rubrica\Request;

class ContactForm implements ActionContract{

    public function respond(Request $request): Response {

        $view = new ViewResponse("form.html.twig", [
            "test" => "IT WORKS"
        ]);

        return $view;
    }
}