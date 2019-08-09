<?php
session_start();

require('../includes/general.functions.php');

//not login
if(!checkLogin())
    exit('you are not allowed to view this page');



include('../templates/admin/header.html');
include('../templates/admin/menu.html');
include('../templates/admin/index.html');
include('../templates/admin/footer.html');