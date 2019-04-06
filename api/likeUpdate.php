<?php
include '../cms/constants/constants.php';
include '../cms/lib/Database.php';
include '../cms/lib/Section.php';
$con = new Section();
echo $con->likeUpdate($_GET['id'], $_GET['value'])
?>