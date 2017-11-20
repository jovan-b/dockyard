<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
	
	/**
	 * @Route("/api/boats/", name="all_boat")
	 */
	public function getBoats(){
		$boatRepository = $this->getDoctrine()->getRepository('AppBundle:boat');
		$boats = NULL;
		try{
			$boats = $boatRepository->findAll();
		} catch (\Exception $exception){
			$boats = NULL;
		}
		
		if(!$boat) {
			throw new NotFoundHttpException(sprintf('The boat \'%s\' was not found.', $id));
		}
		return $boats;
	}
	
	/**
	 * @Route("/api/boats/{id}", name="boat")
	 */
	public function getBoat($id){
		$boatRepository = $this->getDoctrine()->getRepository('AppBundle:boat');
		$boat = NULL;
		try{
			$boat = $boatRepository->find($id);
		} catch (\Exception $exception){
			$boat = NULL;
		}
		
		if(!$boat) {
			throw new NotFoundHttpException(sprintf('The boat \'%s\' was not found.', $id));
		}

        return new Response(json_encode($boat));
	}
}