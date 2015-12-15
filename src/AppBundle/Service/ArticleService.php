<?php
namespace AppBundle\Service;

class ArticleService extends AbstractService
{
    /**
     *
     * @var AutorService
     */
    private $autorService;
    
    /**
     *
     * @var \Symfony\Component\Validator\ValidatorInterface
     */
    private $validator;
    
    /**
     * @param type $id
     * @return \AppBundle\Entity\Article
     * @throws \AppBundle\Exception\FunctionalException
     */
    public function getArticle($id)
    {
        $article = $this->getRepository('AppBundle\Entity\Article')->find($id);
        if (null === $article) {
            throw new \AppBundle\Exception\FunctionalException('Article not found');
        }
        
        return $article;
    }
    
    /**
     * @param string $title
     * @param string $content
     * @param string $publicationDate
     * @param integer $autorId
     */
    public function save($title, $content, $publicationDate, $autorId)
    {
        $article = new \AppBundle\Entity\Article();
        
        $article->setTitle($title);
        $article->setContent($content);
        
        $article->setAutorId($autorId);
        $article->setPublicationDate(new \DateTime($publicationDate));
        
        $validator = $this->getValidator();
        $errors = $validator->validate($article);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            throw new \AppBundle\Exception\FunctionalException($errorsString);
        }
        $autor = $this->getAutorService()->getAutor($autorId);
        $article->setAutor($autor);
        
        $this->getEM()->persist($article);
        $this->getEM()->flush();
    }
    
    /**
     * @return AutorService
     */
    function getAutorService()
    {
        return $this->autorService;
    }

    /**
     * @param AutorService $autorService
     */
    function setAutorService(AutorService $autorService)
    {
        $this->autorService = $autorService;
    }

    /**
     * @return \Symfony\Component\Validator\ValidatorInterface
     */
    function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param \Symfony\Component\Validator\ValidatorInterface $validator
     */
    function setValidator(\Symfony\Component\Validator\ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

}

