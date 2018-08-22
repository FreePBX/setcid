<?php
namespace FreePBX\modules\Setcid;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
  public function runRestore($jobid){
    $configs = $this->getConfig();
    foreach($configs as $config){
        $this->FreePBX->Setcid->update($config['cid_id'], $config['description'], $config['name'], $config['number'], $config['dest']);
    }
  }
  
  public function processLegacy($pdo, $data, $tables, $unknownTables, $tmpfiledir){
    $tables = array_flip($tables+$unknownTables);
    if(!isset($tables['setcid'])){
      return $this;
    }
    $bmo = $this->FreePBX->Setcid;
    $bmo->setDatabase($pdo);
    $configs = $bmo->listAll();
    $bmo->resetDatabase();
    foreach ($configs as $config) {
      $bmo->update($config['cid_id'], $config['description'], $config['name'], $config['number'], $config['dest']);
    }
    return $this;
  }
}
