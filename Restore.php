<?php
namespace FreePBX\modules\Setcid;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
	public function runRestore(){
		$configs = $this->getConfigs();
		foreach($configs as $config){
				$this->FreePBX->Setcid->update($config['cid_id'], $config['description'], $config['cid_name'], $config['cid_num'], $config['dest']);
		}
	}

	public function processLegacy($pdo, $data, $tables, $unknownTables){
		$this->restoreLegacyDatabase($pdo);
	}
}
