<?php  
     if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

  @$USERID = $_GET['id'];
    if($USERID==''){
  redirect("index.php");
}
  $user = New User();
  $singleuser = $user->single_user($USERID);

?> 



 
 <h2 class="page-header"> <small>Instructor Name: </small><?php echo $singleuser->ACCOUNT_NAME; ?></h2>
 <h3>Instructor Subjects</h3>
   <form action="controller.php?action=add" Method="POST" style="margin-bottom:20px;">  
     <input name="USERID"  type="Hidden" value="<?php echo $singleuser->ACCOUNT_ID; ?>">
    <div class="table-responsive">      
        <table id="dash-table" class="table table-striped table-bordered table-hover table-responsive" style="font-size:12px" cellspacing="0">
        
          <thead>
            <tr>
              <th>ID</th>
              <th>Subject Code</th>
              <th>Description</th> 
            
              <th>Course</th>
              <th>Year Level</th>
              <th>Section</th>
              <th>Academic Year</th>
              <th>Semester</th> 
              <th >Action</th> 
         
            </tr> 
          </thead> 
          <tbody>
            <?php  
              $mydb->setQuery("SELECT * FROM  tblsection sec, `tblinstructorsubject` i,`subject` s, `course` c WHERE sec.SECTIONID=i.SECTIONID AND i.`SUBJ_ID`=s.`SUBJ_ID` AND s.COURSE_ID=c.COURSE_ID  AND ACCOUNT_ID='{$USERID}'");

              $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<tr>';
              
              echo '<td >' .$result->SUBJ_ID .'</td>'; 
              echo '<td>'. $result->SUBJ_CODE.'</td>';
              echo '<td>'. $result->SUBJ_DESCRIPTION.'</td>';
             
              echo '<td>'. $result->COURSE_NAME.'</td>';
              echo '<td>'. $result->YEARLEVEL.'</td>';
              echo '<td>'. $result->SECTION.'</td>';
              echo '<td>' . $result->AY.'</a></td>';
              echo '<td>'. $result->SEMESTER.'</td>'; 
             
               echo '<td>
                       <a class="btn btn-xs btn-danger fa fa-trash" href="controller.php?action=delete&id='.$result->INST_ID.'"> Remove</a>
                       </td>'; 
              echo '</tr>';
            } 
            ?>
          </tbody>
          
        </table> 

      </div>
</form>          
      

     