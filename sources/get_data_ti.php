<?php

$link = mysql_connect('localhost', 'dbuser', '5TNKr847');
if (!$link) { die('Failed to connect'.mysql_error()); }
$db_selected = mysql_select_db('boda', $link);
if (!$db_selected) { die('Failed to select a database'.mysql_error()); }

// Fetch datas
$json = array();
$result = mysql_query("SELECT * FROM drivers");
$row = mysql_fetch_assoc($result);
if (!$row) { die('Failed to fetche datas'); }
for (i=0; $result[i]; i++) {
	$json[i]=array(
		'id'=>$row['id']/*,
		'fname'=>$row['fname'],
		'sname'=>$row['fname'],
		'phone'=>$row['phone'],
		'number'=>$row['number'],
		'area'=>$row['area'],
		'rate'=>$row['rate']
		 */
	);
}
$result->close();
$encode = json_encode($json);
heder("Content-Type: text/json");

/*
// Set the default namespace to utf8
$mysqli->query("SET NAMES 'utf8'");
$json = array();
if($result = $mysqli->query("select * from drivers")) {
	while ($row=$result->fetch_assoc()) {
		$json[]=array(
			'id'=>$row['id'],
			'fname'=>$row['fname'],
			'sname'=>$row['fname'],
			'phone'=>$row['phone'],
			'number'=>$row['number'],
			'area'=>$row['area'],
			'rate'=>$row['rate']
		);
	}
}
$result->close();

header("Content-Type: text/json");
echo json_encode(array( 'drivers' => $json ));
 */


// $mysqli->close();
mysql_close($link);
?>
