<?php  
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$dbname = 'Database';  
  
$conn = mysqli_connect($host, $user, $pass,$dbname);  
if(!$conn){  
  die('Could not connect: '.mysqli_connect_error());  
}  
 $Name=$_POST['Name'];
 $Country=$_POST['Country'];
 $check = "SELECT * FROM Info WHERE Name = '$Name' AND Country = '$Country'";
 $result = mysqli_query($conn,$check);
 if(mysqli_num_rows($result) < 1){
$sql = "INSERT INTO `Info` (`Name`, `Country`) VALUES ('$Name','$Country')";  
if(mysqli_query($conn, $sql)){  
 Header('Location: mainPage.php'); 
}else{  
echo "Could not insert record: ". mysqli_error($conn);  
} 
}else{
Header('Location: mainPage.php'); 
}
mysqli_close($conn);  
?>