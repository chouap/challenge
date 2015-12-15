<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AutorController extends Controller
{
    /**
     * @param integer $id
     * @return Response
     */
    public function getAction($id)
    {
        $result = ['data' => null, 'message' => 'success'];
        try {
            $autor = $this->get('service_autor')->getAutor($id);
            $result['data'] = $autor;
        } catch (\AppBundle\Exception\FunctionalException $e) {
            
            $result['message'] = $e->getMessage();
        } catch (\Exception $e) {
            $result['message'] = 'Technical error';
            $this->get('logger')->error($e->getMessage());
            $this->get('logger')->error($e->getTraceAsString());
        }
        return new Response(
            json_encode($result),
            200,
            array('Content-Type' => 'application/json')
        );
    }
}
