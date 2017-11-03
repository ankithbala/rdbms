
<!DOCTYPE html>
<html>
<body>

<?php



$Instance = ".\SQLEXPRESS";

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


header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);
/*echo $obj;
$conn = new mysqli("myServer", "myUser", "myPassword", "Northwind");
$result = $conn->query("SELECT name FROM ".$obj->table." LIMIT ".$obj->limit);

$outp = array();

$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);
*/


?>
</body>
</html>
