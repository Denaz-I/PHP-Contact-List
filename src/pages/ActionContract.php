<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\Request;
use Denib\Rubrica\Response;

interface ActionContract {
    function respond(Request $request): Response;
}