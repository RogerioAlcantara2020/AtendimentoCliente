<?php session_start(); 


if (isset($_GET["Controller"])) {
    include "Controller/" . $_GET["Controller"] . "Controller.php";

    $class = $_GET["Controller"] . "Controller";

    eval("\$Controller = new $class();");

    if (isset($_GET["Action"])) {
        eval("\$Controller->{$_GET['Action']}();");
    }
} else {
    $Controller = "Home";
    include "Controller/{$Controller}Controller.php";

    $class = $Controller . "Controller";

    eval("\$Controller = new $class();");

    eval("\$Controller = new $class();");
    $action = "home";

    eval("\$Controller->{$action}();");
}

