<?php  
     if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

  @$SUBJ_ID = $_GET['id'];
    if($SUBJ_ID==''){
  redirect("index.php");
}
if($_GET['IDNO']==''){
    redirect("index.php");
}

if($_GET['gid']==''){
    redirect("index.php");
}


  $subject = New Subject();
  $res = $subject->single_subject($SUBJ_ID);

?> 

 <form class="form-horizontal span6" action="controller.php?action=addgrade" method="POST">

      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add Grade</h1>
          </div>
          
       </div> 
                   
                    
                       <input class="form-control input-sm" id="IDNO" name="IDNO" placeholder=
                            "Account Id" type="Hidden" value="<?php echo $_GET['IDNO']; ?>">
                        
                         <input class="form-control input-sm" id="SUBJ_ID" name="SUBJ_ID" placeholder=
                            "Account Id" type="Hidden" value="<?php echo $res->SUBJ_ID; ?>">

                            <input class="form-control input-sm" id="GRADEID" name="GRADEID" placeholder=
                            "Account Id" type="Hidden" value="<?php echo $_GET['gid']; ?>">
                
       
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "AVERAGE">Average:</label>

                      <div class="col-md-8">
                        
                         <input class="form-control input-sm" id="AVERAGE" name="AVERAGE" placeholder=
                            "0" type="text" value=""   required>
                      </div>
                    </div>
                  </div>
                   
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                       <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                          <a href="index.php?view=grades&id=<?php echo $_GET['IDNO']; ?>" class="btn btn-info"><span class="fa fa-arrow-circle-left fw-fa"></span></span>&nbsp;<strong>Back</strong></a>
                       </div>
                    </div>
                  </div>

          
        </form>
      

        </div><!--End of container-->