<?php
namespace FreePBX\modules\__MODULENAME__;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
  public function runRestore($jobid){
    $configs = $this->getConfig();
    foreach($configs as $config){
        $this->FreePBX->Setcid->update($config['cid_id'], $config['description'], $config['name'], $config['number'], $config['dest']);
    }
  }
}