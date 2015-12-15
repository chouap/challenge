<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{

    /**
     * @param integer $id
     * @return Response
     */
    public function getAction($id)
    {
        $result = ['data' => null, 'message' => 'success'];
        $code = 200;
        
        try {
            $article = $this->get('service_article')->getArticle($id);
            $result['data'] = $article;
        } catch (\AppBundle\Exception\FunctionalException $e) {
            $code = 400;
            $result['message'] = $e->getMessage();
        } catch (\Exception $e) {
            $code = 500;
            $result['message'] = 'Technical error';
            $this->get('logger')->error($e->getMessage());
            $this->get('logger')->error($e->getTraceAsString());
        }
        return new Response(
                json_encode($result), $code, array('Content-Type' => 'application/json')
        );
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return Response
     */
    public function addAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $result = ['message' => 'success'];
        $code = 200;
        
        try {
            $serviceArticle = $this->get('service_article');
            $serviceArticle->save(
                $request->get('title'), 
                $request->get('content'), 
                $request->get('publicationDate'), 
                $request->get('autorId')
            );
        } catch (\AppBundle\Exception\FunctionalException $e) {
            $code = 400;
            $result['message'] = $e->getMessage();
        } catch (\Exception $e) {
            $code = 500;
            $result['message'] = 'Technical error';
            echo $e->getMessage(); exit;
            $this->get('logger')->error($e->getMessage());
            $this->get('logger')->error($e->getTraceAsString());
        }
        return new Response(
                json_encode($result), $code, array('Content-Type' => 'application/json')
        );



        return new Response('The author is valid! Yes!');
    }

}
