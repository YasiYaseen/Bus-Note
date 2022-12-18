<?php
$busname =$_POST["busname"];
$place = $_POST["Place"];
$time = $_POST["time"];
$lstop = $_POST["Laststop"];




$conn = pg_connect("host=localhost user=postgres password=12345 dbname=yaseen");
if($conn){
    

    if($busname){
    $qry = "insert into busdetails values ('$busname' ,'$place','$time','$lstop')";
    pg_query($conn,$qry);
    echo "<script>location.href='home.php'</script>";

    }
    else
    {
        echo "<script>location.href='add.html'</script>";

    }
}
    else
    {
        echo "not succesful";
    }


    ?>