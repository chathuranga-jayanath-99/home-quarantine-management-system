<?php

class A{
    private $a;
    public function __construct()
    {
        $a = "mama";
    }
}
class B{
    private static $b;

    public function __construct()
    {
        $b = new A();
    }

}
$b = new A();