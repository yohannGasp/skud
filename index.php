<!DOCTYPE html>
<html>
<head>
	<title>SKUD information</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />      
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/calendar.css"/>
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <script type="text/javascript" src="style/calendar.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>

<!-- PHP -->
<?php

include_once('view.php');
include_once('db_fns.php');
if(isset($_GET["date1"])) {
  $date1 = $_GET["date1"];  
}
if(isset($_GET["date2"])) {
  $date2 = $_GET["date2"];
}
if(isset($_GET["fio"]))  {
  $fio   = $_GET["fio"];
}
if(isset($_GET["vk"]))  {
  $vk   = $_GET["vk"];
}
if(isset($_GET["vdiv"]))  {
  $vdiv   = $_GET["vdiv"];
}

$view = new View();
$view -> view_header();

if(isset($date1) and isset($date2)) {
   
    if(isset($fio) and $fio<>""){
        $param1 = " and p2.Name LIKE '%" . P_to_Conv($fio) . "%' ";
    } else {$param1 = "";}

    if(isset($vk) and $vk<>""){
        $param1 .= " and p1.Hozorgan = ". $vk;
    }

    if(isset($vdiv) and $vdiv<>""){
        $param1 .= " and p4.Name LIKE '%" . $vdiv . "%' ";
    }

    $view -> view_content(array($date1,$date2,$param1));
}

$view -> view_footer();
// phpinfo();
?>

<video autoplay="" loop="" class="fillWidth fadeIn animated" poster="mp4/Sail-Away.jpg" style="width: 1903px;">
            <source src="mp4/Sail-Away.mp4" type="video/mp4">
            Your browser does not support the video tag. I suggest you upgrade your browser.
            <source src="mp4/Sail-Away.webm" type="video/webm">
            Your browser does not support the video tag. I suggest you upgrade your browser.
</video>

</body>
</html>

   

