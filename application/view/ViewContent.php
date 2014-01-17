<div class="content">
  <?php include "ViewUserbar.php"; ?>
  <div class="contentcontent">
    <?php include "ViewLeftmenu.php"; ?>
          <div class="userspace">
          <div class="usrsp-content">  
    
      <?php foreach($data as $event) {?>

            <div class="usrsp-textblock">
              <div class="usrsp-title"> <b><?php echo $event->event; ?></b> </div>
              <div class="usrsp-comment"> <b>ежедневно</b>
                <p><b>10:00, 15:00, 21:00</b></p>
              </div>
              <div class="usrsp-text">
                <?php echo $event->detail; ?>
              </div>
            </div>
            <div class="usrsp-picblock">
              <div class="usrsp-pic"> <img src="img/teaimg.jpg"></img> </div>
            </div>

      <?}php?>
          </div>

        </div>  

    
  </div>
</div>
