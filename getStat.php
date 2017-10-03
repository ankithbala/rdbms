<!DOCTYPE html>
<html>
<body>

<?php
$q = intval($_GET['i']);




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


$sql1="SELECT * FROM stat where item=$q";
$rs=sqlsrv_query( $conn , $sql1);

while($row = sqlsrv_fetch_array($rs, SQLSRV_FETCH_ASSOC)) {
    echo $row['itemname'];
    echo $row['qty'];
        
}

?>
</body>
</html>