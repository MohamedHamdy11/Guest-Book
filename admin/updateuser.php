<?php
session_start();
require('../includes/config.php');
require('../includes/users.class.php');
require('../includes/general.functions.php');

if(!checkLogin())
    exit('you are not allowed to view this page (not login)');

//get id user
$idFromUrl = (isset($_GET['id']))? (int)$_GET['id'] : 0;

$usersObject = new users();

$error   = '';
$success = '';
if(count($_POST)>0)
{

   if($usersObject->updateUser($_POST['id'],$_POST['username'],$_POST['password'],$_POST['email']))
       $success = 'user update';
   else
       $error = 'user not updated';
}
else
{
    //get user from db:
    $user =$usersObject->getUser($idFromUrl);

    //show user in from


}


include('../templates/admin/header.html');
include('../templates/admin/menu.html');
include('../templates/admin/update-user.html');
include('../templates/admin/footer.html');
