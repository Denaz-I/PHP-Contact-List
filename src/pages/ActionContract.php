<?php

namespace Denib\Rubrica\pages;

use Denib\Rubrica\Response;

interface ActionContract {
    function respond(): Response;
}