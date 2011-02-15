<?php

global $db;

$autoincrement = (($amp_conf["AMPDBENGINE"] == "sqlite") || ($amp_conf["AMPDBENGINE"] == "sqlite3")) ? "AUTOINCREMENT":"AUTO_INCREMENT";
$sql = "CREATE TABLE IF NOT EXISTS setcid (
	cid_id INTEGER NOT NULL PRIMARY KEY $autoincrement,
	cid_name VARCHAR( 255 ) ,
	cid_num VARCHAR( 255 ) ,
	description VARCHAR( 50 ) ,
	dest VARCHAR( 255 )
)";

$check = $db->query($sql);
if(DB::IsError($check)) {
	die_freepbx("Can not create setcid table\n");
}

//migrate name/num to larger size
out(_('Migrating Name/Num filed size'));
$table = $db->getAssoc('DESCRIBE `setcid`', true, array(), DB_FETCHMODE_ASSOC);
$name = str_replace(array('(', ')'), ' ', $table['cid_name']['Type']);
$name = explode(' ', $name);
if ($name[1] == '50') {
	$q = $db->query('ALTER TABLE `setcid` CHANGE cid_name cid_name VARCHAR( 255 )');
	if($db->IsError($q)) {
		die_freepbx("Can not migrate setcid\n");
	}
}

$num = str_replace(array('(', ')'), ' ', $table['cid_num']['Type']);
$num = explode(' ', $num);
if ($num[1] == '50') {
	$q = $db->query('ALTER TABLE `setcid` CHANGE cid_num cid_num VARCHAR( 255 )');
	if($db->IsError($q)) {
		die_freepbx("Can not migrate setcid\n");
	}
}
?>
