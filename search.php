<?php
        
        $start=$_GET["start"];
        $lstop=$_GET["lstop"];
  //       $refresh= isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] ==='max-age=0';
  //       if($refresh){
          
  // unset($start,$lstop);
  // unset($_GET);
  // $_GET=array();

  //       }

        $conn=pg_connect("host=localhost user=postgres password=12345 dbname=yaseen");
        if($conn){
if($start && $lstop){
$qry="select busname,time from busdetails where place='$start'and lstop='$lstop'";
$result=pg_query($conn,$qry);
}
        }
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="search.css">

</head>

<body>
  <div class="all">
    <div class="appbar">
        <div class="ibusdiv">
             <img src="bus.png" class="ibus">
        </div>

      <div class="appbartitle">Bus Note

      </div>
      <div class="navlinks">
        <a href="home.php">
          <div class="icons"><i class='fa fa-home sc '></i> Home</div>
        </a>
        <a href="search.php">
          <div class="icons"><i class="fa fa-search sc"></i> Search</div>
        </a>
        <a href="add.html">
        <div class="icons" style="padding-right: 27px;"><i class="fa fa-plus sc"></i> Add </div></a>

      </div>
    </div>

    <div class="bodyall">
      <div class="mainall">
        <div class="searchbar">
          <form action="" method="get">

          <div class="inp"><input type="text" name="start"  placeholder="    Start"  class="input"></div>
          <div class="inp"><input type="text" name="lstop" placeholder="    Last stop" class="input"></div>
          <div class="btndiv"><input type="submit" value="Search" class="button"></div>
          </form>

        </div>

       <?php
       if($start && $lstop){
       if (pg_num_rows($result)==0) {

        echo "<h2>No Result Found</h2>";
       }
       elseif(pg_num_rows($result)>0){
        echo "<table>
<tr>
        <th>Bus name</th>
        <th>Time</th>
      </tr>";
       }
       
while($row=pg_fetch_row($result)){
    echo "
            <tr>
              <td> $row[0]</td>
              <td> $row[1]</td>
            </tr>
            ";
  
}
    
  pg_close($conn); 
  
} 
?>
        </table>
        
        
    </div>
      

    </div>

  </div>
</body>

</html>