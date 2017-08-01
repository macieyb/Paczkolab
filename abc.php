<?php
require_once ('load.php');
var_dump(User::loadAll());
echo json_encode(User::loadAll());
var_dump(Address::loadAll());
$address = new Address();
var_dump($address->load(2));