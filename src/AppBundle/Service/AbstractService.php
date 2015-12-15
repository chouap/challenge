<?php
namespace AppBundle\Service;

abstract class AbstractService
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;
    
    /**
     * @return \Doctrine\ORM\EntityManagerInterface
     */
    public function getEM()
    {
        return $this->em;
    }
    
    /**
     * @param \Doctrine\ORM\EntityManagerInterface $em
     */
    public function setEM(\Doctrine\ORM\EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    
    /**
     * 
     * @param string $className
     * @return type
     */
    public function getRepository($className)
    {
        return $this->getEM()->getRepository($className);
    }
}