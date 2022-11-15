<?php  

     include("dbConnect.php");
 $query ="SELECT * FROM `tbl_news_post` ORDER BY `news_id` DESC";  
 $result = mysqli_query($con, $query);  
   ?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Table News</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  

           <br /><br />  
           <div class="container-fluid">  
                <h1 align="center">Table News</h1>  
                <br />  
                <div class="table-responsive">  
                <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                   <td>ID</td>
                                    <td>Title</td>  
                                    <td>Descript</td>  
                                    <td>Big Cover</td>  
                                    <td>Small Cover</td>  
                                    <td>News Type</td>
                                    <td>News Writer</td>
                                    <td>Date</td>
                                    <td>Action</td>
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                            $id=$row["news_id"];
                            $tTitle=$row["news_Title"];
                            $tdescript=$row["news_description"]; 
                            $tbCover=$row["news_big_cover"];
                            $tsCover=$row["news_small_cover"];
                            $tdate=$row["news_date"];
                            $type=$row["news_type"];
                            $news_writer=$row["news_writer"];
                            ?>
                              <tr>
                              <td><?php echo $id; ?></td>
                              <td><?php echo $tTitle; ?></td>
                              <td><?php echo $tdescript; ?></td>
                              <td><img src="../image/<?php echo $tbCover; ?>" width="50px" height="50px"></td>
                              <td><img src="../image/<?php echo $tsCover; ?>" width="50px" height="50px"></td>
                              <td><?php echo $type; ?></td>
                              <td><?php echo $news_writer; ?></td>
                              <td><?php echo $tdate; ?></td>
                              <td><input type="button" name="Delete" onClick="checkDelete(<?php echo $id; ?>)" value="Delete" class="btn btn-danger">
                              <input type="button" name="Update" onClick="checkUpdate(<?php echo $id; ?>)" value="Update" class="btn btn-primary"></td>
                              </tr>
                         <?php
                         }
                         echo "</table>";
                         ?>
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  

 function checkDelete(delid){
               if(confirm("Are you sure to delete this?")){
                window.location.href="delete.php?del_id=" + delid+"";
                return true;
               }
            }
function checkUpdate(upid){
     window.location.href="update.php?up_id="+upid+"";
     return true;
}
 </script>