 <?php  
 //insert.php  
 $connect = mysqli_connect("localhost:3307", "root", "", "library");  
 
 $data = json_decode(file_get_contents("php://input"));  
 
 if(count(array($data)) > 0)  
 
 {  
      $usn_received = mysqli_real_escape_string($connect, $data->send_usn); 
      $name_received = mysqli_real_escape_string($connect, $data->send_name);       
      $phone_received = mysqli_real_escape_string($connect, $data->send_phone);
      $book_received = mysqli_real_escape_string($connect, $data->send_book);
      $status_received = mysqli_real_escape_string($connect, $data->send_status);
      $btnname_received = mysqli_real_escape_string($connect, $data->send_btnName);
      
     
   
	  if($btnname_received == 'ADD'){
      $query = "INSERT INTO booking (usn,name, phone,book, status) VALUES ('$usn_received','$name_received', '$phone_received','$book_received','$status_received')";  
      if(mysqli_query($connect, $query))  
      {  
           echo "Data Inserted...";  
      }  
      else  
      {  
           echo 'Error in Inserting..!';  
      }  
     }



     if($btnname_received == 'Update'){
          $id_received = mysqli_real_escape_string($connect, $data->send_id);

          $query = "UPDATE booking SET  usn = '$usn_received',name = '$name_received', phone = '$phone_received' ,book = '$book_received',status = '$status_received' WHERE id = '$id_received'";  

  
          if(mysqli_query($connect, $query))  
          {  
               echo 'Data Updated';  
          }  
          else  
          {  
               echo 'Error in Updating..!';  
          }  
     }




 }  
 ?>  
