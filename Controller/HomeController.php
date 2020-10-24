<?php

class HomeController
{
    public function home()
    {
        include("View/site/home.php");
    }

    public function sair()
    {
        session_destroy();
    }
}
