<?php

namespace Levi9\BatteriesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Levi9\BatteriesBundle\Form\BatteriesType;

// todo: find better name for controller
class DefaultController extends Controller
{
    /**
     * Batteries statistic action.
     *
     * @Route("/", name="batteries_statistic")
     * @Method({"GET"})
     * @Template
     *
     * @return array
     */
    public function indexAction()
    {
        // todo: use getManager instead
        $batteries = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('Levi9BatteriesBundle:Batteries')
            ->getStatistics();

        return array('batteries' => $batteries);
    }

    /**
     * Add new battery action.
     *
     * @Route("/add", name="batteries_add")
     * @Method({"GET", "POST"})
     * @Template
     *
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(new BatteriesType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            // todo: use getManager instead
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($form->getData());
            $em->flush();

            return $this->redirectToRoute('batteries_statistic');
        }
        return ['form' => $form->createView()];
    }
}
