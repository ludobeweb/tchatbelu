<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Tchat;

class DefaultController extends Controller
{
   /** ///////////////   Affichage Header Page 
     * @Route("/", name="home")
     * @Template("default/index.html.twig")
     * @param Request $request
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $message = $em->getRepository("AppBundle:Tchat")->findAll();
        $message2 = new Tchat();
        $dataform= $this->getPost();
        $message2->setAuthor($dataform['author']);
        $message2->setMessage($dataform['message']);
        $em->persist($message2);

return array('sectionTchat' => $message);
        // replace this example code with whatever you need
        
    }
}
