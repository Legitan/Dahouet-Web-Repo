<?php
// src/Dahouet/MainBundle/Controller/regate_by_numregController.php
namespace Dahouet\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dahouet\MainBundle\Modele\DAO\RegateDAO;

class regate_by_numregController extends Controller
{
	public function listRegateAction()
	{
		$reg = RegateDAO::getListRegate();

		$view = 'DahouetMainBundle:Main:regate_by_numreg.html.twig';
		return $this->render($view,array('regates'=>$reg));
	}


}
