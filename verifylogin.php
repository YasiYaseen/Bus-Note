
<?php
$flag=0;
$uname=$_GET["username"];
$pass =$_GET["password"];
$con = pg_connect("host=localhost user=postgres password=12345 dbname=yaseen");
if($con){
$qry="select usr, pas from users";
$select = pg_query($con,$qry);
while($row =pg_fetch_row($select))
{
    $dbuname=$row[0];
    $dbpass=$row[1];
    if($dbuname==$uname && $dbpass==$pass)
    {
        $flag=1;
    }
}

if($flag==1)
{
    echo "<script>location.href='home.php'</script>";
}
else
{
    echo "<script>location.href='login.html'</script>";
    
    
}
}
else 
{
    echo "no";
}
?>