<?php

namespace Denib\Rubrica;

use Denib\Rubrica\pages\ActionContract;
use ReflectionClass;

class RouteConfig {

    public string $pattern;
    public mixed $delegate;

    public function __construct( string $pattern, callable | string $delegate)
    {
        $this->pattern = $pattern;

        if(is_string($delegate) && ! $this->isValid($delegate))
            throw new \Exception("invalid class $delegate");

        $this->delegate = $delegate;
    }

    private function isValid(string $delegate):bool {
        if(class_exists($delegate)) {
            $reflection = new ReflectionClass($delegate);
            RETURN $reflection->implementsInterface(ActionContract::class);
        }

        return false;
    }

}