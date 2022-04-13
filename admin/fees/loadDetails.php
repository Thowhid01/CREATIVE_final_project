<?php
 require_once ("../../include/initialize.php");


$searchTerm = $_POST['desc'];

 $mydb->setQuery("SELECT * FROM `tblexpenses` WHERE `EXPENSEID` LIKE '%".$searchTerm."%'");
 $res = $mydb->loadSingleResult(); 

    echo $res->AMOUNT; 
?>
