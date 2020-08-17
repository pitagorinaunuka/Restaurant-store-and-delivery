<?php

abstract class UtilController
{
    abstract public function render($viewname, $args = array());
}


class Util extends UtilController
{
    public function render($viewname, $args = array())
    {
        Flight::render($viewname . ".php", $args);
    }
}
