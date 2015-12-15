<?php
namespace AppBundle\Service;

class AutorService extends AbstractService
{
    /**
     * @param type $id
     * @return \AppBundle\Entity\Autor
     * @throws \AppBundle\Exception\FunctionalException
     */
    public function getAutor($id)
    {
        $autor = $this->getRepository('AppBundle\Entity\Autor')->find($id);
        if (null === $autor) {
            throw new \AppBundle\Exception\FunctionalException('Autor not found');
        }
        return $autor;
    }
}
