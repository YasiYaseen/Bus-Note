<?php
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$conn = pg_connect("host=localhost user=postgres password=12345 dbname=yaseen");
if($conn){
    echo "succesful";
    if($username){
    $qr="insert into users values ('$username','$password','$email')";
    pg_query($conn,$qr);
}
    $query = "select * from users";
    $rs=pg_query($conn,$query);
while($row=pg_fetch_row($rs))
{
    echo "<br>";
    echo "$row[0]  &nbsp&nbsp&nbsp   $row[1] &nbsp&nbsp&nbsp $row[2]";
    
}
    }
    else
    echo "no";
?>