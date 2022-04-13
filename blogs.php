<style type="text/css"> 
#title-header {
    background-color: #fff;
    border-bottom: 1px solid #ddd;
    margin-bottom: 30px;
}
#title-header > .title  {
    width: 1050px;
    margin-left: 150px;
}
/*#title-header > .title  > img {
    width: 100%;
    height: 130px;
}*/
#title-header > .title  > p {
    width: 100%;
    height: 130px;
    font-family: "Arial";
    font-size: 90px;
    text-align: center;
}
.f-author {
     /*border-top: 1px solid #eee;*/
     padding: 5px;
}
.mg-available-rooms {
    border-bottom: 1px solid #ddd;
    /*border-top: 1px solid #ddd;*/
    margin-bottom: 20px;
}
.mg-available-rooms  .s-content{ 
    text-align: center;
    padding: 20px;
}
  
@media only screen and (max-width: 768px){
    #title-header > .title  {
        margin: 0px;
        padding: 0px; 
        height: 90px;
        width: 100%;
    }
  /*  #title-header > .title  >img {
        width: 100%;
        height: auto;
    }*/
      #title-header > .title  >p {
        width: 100%; 
        font-size: 50px;
    }


 
}
</style>  
 <div class="container">
 	<?php 
 	$sql = "SELECT * FROM `tblannouncement`  ORDER BY `DATEPOSTED` DESC";
		$mydb->setQuery($sql);
		$blog = $mydb->loadResultList();
	foreach ($blog as $result) {  

 // // `BLOGS`, `BLOG_WHAT`, `BLOG_WHEN`, `BLOG_WHERE`, `DATEPOSTED`
	?>
     <div class="mg-available-rooms col-lg-12">
                <div class="mg-avl-rooms">
                    <div class="mg-avl-room">
                        <div class="row">
                            <div class="col-sm-2 s-content" >
                                <span class="fa fa-calendar-o" style="font-size: 55px">
                                	<!-- <?php echo date_format(date_create($result->DATEPOSTED),'d M'); ?> -->
                                </span>  
         						  <h5 class="mg-sec-left-title"><?php echo date_format(date_create($result->DATEPOSTED),'M d, Y'); ?></h5>
                            </div>
                            <div class="col-sm-10">
                                <div style=" padding: 10px;font-size: 25px;font-weight: bold;color: #000;margin-bottom: 5px;">
                                <a href="<?php echo web_root ?>index.php?q=singleblog&id=<?php echo $result->ANNOUNCEMENTID; ?>">
                                <?php echo $result->ANNOUNCEMENT_TEXT ;?> 
                                </a>
                                </div> 
                                <div class="row contentbody">
                                    <div class="col-sm-12">
                                      <p> <?php echo $result->ANNOUNCEMENT_WHAT; ?></p> 
                                    </div>
                                
                                    <div class="col-sm-12 f-author">
                                        <p><span class="fa fa-user"></span> Author :  <?php echo  $result->AUTHOR; ?> on  <?php echo  date_format(date_create($result->DATEPOSTED),"d M Y h:i a"); ?></p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
          <?php } ?> 

</div> 