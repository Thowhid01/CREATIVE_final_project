<?php
 require_once ("../../include/initialize.php");


$searchTerm = $_GET['term'];

 $mydb->setQuery("SELECT * FROM `tblstudent` WHERE `IDNO` LIKE '%".$searchTerm."%' GROUP BY IDNO");
 $res = $mydb->loadResultList();
 foreach ($res as $row ) {
 
    $data[] = $row->IDNO;
 }
 

echo json_encode($data);
?>
