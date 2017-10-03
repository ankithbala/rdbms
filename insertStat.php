
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$a = intval($_GET['qty']);

echo "$a";

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



$sql = "UPDATE stat SET qty = ? WHERE item = ?";

$params = array($a, 2);

$stmt = sqlsrv_query( $conn, $sql, $params);

$rows_affected = sqlsrv_rows_affected( $stmt);
if( $rows_affected === false) {
     die( print_r( sqlsrv_errors(), true));
} elseif( $rows_affected == -1) {
      echo "No information available.<br />";
} else {
      echo $rows_affected." rows were updated.<br />";
}


$sql1="SELECT * FROM stat where item=2";
$rs=sqlsrv_query( $conn , $sql1);


while($row = sqlsrv_fetch_array($rs, SQLSRV_FETCH_ASSOC)) {
    echo $row['itemname'];
    echo $row['qty'];
 }


?>
</body>
</html>