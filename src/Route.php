<?php

namespace Denib\Rubrica;

class Route {

    private static array $get = [];
    private static array $post = [];

    public static function Resolve(Request $request):RouteConfig {

        $uri = $_SERVER['REQUEST_URI'];

        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            return self::ResolvePage (self::$get, $uri, $request);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            return self::ResolvePage (self::$post, $uri, $request);
        }       
        
        throw new \Exception("Method not allowed");
    }

    /*
    *permette di impostare una RouteConfig nell'archivio delle configurazioni GET
    *
    *@param string $route
    *@param callable $delegate

    *@return void
    */

    public static function Get(string $route, callable | string $delegate) {
        self::$get[] = new RouteConfig($route, $delegate);
    }

    /*
    *permette di impostare una RouteConfig nell'archivio delle configurazioni GET
    *
    *@param string $route
    *@param callable $delegate

    *@return void
    */

    public static function Post(string $route, callable | string $delegate) {
        self::$post[] = new RouteConfig($route, $delegate);
    }

    private static function ResolvePage(array $routes, string $uri, Request $request): RouteConfig{
        foreach($routes as $value){

            $uri = explode('?', $uri)[0];

                if($value->pattern == $uri){
                    return $value;
                }
            };

            return new RouteConfig("*", function(){
                return "not-found";
            });
    }
}