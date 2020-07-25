<?
function start($parser, $name, $attrs) {
 
 echo "<b>$name</b><br>"; 
 
 foreach ($attrs as $attr => $value) {
 echo $attr.' = '.$value.'<br>';
 }
}

function endElement($parser, $name) {
}
$file = "price KARREE.xml";
$xml_parser = xml_parser_create();
xml_set_element_handler($xml_parser, "start", "endElement");
if (!($fp = fopen($file, "r"))) {
 die();
}
while ($data = fgets($fp)) {
 if (!xml_parse($xml_parser, $data, feof($fp))) {
 echo "<br>Error: ";
 echo xml_error_string(xml_get_error_code($xml_parser));
 echo " at line ".xml_get_current_line_number($xml_parser);
 break;
 }
}

?>
