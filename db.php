<?php
$servername="localhost";
$username="root";
$password="";
$dbname="niyas";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
die("connection failed:".$conn->connect_error);
}
else
{
echo("connection");
}
$sql="CREATE TABLE Team(
id int(6) ,
name VARCHAR(30), 
email VARCHAR(50),
place VARCHAR(30)
)";
if($conn->query($sql)===TRUE){
echo " Table MyGuests created successfully";
}
else
{
echo "Error creating table: ". $conn->error;
}

$ins="insert into  Team(id,name,email,place) values(001,'john','abc@gmail.com','malappuram')";
if($conn->query($ins) === TRUE)
{
echo"insert successfully";
}
else
{
echo "Error creating table: ". $conn->error;
}
$conn->close();
?>