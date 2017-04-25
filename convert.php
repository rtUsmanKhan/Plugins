<?php
$username = "root";
$password = "123";
$hostname = "My Local Host"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
 or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

//select a database to work with
$selected = mysql_select_db("rtpentaho-sugar",$dbhandle) 

  or die("Could not select examplesss");

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

/*
select *
from  accounts
where date_modified >= DATE_SUB(NOW(),INTERVAL 8 HOUR)


UPDATE tableName SET columnName = FLOOR( 1 + RAND( ) *3 );
*/
// Just to see to staged
// Lets try again with diffmerge tool
echo "Hello";
?>
