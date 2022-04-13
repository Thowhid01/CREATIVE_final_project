 <style type="text/css"> 
#title-header {
  background-color: #fff;
  border-bottom: 1px solid #ddd;
  margin-bottom: 30px;
}
#title-header > .title  {
  width: 1050px;
  margin-left: 120px;
}
#title-header > .title  > p {
    width: 100%;
    height: 130px;
    font-family: "Arial";
    font-size: 90px;
    text-align: center;
}

.f-author {
  
   padding: 5px;
}
.mg-available-rooms {
  border-bottom: 1px solid #ddd;
  margin-bottom: 20px;
}
.mg-available-rooms  .s-content{ 
  text-align: center;
  padding: 20px;
}

 
.blog-body{
  margin-left: 5%;
}
  
@media only screen and (max-width: 768px){
  #title-header > .title  {
    margin: 0px;
    padding: 0px; 
    height: 90px;
    width: 100%;
    }
  
      #title-header > .title  >p {
        width: 100%; 
        font-size: 50px;
    }
    .col-lg-8 {
      margin:0;

    }

 
}
</style> 

<?php 
    $BLOGID = isset($_GET['id']) ? $_GET['id'] :"";
    if ($BLOGID=="") {
      
      redirect("index.php");
    }

    



    $sql = "SELECT * FROM `tblannouncement` WHERE ANNOUNCEMENTID='{$BLOGID}'";
    $mydb->setQuery($sql);
    $blog = $mydb->loadSingleResult();
?>

 
<div class="container">
  <div class="col-lg-12" style="text-align: center;font-size: 30px;text-decoration: underline; "> <?php echo $blog->ANNOUNCEMENT_TEXT ;?> </div>
<div class="col-lg-12">
  <p class="blog-body"><?php echo $blog->ANNOUNCEMENT_WHAT;?></p>
</div> 
<div class="col-lg-12">
 <?php echo $blog->ANNOUNCEMENT_WHEN .' at '.$blog->ANNOUNCEMENT_WHERE;?></p> -->
</div>
<div class="col-lg-12">
  <p><span class="fa fa-user"></span> By : <?php echo $blog->AUTHOR .' - <span class="fa fa-calendar"></span> '.date_format(date_create($blog->DATEPOSTED),"M d, Y");?></p>
</div>
 </div>