<?php

$conn = pg_connect("host=localhost user=postgres password=12345 dbname=yaseen");
if($conn)
  {

    $result =pg_query($conn,"select * from busdetails");
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
  <link rel="stylesheet" href="home.css">

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

      <table>
      <tr>
              <th>Bus name</th>
              <th>Place</th>
              <th>Time</th>
              <th>Last stop</th>
            </tr>


        <?php
            while($row=pg_fetch_row($result))
    {
    
           echo "
            <tr>
              <td> $row[0]</td>
              <td> $row[1]</td>
              <td> $row[2]</td>
              <td> $row[3]</td>
            </tr>";
    }
    ?>

      </table>

        </div>
    </div>

  </div>
</body>

</html>

  

