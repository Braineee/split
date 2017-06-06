<?php
require_once ("core/init.php");

$user = new User(); // curent user

$user->logout();

Redirect::to('index.php');