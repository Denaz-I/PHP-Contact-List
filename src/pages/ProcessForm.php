<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\Response;
use Denib\Rubrica\RedirectResponse;

class ProcessForm implements ActionContract{

    public function respond(): Response {
        return new RedirectResponse("/list");
    }
}