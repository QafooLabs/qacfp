<?php

namespace Qafoo\CfpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Qafoo\CfpBundle\Entity\Cfp;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('QafooCfpBundle:Default:index.html.twig');
    }

    public function newAction(Request $request)
    {
        $cfp = new Cfp();

        $cfp->setStart( new \DateTime() );
        $cfp->setEnd( new \DateTime( 'now + 3 days' ) );
        $cfp->setUrl( 'http://' );

        $form = $this->createFormBuilder($cfp)
            ->add(
                'start',
                'date',
                array('widget' => 'single_text')
            )->add(
                'end',
                'date',
                array('widget' => 'single_text')
            )->add('url', 'url', array('label' => 'URL'))
            ->add('conferenceName', 'text', array('label' => 'Conference Name'))
            ->add('conferenceUrl', 'url', array('label' => 'Conference URL'))
            ->add(
                'conferenceDate',
                'date',
                array(
                    'widget' => 'single_text',
                    'label' => 'Conference Date'
                )
            )->getForm();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($cfp);
                $entityManager->flush();

                return $this->redirect(
                    $this->generateUrl(
                        'qafoo_cfp_new_success',
                        array(
                            'cfpId' => $cfp->getId(),
                        )
                    )
                );
            }
        }

        return $this->render(
            'QafooCfpBundle:Default:new.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    public function successAction($cfpId)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $cfp = $entityManager->getRepository('QafooCfpBundle:Cfp')->find($cfpId);

        return $this->render(
            'QafooCfpBundle:Default:success.html.twig',
            array('cfp' => $cfp)
        );
    }
}
