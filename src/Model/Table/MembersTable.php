<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MembersTable extends Table
{
    public function initialize(array $config): void
    {

    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator->requirePresence('name')
            ->notEmptyString('name', 'nama tidak boleh kosong')
            ->requirePresence('role')
            ->notEmptyString('role', 'jabatan tidak boleh kosong')
            ->requirePresence('position')
            ->notEmptyString('position', 'posisi tidak boleh kosong');
        
        return  $validator;
    }
}
?>
