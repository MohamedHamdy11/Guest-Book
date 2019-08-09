<?php
session_start();
require('../includes/config.php');
require('../includes/users.class.php');
require('../includes/general.functions.php');

if(checkLogin())
    exit('you are already logged in');


$error   = '';
$success = '';

//if(isset($_POST['submit']))
if(count($_POST)>0)
{
    $username = $_POST['username'];
    $password = $_POST['password'];

   $usersObject = new users();
   $userData = $usersObject->login($username,$password);

   if($userData && count($userData)>0)
   {
       //store session
       $_SESSION['user'] = $userData;
       $success = 'login successful';
   }
   else
   {
       $error = 'please write username and password';
   }

}

include('../templates/admin/login.html');


