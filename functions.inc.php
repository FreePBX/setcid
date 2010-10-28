<?php


function setcid_get_config($engine) {
	global $ext;
	switch ($engine) {
		case 'asterisk':
			$ext->addInclude('from-internal-additional', 'app-setcid');
			foreach (setcid_list() as $row) {
					$ext->add('app-setcid',$row['cid_id'], '', new ext_noop('('.$row['description'].') Changing cid to '.$row['cid_name'].' <'. $row['cid_num'].'>'));
					$ext->add('app-setcid',$row['cid_id'], '', new ext_set('CALLERID(name)', $row['cid_name']));
					$ext->add('app-setcid',$row['cid_id'], '', new ext_set('CALLERID(num)', $row['cid_num']));
          $ext->add('app-setcid',$row['cid_id'], '', new ext_goto($row['dest']));
			}
		break;
	}
}

/**  Get a list of all cid
 */
function setcid_list() {
	global $db;
	$sql = "SELECT cid_id, description, cid_name, cid_num, dest FROM setcid ORDER BY description ";
	$results = $db->getAll($sql, DB_FETCHMODE_ASSOC);
	if(DB::IsError($results)) {
		die_freepbx($results->getMessage()."<br><br>Error selecting from setcid");	
	}
	return $results;
}

function setcid_destinations() {
	global $module_page;
	$extens = array();

	// it makes no sense to point at another callerid (and it can be an infinite loop)
	if ($module_page == 'setcid') {
		return false;
	}

	// return an associative array with destination and description
	foreach (setcid_list() as $row) {
		$extens[] = array('destination' => 'app-setcid,' . $row['cid_id'] . ',1', 'description' => $row['description']);
	}
	return $extens;
}

function setcid_get($cid_id) {
	global $db;
	$sql = "SELECT cid_id, description, cid_name, cid_num, dest FROM setcid WHERE cid_id = ".$db->escapeSimple($cid_id);
	$row = $db->getRow($sql, DB_FETCHMODE_ASSOC);
	if(DB::IsError($row)) {
		die_freepbx($row->getMessage()."<br><br>Error selecting row from setcid");	
	}
	
	return $row;
}

function setcid_add($description, $cid_name, $cid_num, $dest) {
	global $db;
	$sql = "INSERT INTO setcid (description, cid_name, cid_num, dest) VALUES (".
		"'".$db->escapeSimple($description)."', ".
		"'".$db->escapeSimple($cid_name)."', ".
		"'".$db->escapeSimple($cid_num)."', ".
		"'".$db->escapeSimple($dest)."')";
	$result = $db->query($sql);
	if(DB::IsError($result)) {
		die_freepbx($result->getMessage().$sql);
	}
}

function setcid_delete($cid_id) {
	global $db;
	$sql = "DELETE FROM setcid WHERE cid_id = ".$db->escapeSimple($cid_id);
	$result = $db->query($sql);
	if(DB::IsError($result)) {
		die_freepbx($result->getMessage().$sql);
	}
}

function setcid_edit($cid_id, $description, $cid_name, $cid_num, $dest) { 
	global $db;
	$sql = "UPDATE setcid SET ".
		"description = '".$db->escapeSimple($description)."', ".
		"cid_name = '".$db->escapeSimple($cid_name)."', ".
		"cid_num = '".$db->escapeSimple($cid_num)."', ".
		"dest = '".$db->escapeSimple($dest)."' ".
		"WHERE cid_id = ".$db->escapeSimple($cid_id);
	$result = $db->query($sql);
	if(DB::IsError($result)) {
		die_freepbx($result->getMessage().$sql);
	}
}



//----------------------------------------------------------------------------
// Dynamic Destination Registry and Recordings Registry Functions

function setcid_check_destinations($dest=true) {
	global $active_modules;

	$destlist = array();
	if (is_array($dest) && empty($dest)) {
		return $destlist;
	}
	$sql = "SELECT cid_id, description, dest FROM setcid ";
	if ($dest !== true) {
		$sql .= "WHERE cid_id in ('".implode("','",$dest)."')";
	}
	$results = sql($sql,"getAll",DB_FETCHMODE_ASSOC);

	$type = isset($active_modules['setcid']['type'])?$active_modules['setcid']['type']:'setup';

	foreach ($results as $result) {
		$thisdest = $result['dest'];
		$thisid   = $result['cid_id'];
		$destlist[] = array(
			'dest' => $thisdest,
			'description' => 'Set CallerID: '.$result['description'],
			'edit_url' => 'config.php?display=setcid&type=tool&id='.urlencode($thisid),
		);
	}
	return $destlist;
}

function setcid_getdest($id) {
	return array("app-setcid,$id,1");
}

function setcid_getdestinfo($dest) {
	if (substr(trim($dest),0,11) == 'app-setcid,') {
		$grp = explode(',',$dest);
		$id = $grp[1];
		$thiscid = setcid_get($id);
		if (empty($thiscid)) {
			return array();
		} else {
			return array('description' => sprintf(_("Set CallerID %s: "),$thiscid['description']),
			             'edit_url' => 'config.php?display=setcid&id='.urlencode($id),
								  );
		}
	} else {
		return false;
	}
}

?>
