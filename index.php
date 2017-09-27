

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



$SQL_String = "SELECT 
  MAX(sys.sysDataBases.Name) as DatabaseName,
  Coalesce(max(CONVERT(VARCHAR(28),msdb.dbo.BackUpset.BackUp_Finish_Date,120))
               ,'No backup taken') as LastBackupCompleted,
  Coalesce(max(convert(varchar(50),CEILING(msdb.dbo.BackUpset.BackUp_Size/1000/1000)))
               ,'No backup taken') as MBBackedUp
FROM     
  sys.sysDataBases
  LEFT OUTER JOIN msdb.dbo.BackUpset
    ON msdb.dbo.BackUpset.DataBase_Name = sys.sysDataBases.Name
GROUP BY sys.sysDataBases.Name
ORDER BY 1";

$result = sqlsrv_query( $conn , $SQL_String) or die ( "sqlsrv_query failed"  );

echo '<table align="center">';
echo '<th>Database</th><th>Last Backup Date (120 format)</th><th>Size MB</th>';
$output = '';
while ( $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
        {
  $output .= '<tr>'. 
   '<td>' . $row['DatabaseName'] . '</td>' .
   '<td><center>' . $row['LastBackupCompleted'] . '</center></td>' .
   '<td>' . $row['MBBackedUp']  . '</td>' .
   '</tr>';
 }
echo $output;
echo '</table>';
echo '</br>';
echo '</html>';




$sql1="SELECT * FROM people";
$rs=sqlsrv_query( $conn , $sql1);
while($row = sqlsrv_fetch_array($rs, SQLSRV_FETCH_ASSOC))
{
    
echo "<p>Hello, $row[name]!</p>";

}

/*echo '<html>';

echo '<body>';

echo '<form>';
<script>
name1="hi";
</script>*/
$id2=$_POST["id1"];
$name2=$_POST["name1"];
$sql2 = "INSERT INTO people (id, name) VALUES (?, ?)";
$params = array($id2,$name2);

$stmt = sqlsrv_query( $conn, $sql2, $params);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}


/*echo '</form>';

echo '</body>';
echo '</html>';*/

?>
