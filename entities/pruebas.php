<?php
include 'User.php';
$id=1;
$result=User::getUser($id);
var_dump($result);