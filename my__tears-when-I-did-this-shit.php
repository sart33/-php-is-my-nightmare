<?
$dbh = new PDO('mysql:dbname=bd;host=localhost', 'root', '');
 
$data = simplexml_load_file('issa.xml');
foreach ($data->item as $row) {
	$id = strval($row->id);
	$parentId = intval($row->parentId);
 
	$sth = $dbh->prepare("SELECT * FROM `parentId` WHERE `id` = ?");
	$sth->execute(array($id));
	$parentId = $sth->fetch(PDO::FETCH_ASSOC);
 
	if (!empty($parentId)) {
		$sth = $dbh->prepare("UPDATE `id` WHERE `id` = ?");
		$sth->execute(array($parentId['id']));
	}
}

?>