<?php
trait SayWorld
{
    public function sayHello()
    {
        parent::sayHello();
        //echo __TRAIT__;
        echo 'World!';
    }
}
?>