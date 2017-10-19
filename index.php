<?php
//Get p về để kiểm tra để chuyển trang
if(isset($_GET["p"]))
    $p=$_GET["p"];
else
    $p="";
?>
<?php include "view/header.inc.php"; ?>
<!--nội dung trang-->
<?php
switch($p){
    case "detail": require "view/detail.inc.php"; break;
    case "search": require "view/search.inc.php"; break;
    case "askquestion": require "view/askquestion.inc.php"; break;
    default: require "view/Home.inc.php";
}
?>
<!--kết thúc nội dung trang-->
<?php  include_once 'view/footer.inc.php'?>


