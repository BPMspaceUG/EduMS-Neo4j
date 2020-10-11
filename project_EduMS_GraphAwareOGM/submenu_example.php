<?php

use PhpSchool\CliMenu\Builder\CliMenuBuilder;
use PhpSchool\CliMenu\CliMenu;

require_once 'bootstrap.php';


$callable = function (CliMenu $menu) {
    echo "I'm just a boring selectable item";
};

$menu = (new CliMenuBuilder)
    ->addItem('Normal Item', $callable)
    ->addSubMenu('Super Sub Menu', function (CliMenuBuilder $b) {
		global $callable;
        $b->setTitle('Behold the awesomeness')
            ->addItem('SUB Item', $callable);
    })
    ->build();
$menu->open();