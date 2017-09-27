
<html>
<form action="index.php" method="post">
ID: <input type="number" name="id1"></input>
Name: <input type="text" name="name1"></input>
<input type="submit" name="submit" value="Submit"></input>

</form>
<form name="f2" action="select.php" method="post">
<input type="submit" name="submit" value="Log data"></input>
<?php


$Instance = ".\SQLEXPRESS";

/*$userName = "sa";

$userPassword = "";

$dbName = "mydatabase";

$ConnectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true);*/


echo '<html>';
$ConnectionInfo = array( "Database"=>"hidb", "UID"=>"sa", "PWD"=>"rdbms12345");






$conn = sqlsrv_connect( $Instance, $ConnectionInfo);
if( $conn ) {
        echo "Connection established to $Instance.";
}else{
 echo "Connection could not be established.";
 print_r($ConnectionInfo);
     die( print_r( sqlsrv_errors(), true));
}








$sql1="SELECT * FROM people";
$rs=sqlsrv_query( $conn , $sql1);
while($row = sqlsrv_fetch_array($rs, SQLSRV_FETCH_ASSOC))
{
    
echo "<p>Hello, $row[name]!</p>";

}



?>




</html>

