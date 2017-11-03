
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
session_start();

$z=$_SESSION['ha'];
echo $z;


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

/* update code*/

$sql = "UPDATE stat SET qty = ? WHERE item = ?";

$params = array($a, $z);

$stmt = sqlsrv_query( $conn, $sql, $params);

$rows_affected = sqlsrv_rows_affected( $stmt);
if( $rows_affected === false) {
     die( print_r( sqlsrv_errors(), true));
} elseif( $rows_affected == -1) {
      echo "No information available.<br />";
} else {
      echo $rows_affected." rows were updated.<br />";
}


/***
* update end
***/




/***
*select price and total 
***/

$sql2="SELECT value,qty FROM stat where item=$z";
$rs=sqlsrv_query( $conn , $sql2);


while($row = sqlsrv_fetch_array($rs, SQLSRV_FETCH_ASSOC)) {
     $val=$row['value'];
     $qua=$row['qty'];
   
 }


/***
*calculate price
***/
$newprice=$val*$qua;



/***
*update code for new price
***/
$sql3 = "UPDATE stat SET price = ? WHERE item = ?";

$params = array($newprice, $z);

$stmt = sqlsrv_query( $conn, $sql3, $params);

$rows_affected = sqlsrv_rows_affected( $stmt);
if( $rows_affected === false) {
     die( print_r( sqlsrv_errors(), true));
} elseif( $rows_affected == -1) {
      echo "No information available.<br />";
} else {
      echo $rows_affected." rows were updated.<br />";
}


/***
* update end
***/




/***
*calculate total
***/
if($z==1)
{
   $newtotal=$newprice;
}
else
 {
   $sql4="SELECT total FROM stat where item=$z-1";
   $rs=sqlsrv_query( $conn , $sql4);
   while($row = sqlsrv_fetch_array($rs, SQLSRV_FETCH_ASSOC)) {
          $oldtotal=$row['total'];
     
 }

  $newtotal=$oldtotal+$newprice;
 }








/* update code*/

$sql5 = "UPDATE stat SET total = ? WHERE item = ?";

$params = array($newtotal, $z);

$stmt = sqlsrv_query( $conn, $sql5, $params);

$rows_affected = sqlsrv_rows_affected( $stmt);
if( $rows_affected === false) {
     die( print_r( sqlsrv_errors(), true));
} elseif( $rows_affected == -1) {
      echo "No information available.<br />";
} else {
      echo $rows_affected." rows were updated.<br />";
}


/***
* update end
***/


/***
*display all
***/

$sql1="SELECT * FROM stat where item=$z";
$rs=sqlsrv_query( $conn , $sql1);


while($row = sqlsrv_fetch_array($rs, SQLSRV_FETCH_ASSOC)) {
echo $row['itemname'];
echo $row['qty'];

    
    
    echo ".<br />";
    echo $row['value'];
echo ".<br />";
    echo $row['price'];
echo ".<br />";
    echo $row['total'];
echo ".<br />";
 }




?>
</body>
</html>