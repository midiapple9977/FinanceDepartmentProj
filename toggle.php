<?php
 $server="localhost";
 $username ="root";
 $password ="";
 $dbname = "student";
 $sonnection = mysqli_connect($server,$username,$password,$dbname);





$catId = $_POST['catId'];
$sql = "SELECT * From studentinfo WHERE id= $catId";
$result= mysqli_query($sonnection, $sql);
$data = mysqli_fetch_assoc($result);
$status = $data['status'];

if($status == '0'){
    $status = '1';
}else{
    $status = '0';
}

$update = "UPDATE studentinfo SET status='$status' WHERE id=$catId "; 
$result1= mysqli_query($sonnection, $update);
if($result1){
    echo $status;
}
?>