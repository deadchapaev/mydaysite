<div class="content">
  <?php include "ViewUserbar.php"; ?>
  <div class="contentcontent">
    <?php include "ViewLeftmenu.php"; ?>         
          
	  <?php 
	  if (null != $data) 
		foreach($data as $event) {?>
		<div class="userspace">
			<div class="usrsp-content">  
				<div class="usrsp-textblock">
				<div class="usrsp-title"> <b><?php echo $event->event; ?></b> </div>
				<div class="usrsp-comment"> <b>ежедневно</b>
					<p><b>10:00, 15:00, 21:00</b></p>
				</div>
				<div class="usrsp-text">
					<?php echo $event->detail; ?>
				</div>
				</div>

			</div>
			<div style="clear: both"></div>
			</div> 
      <?php
	  }
	  ?>
    <div style="clear: both"></div>
  </div>
  <div style="clear: both"></div>
</div>
