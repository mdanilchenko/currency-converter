<?php
spl_autoload_register(function ($class) {
    if(file_exists('../app/entities/' . $class . '.php')) {
        require '../app/entities/' . $class . '.php';
    }else if(file_exists('../app/exceptions/' . $class . '.php')) {
        require '../app/exceptions/' . $class . '.php';
    }
});