<?php
session_start();
require('../includes/config.php');
require('../includes/messages.class.php');
require('../includes/general.functions.php');

if(!checkLogin())
    exit('you are not allowed to view this page');

$gbObject = new messages();

$idFromUrl = (isset($_GET['id']))? (int)$_GET['id'] : 0;
$error = '';
$success = '';

include('../templates/admin/header.html');
include('../templates/admin/menu.html');
if(count($_POST)>0)
{
    if($gbObject->updateMessage($_POST['id'],$_POST['title'],$_POST['content']))
    {
        $success = 'Message Updated Successfully';
    }
    else
    {
        $error = 'Message Not Updated';
    }
    include('../templates/admin/update-message.html');
    include('../templates/admin/footer.html');
    exit;
}
else
{
    $message = $gbObject->getMessage($idFromUrl);

    if(!$message || count($message) ==0)
    {
        $error = 'Message Not Found';
        include('../templates/admin/resultmessage.html');
        include('../templates/admin/footer.html');
        exit;
    }
   include('../templates/admin/update-message.html');

}

include('../templates/admin/footer.html');