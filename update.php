<?php  
 //insert.php  
 $connect = mysqli_connect("localhost:3307", "root", "", "library");  
 
 $data = json_decode(file_get_contents("php://input"));  
 
 if(count(array($data)) > 0)  
 
 {  
     $id_received = mysqli_real_escape_string($connect, $data->id_for_update);
     $usn_received = mysqli_real_escape_string($connect, $data->usn_for_update);
      $name_received = mysqli_real_escape_string($connect, $data->name_for_update);       
      $phone_received = mysqli_real_escape_string($connect, $data->phone_for_update);
      $book_received = mysqli_real_escape_string($connect, $data->book_for_update);


      $query = "UPDATE booking SET  usn = '$usn_received',name = '$name_received', phone = '$phone_received' ,book = '$book_received',status = '$status_received' WHERE id = '$id_received'";    

  
      if(mysqli_query($connect, $query))  
      {  
           echo "Data Updates...";  
      }  
      else  
      {  
           echo 'Error in Updating!!!';  
      }  
 }  
 ?>  
