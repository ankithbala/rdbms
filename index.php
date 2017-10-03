

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

$sql1="SELECT * FROM people";
$rs=sqlsrv_query( $conn , $sql1);
while($row = sqlsrv_fetch_array($rs, SQLSRV_FETCH_ASSOC))
{
    
echo "<p>Hello, $row[name]!</p>";

}

$id2=$_POST["id1"];
$name2=$_POST["name1"];
$sql2 = "INSERT INTO people (id, name) VALUES (?, ?)";
$params = array($id2,$name2);

$stmt = sqlsrv_query( $conn, $sql2, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
?>
