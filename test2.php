<html>
<head>
<script>
function showcost() {
	document.getElementById("cost").value = document.getElementById('serviceslist').value;
}
</script>
</head>
<body>
<?php
$services = array(
"0" => array("desc" => "Service 1", "cost" => "$100"),
"1" => array("desc" => "Service 2", "cost" => "$200"),
"2" => array("desc" => "Service 3", "cost" => "$300"),
);
?>
<select id="serviceslist" onchange="showcost()">
<?php
for ($i=0;$i<count($services);$i++) {
	echo "<option value='".$services[$i]['cost']."'>".$services[$i]['desc']."</option>";
}
?>
</select>
<input type="text" id="cost"">
</body>
</html>