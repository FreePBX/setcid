<?php
namespace FreePBX\modules\Setcid;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
	public function runRestore($jobid){
		$configs = $this->getConfigs();
		foreach($configs as $config){
				$this->FreePBX->Setcid->update($config['cid_id'], $config['description'], $config['name'], $config['number'], $config['dest']);
		}
	}

	public function processLegacy($pdo, $data, $tables, $unknownTables){
		$this->restoreLegacyDatabase($pdo);
	}
}
