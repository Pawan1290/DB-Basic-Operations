<?php  

$conn = mysqli_connect('localhost', 'root', '','Database');
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  
$id = $_GET['id'] ;
$sql = "DELETE FROM Info WHERE id = $id";  
if(mysqli_query($conn, $sql)){  
 Header('Location: mainPage.php'); 
}else{  
echo "Could not delete record: ". mysqli_error($conn);  
}  
mysqli_close($conn);  
?>