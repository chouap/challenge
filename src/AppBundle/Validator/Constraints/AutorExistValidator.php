<?php

namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AutorExistValidator extends ConstraintValidator
{
    private $em;
    
    /**
     * 
     */
    public function __construct(\Doctrine\ORM\EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @param type $value
     * @param Constraint $constraint
     */
    public function validate($value, Constraint $constraint)
    {
        if ('' === trim($value)) {
            return;
        }
        $autor = $this->em->getRepository('AppBundle\Entity\Autor')->find($value);
        if (null === $autor) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
        }
    }

}
