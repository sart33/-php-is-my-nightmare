<?php
$xml_file = "import.xml";
$conn_error ='Could not connect';
$mysqli_host = 'localhost';
$mysqli_user = 'root';
$mysqli_pass = '';
$mysql_bd='bd';
$link = mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass);
if (!@mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass)||!@mysqli_select_db($link, $mysql_bd)) {
	die($conn_error);
} 
if (file_exists($xml_file)) {
  $xml = simplexml_load_file($xml_file);
  $i=0;
  foreach ($xml->xpath("//index") as $segment) {
    $row = $segment->currency->attributes();
    $sql = "insert into index (id) value('".$row["id"].");";
    echo $sql."\n";
  }

} else {
  exit('Не удалось открыть файл '.$xml_file);
}

?>