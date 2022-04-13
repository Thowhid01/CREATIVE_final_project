<style type="text/css">
.home >  .pix_diapo , .da-thumbs{
  width: 100%;
}
 .pix_diapo div  img{
    width: 100%;
    height: 100%;
 }
 .department{
     width: 100%;
     height: 100%;
 }
</style>

<div class="home"> 
<div class="pix_diapo">

    <div data-thumb="<?php echo web_root;?>image/image11.jpg">
        <img src="<?php echo web_root;?>image/image11.jpg">
    </div>

    <div data-thumb="<?php echo web_root;?>image/image22.jpg">
        <img src="<?php echo web_root;?>image/image22.jpg"> 
    </div>

    <div data-thumb="<?php echo web_root;?>image/image33.jpg" data-time="7000">
        <img src="<?php echo web_root;?>image/image33.jpg">
    </div>       

    <div data-thumb="<?php echo web_root;?>image/image44" data-time="7000">
        <img src="<?php echo web_root;?>image/image44.jpg">
    </div>

    <div data-thumb="<?php echo web_root;?>image/image55.jpg" data-time="7000">
        <img src="<?php echo web_root;?>image/image55.jpg">
    </div> 
</div><!-- #pix_diapo --> 
    
<ul id="da-thumbs" class="da-thumbs">
    <li class="col-md-3">
        <a href="">
            <img class="department" src="images/33.jpg" />
            <div><center><span>CSE<br>Department</span></center></div>
        </a>
    </li>
    <li class="col-md-3">
        <a href="">
            <img class="department" src="images/44.jpg" />
            <div><center><span>BBA<br>Department</span></center></div>
        </a>
    </li>
    <li class="col-md-3">
        <a href="">
            <img class="department" src="images/55.jpg" />
            <div><center><span>English<br>Department</span></center></div>
        </a>
    </li>
    <li class="col-md-3">
        <a href="">
            <img class="department" src="images/66.jpg" />
            <div><center><span>MBA<br>Department</span></center></div>
        </a>
    </li>
</ul>
</div>


