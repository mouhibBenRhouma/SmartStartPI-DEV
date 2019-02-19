<?php

namespace AgendaBundle\Controller;

use AgendaBundle\Entity\Taches;
use AgendaBundle\Form\TachesType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TachesController extends Controller
{
    public function readAction()
    {
        //fetch the database
        $taches=$this->getDoctrine()->getRepository(Taches::class)->findAll();
        return $this->render('@Agenda\Taches\TachesList.html.twig', array(
            'taches'=>$taches
        ));
    }

    public function createAction(Request $request)
    {
        //1ere etape
        $tache= new Taches();
        //Preparation formulaire
        $form =$this->createForm(TachesType::class,$tache);
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
            $em->persist($tache);
            //Sauvgarder les données dans la db
            $em->flush();
            //$this->addFlash('message','Post Saved Successfully!');
            return $this->redirectToRoute('taches_read');

        }
        return $this->render('@Agenda\Taches\create.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function updateAction(Request $request,$id)
    {
        //1ere étape

        $em= $this->getDoctrine()->getManager(); //1)appel manager pour modification
        $tache=$em->getRepository(TachesType::class)->find($id); //2)Recuperation des données(objet avec id en parametres)
        //2eme etape
        //Preparation formulaire
        $form =$this->createForm(TachesType::class,$tache);
        //4eme etape recuperation formulaire
        $form =$form->handleRequest($request);
        if($form->isValid())
        {
            //enregistrement base de données
            //Sauvgarder les données dans la db
            $em->flush();
            //retour au read a l affichage
            return $this->redirectToRoute('taches_read');
        }
        //envoie formulaire
        return $this->render('@Agenda\Taches\updateTaches.html.twig', array(
            'form'=>$form->createView()
        ));
    }

    public function deleteAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $tache= $em->getRepository(Taches::class)->find($id);
        $em->remove($tache);
        $em->flush();
        return $this->redirectToRoute('taches_read');
    }
}
