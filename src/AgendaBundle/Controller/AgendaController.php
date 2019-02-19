<?php

namespace AgendaBundle\Controller;

use AgendaBundle\Entity\Agenda;
use AgendaBundle\Form\AgendaType;
use Doctrine\DBAL\Types\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;




class AgendaController extends Controller
{
    public function readAction()
    {
        //fetch the database
        $agendas=$this->getDoctrine()->getRepository(Agenda::class)->findAll();
        return $this->render('@Agenda\Agenda\AgendaList.html.twig', array(
            'agendas'=>$agendas
        ));
    }

    public function createAction(Request $request)
    {
        //1ere etape
        $Agenda= new Agenda();
        //Preparation formulaire
        $form =$this->createForm(AgendaType::class,$Agenda);
        //2eme etape
        $form =$form->handleRequest($request);
        //test if our form is valid
        if ($form->isValid() && $form->isSubmitted())
        {
            /*$Nom= $form['Nom']->getData();
            $Date_debut= $form['Date_debut']->getData();
            $Date_fin= $form['Date_fin']->getData();
            $Type= $form['Type']->getData();
            $Projet=$form['Projet']->getData();

            $form->setNom($Nom);
            $form->setDatedebut($Nom);
            $form->setDatefin($Nom);
            $form->setType($Type);
            $form->setIdprojet($Projet);*/
            $em=$this->getDoctrine()->getManager();
            //persister l objet dans l'ORM
            $em->persist($Agenda);
            //Sauvgarder les données dans la db
            $em->flush();
            //$this->addFlash('message','Post Saved Successfully!');
            return $this->redirectToRoute('agenda_read');

        }
        return $this->render('@Agenda\Agenda\create.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function updateAction(Request $request,$id)
    {
        //1ere étape

        $em= $this->getDoctrine()->getManager(); //1)appel manager pour modification
        $agenda=$em->getRepository(Agenda::class)->find($id); //2)Recuperation des données(objet avec id en parametres)
        //2eme etape
        //Preparation formulaire
        $form =$this->createForm(AgendaType::class,$agenda);
        //4eme etape recuperation formulaire
        $form =$form->handleRequest($request);
        if($form->isValid())
        {
            //enregistrement base de données
            //Sauvgarder les données dans la db
            $em->flush();
            //retour au read a l affichage
            return $this->redirectToRoute('agenda_read');
        }
        //envoie formulaire
        return $this->render('@Agenda\Agenda\updateAgenda.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $agenda= $em->getRepository(Agenda::class)->find($id);
        $em->remove($agenda);
        $em->flush();
        return $this->redirectToRoute('agenda_read');
    }
    /*public function rechercheAction(Request $request)
    {
        $pays=$request->get('pays');

        if (isset ($pays))
        {
            $modeles=$this->getDoctrine()
                ->getRepository(Modele::class)
                ->findByPaysDql($pays);
            return $this->render('@EspritParc\Modele\read.html.twig', array(
                'modeles'=>$modeles
            ));
        }
        return $this->render('@EspritParc\Modele\recherche.html.twig', array(

        ));

    }*/


}
