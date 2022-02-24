<?php
// src/Model/Table/UsersTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CustomersTable extends Table
{
    public function validationDefault(Validator $validator): Validator
    {
        return $validator
            ->notEmpty('email', 'A email is required')
            ->email('email')
            ->notEmpty('password', 'A password is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Please enter a valid role'
            ]);
    }
}
