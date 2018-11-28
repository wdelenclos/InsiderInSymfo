<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App|Controller
 * @Route(name="app_default_")
 */

class DefaultController extends AbstractController{
	/**
	 * @Route(name="index", path="/", methods={"GET"})
	 * @return Response
	 */
	public function index(){
		return $this->render(
			"index.html.twig",
			["name" => "Index"]
		);
	}
}