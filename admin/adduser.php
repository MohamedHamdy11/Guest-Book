<?php
session_start();
require('../includes/config.php');
require('../includes/users.class.php');
require('../includes/general.functions.php');

if(!checkLogin())
    exit('you are not allowed to view this page');

$error   = '';
$success = '';

if(count($_POST)>0)
{
    $usersObject = new users();
    if($usersObject->addUser($_POST['username'],$_POST['password'],$_POST['email']))
        $success = 'User added successfully';
    else
        $error = 'Invalid data submitted';

}

include('../templates/admin/header.html');
include('../templates/admin/menu.html');
include('../templates/admin/add-user.html');
include('../templates/admin/footer.html');