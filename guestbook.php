<?php
include('includes/config.php');
include('includes/messages.class.php');
$selected = 'gb';

include('templates/front/header.html');

$error  = '';
$success= '';

$gbObject = new messages();


if(count($_POST)>0)
{
    if($gbObject->addMessage($_POST['title'],$_POST['content'],$_POST['name'],$_POST['email']))
    {
        $success = 'Message Added successfully';

    }
    else
    {
        $error = 'Error Adding Message';

    }

    $messages = $gbObject->getMessages('ORDER BY `id` DESC');
}
else
{
    $messages = $gbObject->getMessages('ORDER BY `id` DESC');
}

include('templates/front/guestbook.html');

include('templates/front/footer.html');

