<?php
include 'partials/_dbconnect.php';

$sql="select * from users";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
    $rows=array();
    while($row=$result->fetch_assoc()){
        $rows[]=$row;
    }
    echo json_encode($rows);
}
?>