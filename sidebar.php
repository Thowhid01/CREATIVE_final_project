
<!-- category -->
 <div class="panel panel-default"> 
    <div class="panel-body">
    <div class="list-group">
     <div class="well well-sm " style="background-color:#008C44;color:#fff;"><b> Recent Post </b> </div>
        <ul >
        <?php 
            $mydb->setQuery("SELECT  *
                      FROM  `tblannouncement` ORDER BY DATEPOSTED  DESC LIMIT 10");
              $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
            echo ' <li><a href="index.php?q=singleblog&id='.$result->ANNOUNCEMENTID.'" >'.$result->ANNOUNCEMENT_TEXT.'</a></li> ';
            }
        ?>
         </ul>
      </div> 
   </div> 
</div>
<!-- end category -->


<!-- login -->
<?php 
if(!isset($_SESSION['IDNO'])){

?>
 <div class="panel panel-default">
    <div class="panel-body">
        <div class="well well-sm"  style="background-color:#008C44;color:#fff;"><b >  Login </b> </div>

            <form class="form-horizontal span6" action="login.php" method="POST">
                <div class="form-group">
                  <div class="col-md-12">
                    <label class="control-label" for=
                    "U_USERNAME">Username:</label> 
                          <input   id="U_USERNAME" name="U_USERNAME" placeholder="Username" type="text" class="form-control input" >  
                  </div> 
 
                  <div class="col-md-12">
                    <label class="control-label" for=
                    "U_PASS">Password:</label> 
                     <input name="U_PASS" id="U_PASS" placeholder="Password" type="password" class="form-control input ">
             
                  </div> 
                  </div>
                  <div class="form-group">
                  <div class="col-md-12"> 
                    <button type="submit" id="sidebarLogin" name="sidebarLogin"  style="background-color:#008C44;color:#fff;" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-logged-in "></span>   Login</button> 
                     
                  </div>
                </div>


            </form>

        </div> 
</div>
<?php } ?>
