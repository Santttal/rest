<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Group;
use AppBundle\Entity\User;
use AppBundle\models\UserModel;
use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends FOSRestController
{
    /**
     * @Route("/api/lol", name="homepager")
     */

    public function index2Action()
    {
        $user = new UserModel('andrew', '123456', 100);
        $json = $this->container->get('serializer')->serialize($user, 'json');

        $data = $json; // get data, in this case list of users.
        $view = $this->view($data, 200)
            ->setTemplate("MyBundle:Users:getUsers.html.twig")
            ->setTemplateVar('users')
        ;

        return $this->handleView($view);
    }

    /**
     * @Route("/app/example", name="homepage")
     */
    public function userAction()
    {
        $em = $this->getDoctrine()->getManager();

        $us = new User();
        $us->setAge(20);
        $us->setLogin('Santttal');
        $us->setPassword('123456');

        $em->persist($us);
        $em->flush();

        $gr = new Group();
        $gr->setName('Admin');
        $gr->addUser($us);

        $em->persist($gr);
        $em->flush();

        echo $gr->getId().'====';
        $user = new UserModel('andrew', '123456', 100);
        $json = $this->container->get('serializer')->serialize($user, 'json');
//
        return new Response($json, 200, array('application/json'));
    }
}
