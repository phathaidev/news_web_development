<?php include('header.php');  ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Feedback Message
      </h1>
    </section>
    <!-- Main content -->
    <section class="container">
  <?php
        $sql_select     = " SELECT * FROM `tbl_feedback` ";
        $result_select  = mysqli_query($con,$sql_select);
        
        echo "
          <table class='table'>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Message</th>
              <th>Date</th>
              <th>Time</th>
             
            </tr>
        ";
        while($message = mysqli_fetch_assoc($result_select)) {
          $id=$message['id'];
  ?>

          <tr>
            <td> <?php echo $message['name'];?> </td>
            <td><?php echo $message['email']; ?></td>
            <td><?php echo $message['message']; ?></td>
            <td><?php echo $message['date']; ?></td>
            <td><?php echo $message['time']; ?></td>
            <td> <input type='submit' onclick='deleteme(<?php echo $id ?>)' name='delete' value='Delete' class='btn btn-danger'></td>
          </tr>

  <?php
        }
      echo "</table>";
     

  ?>
<script>
       function deleteme(delId){
           if(confirm("Are you sure to delete this?")){
               window.location.href='delete_feedback.php?del_id=' + delId + '';
               return true;
           }
       }
     

   </script>
<?php include('footer.php');  ?>



