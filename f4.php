<?php
echo "hi";

$id=$_POST["iname"];
$amnt=$_POST["amount"];
foreach($amnt as $row)
{
 echo $row;
}

echo "$id";

?>
