<?php 
namespace App\Model\Table;

use Cake\ORM\Table;

class MembersTable extends Table 
{
    public function initialize(array $config): void
    {
        $this->setTable("tbl_students");
    }
}
?>