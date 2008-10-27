<?php

global $db;

$autoincrement = (($amp_conf["AMPDBENGINE"] == "sqlite") || ($amp_conf["AMPDBENGINE"] == "sqlite3")) ? "AUTOINCREMENT":"AUTO_INCREMENT";
$sql = "CREATE TABLE IF NOT EXISTS setcid (
	cid_id INTEGER NOT NULL PRIMARY KEY $autoincrement,
	cid_name VARCHAR( 50 ) ,
	cid_num VARCHAR( 50 ) ,
	description VARCHAR( 50 ) ,
	dest VARCHAR( 255 )
)";

$check = $db->query($sql);
if(DB::IsError($check)) {
	die_freepbx("Can not create languages table\n");
}

?>
