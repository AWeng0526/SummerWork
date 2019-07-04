<?php
require "traitFun.php";
class Base
{
    public function sayHello()
    {
        echo 'Hello ';
    }
}



class MyHelloWorld extends Base
{
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
