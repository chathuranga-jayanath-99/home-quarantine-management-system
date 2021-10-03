<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function add($route, $params = [])
    {   
        // {controller}/{action} => {controller}\/{action}
        $route = preg_replace('/\//', '\\/', $route);
        
        // {controller}\/{action} => (?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)
        $route = preg_replace('/\{([a-z-]+)\}/', '(?P<\1>[a-z-]+)', $route);

        $route = preg_replace('/\{([a-z-]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // /^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/i
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function dispatch($url)
    {   
        $url = $this->removeQueryStringVariables($url);

        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->converToStudlyCaps($controller);
            $controller = $this->getNameSpace() . $controller;
            
            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                } 
                else {
                    echo "Method $action in controller $controller not found";
                }
            }
            else {
                echo "controller class $controller not found";
            }
        }
        else {
            echo "No route found";
        }
    }

    public function converToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    public function convertToCamelCase($string)
    {
        return lcfirst($this->converToStudlyCaps($string));
    }

    protected function removeQueryStringVariables($url)
    {
        if ($url != '') {
            $parts = explode('&', $url, 2);

            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } 
            else {
                $url = '';
            }
        }

        return $url;
    }

    protected function getNameSpace()
    {
        $namespace = 'App\Controllers\\';

        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }
}