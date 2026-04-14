<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\Response;
use Denib\Rubrica\RedirectResponse;
use Denib\Rubrica\Request;

class ProcessForm implements ActionContract{

    public function respond(Request $request): Response {

        return new RedirectResponse("/");
    }
}