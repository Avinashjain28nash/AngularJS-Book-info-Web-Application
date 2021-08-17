 <?php  
 //delete.php  
 $connect = mysqli_connect("localhost:3307", "root", "", "library");  
 $data = json_decode(file_get_contents("php://input"));  

 if(count(array($data)) > 0)  
 {  
     $id = $data->send_id;  
      $query = "DELETE FROM booking WHERE id='$id'";  
      if(mysqli_query($connect, $query))  
      {  
           echo 'Data Deleted';  
      }  
      else  
      {  
           echo 'Error';  
      }  
 }  
 ?>  
