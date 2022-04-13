 
  <div class="panel-group" id="accordion">
  <ul>
 
<?php 

$mydb->setQuery("SELECT * FROM `department`");

              $cur = $mydb->loadResultList();

            foreach ($cur as $result) {

?>
<li>

    <div class="panel-heading">
      <h4 class="panel-title">
        <a id="load"  data-toggle="collapse" data-parent="#accordion" href="#<?php echo $result->DEPT_ID; ?>" data-id="<?php echo $result->DEPT_ID; ?>">
          <?php echo $result->DEPARTMENT_DESC . ' [ ' .$result->DEPARTMENT_NAME . ' ] '; ?> <i class="fa fa-caret-down"></i>
        </a>
      </h4>
    </div>

 <div id="<?php echo $result->DEPT_ID; ?>" class="panel-collapse collapse out">
      <div class="panel-body">
      <div id="loaddata<?php echo $result->DEPT_ID; ?>">
        <?php
          $sql = "SELECT * FROM `course` WHERE `DEPT_ID` = ".$result->DEPT_ID;
          $mydb->setQuery($sql);
          $res = $mydb->loadResultList();
          foreach ($res as $row) {
             echo '<ul>';
             echo '<li>'.$row->COURSE_NAME.' | '.$row->COURSE_DESC.'</li>';
             echo '</ul>';
          }
        ?>
      </div>
      </div>
    </div>
 
 </li>


<?php } ?>
</ul> 

  
</div>
 
    
