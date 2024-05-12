<?php
include('db.php');
      $query="select * from bb ";
      $run=mysqli_query($con,$query);
      while ($row=mysqli_fetch_array($run)){
        $name=$row['name'];
        $message=$row['message']; // Assuming the column name is 'message'
        $date=$row['date'];
    
      ?>
        <div id="chatdata">
        <span style="color:gold;"><?php echo $name?></span>
        <span>:</span>
        <span><?php echo $message?></span>
        <span style="color:tomato;"><?php echo $date?></span>
      </div>
      <?php }?>