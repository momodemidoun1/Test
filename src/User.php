<?php
namespace Event;

class User
{

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

}