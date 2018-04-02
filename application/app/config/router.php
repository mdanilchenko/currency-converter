<?php

$router = $di->getRouter();

$router->add(
    "/(.*)",
    [
        "controller" => "catchAll",
        "action"     => "index",
        "path"       => 1,
    ]
);
$router->add(
    "/converter/([A-Z]{3})/([A-Z]{3})/(\d+(\.\d{1,2})?|NULL)",
    [
        "controller" => "converter",
        "action"     => "index",
        "from"       => 1,
        "to"         => 2,
        "money"      => 3,
    ]
);
$router->add(
    "/",
    [
        "controller" => "index",
        "action"     => "index",
    ]
);

$router->handle();
