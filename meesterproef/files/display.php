<?php
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 5; URL=$url"); // Refresh the webpage every 5 seconds
?>
<html>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <head>
        <title>Arduino Ethernet Database</title>
    </head>
    
    <style>
body {
  font-family: "Lato", sans-serif;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
  <a href="index.html">Home</a>
  <a href="display.php">Scoreboard</a>
  <a href="logs.php">Logs</a>
  <a href="settings.php">Settings</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">Open Sidebar</button>  
  <h2>Scoreboard</h2>
  <p>Here you can see the scoreboard and the points acquired by the fighters.</p>
</div>

<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
   
</body>


    <body id="main" class="container">
    <div class="col-sm-6">
        <table class="table table-striped">
            <tr>
            <td class="table_titles_player1">Total</td>
            </tr>
            <?php
            include('connection.php');
            $result = mysqli_query($con,'SELECT SUM(score) as total FROM data where player="player1" ORDER BY id DESC');
            // Process every record
            $oddrow = true;
            while($row = mysqli_fetch_array($result))
            {
            if ($oddrow)
            {
            $css_class=' class="table_cells_odd"';
            }
            else
            {
            $css_class=' class="table_cells_even"';
            }
            $oddrow = !$oddrow; 
            echo "<tr>";
            echo "<td '.$css_class.'>" . $row['total'] . "</td>";
            echo "</tr>"; 
            }
            
            // Close the connection
            mysqli_close($con);
            ?>
        </table>
        </div>

        <div class="col-sm-6">
        <table class="table table-striped">
            <tr>
            <td class="table_titles_player2">Total</td>
            </tr>
            <?php
            include('connection.php');
            $result = mysqli_query($con,'SELECT SUM(score) as total FROM data where player="player2" ORDER BY id DESC');
            // Process every record
            $oddrow = true;
            while($row = mysqli_fetch_array($result))
            {
            if ($oddrow)
            {
            $css_class=' class="table_cells_odd"';
            }
            else
            {
            $css_class=' class="table_cells_even"';
            }
            $oddrow = !$oddrow; 
            echo "<tr>";
            echo "<td '.$css_class.'>" . $row['total'] . "</td>";
            echo "</tr>"; 
            }
            
            // Close the connection
            mysqli_close($con);
            ?>
        </table>
        </div>

        
        
    </body>
</html>