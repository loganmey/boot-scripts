<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?><!DOCTYPE html>
<html>
  <head>
    <title>Inventory System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">

  	<div class="row">
  		<div class="col-md-12">

      <?php include('menu.php'); ?>
      <div class="jumbotron">
        <?php include("show-data.php"); ?>
    </div>
      <?php include("show-instance.php"); ?>
    </div>
    </div>


    <!-- Begin Logan Meyer Edit August 16, 2022. -->
    <!-- Edit to include stress testing functionality -->

    <?php
# Stress the system for a maximum of 10 minutes. Kill all stress processes when requested by the user. 
$stressOrKill = $_GET["stress"];
if (strlen($stressOrKill) > 0) {
				if ($stressOrKill == "start") {
								echo("<h2>Generating load</h2>");
								exec("stress --cpu 4 --io 1 --vm 1 --vm-bytes 128M --timeout 600s > /dev/null 2>/dev/null &");
				} elseif ($stressOrKill == "stop") {
								exec("kill -9 (pidof stress)");
								echo("<h2>Killed stress processes</h2>");
				} else {

				}
}
?> <!-- start content --> <div id="content">
                        <center>
                                <img
src="images/AWS_Logo_Web_200px.png">
                                <br/>
                                <br/>
                        <h2>Generate Load</h2>
        <table border="0" width="30%" cellpadding="0" cellspacing="0"
id="content-table">
        <tr>
                <td><form action="index.php"><input type="hidden" name="stress" value="start" /><input
type="submit" value="Start Stress" /></form></td>
                <td><form action="index.php"><input type="hidden" name="stress" value="stop" /><input
type="submit" value="Stop Stress" /></form></td>
        </tr>
        </table> </center> <!-- end content --> </div>

    <!-- End Logan Meyer Edit August 16, 2022. -->    
    
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>

  </body>
</html>
