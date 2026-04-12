<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\Response;
use Denib\Rubrica\ViewResponse;

class ContactForm implements ActionContract{

    public function respond(): Response {

        $view = new ViewResponse("form.html.twig", [
            "test" => "IT WORKS"
        ]);

        return $view;
    }
}