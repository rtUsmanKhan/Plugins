<?php
$username = "root";
$password = "123";
$hostname = "192.168.3.81"; 
//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";
//select a database to work with
$selected = mysql_select_db("sugar7",$dbhandle) 
  or die("Could not select examples");
$module = 'cases';
$sql = "SELECT * from $module";
	$result = mysql_query($sql);
        //create an array
        $emparray = array();
        while($row =mysql_fetch_assoc($result))
        {
            $emparray[] = $row;
        }
        echo json_encode($emparray);
        $fp = fopen($module, 'w');
        fwrite($fp, json_encode($emparray));
      fclose($fp);
mysql_close($dbhandle);
// Just to see to staged
// Lets try
echo "Hello";
?>
