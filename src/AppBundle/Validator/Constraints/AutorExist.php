<?php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class AutorExist extends Constraint
{
    public $message = 'ID %string% does not exist';

    public function validatedBy()
    {
        return 'validator.autor_exist';
    }
}
