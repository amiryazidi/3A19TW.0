<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\ClassroomRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClassroomController extends AbstractController
{
    #[Route('/classroom', name: 'app_classroom')]
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }

       #[Route('/classroomList', name: 'classroomList')]
    public function ListUser(ClassroomRepository $r ): Response //1- injection de dépendance
    {
        $result = $r->findAll();  // 2- appel de la méthode findAll() recuperation de tous les utilisateurs
         //3- transmission des données à la vue
        return $this->render('classroom/classroom.html.twig', [
            'result' => $result,
        ]);
    }

     #[Route('/removeClassroom/{id}', name: 'rc')]
    public function removeUser(ManagerRegistry $mr, $id, ClassroomRepository $repo): Response 
    {
       $classroom = $repo->find($id);
        $em=$mr->getManager(); 
        $em->remove($classroom);
        $em->flush();
        return $this->redirectToRoute('classroomList');
    }

    #[Route('/addStudentToClassroom/{id}', name: 'addStudentToClassroom')]
public function addStudentToClassroom(ManagerRegistry $mr, Request $req, int $id, ClassroomRepository $repo): Response
{
    // Récupérer la classe par son ID
    $classroom = $repo->find($id);
    // Créer un nouvel étudiant et l'associer à la classe
    $student = new User();
    $student->setClassroom($classroom); // On assigne directement la classe
    // Créer le formulaire pour l'étudiant
    $form = $this->createForm(UserType::class, $student);
    // Traiter la requête
    $form->handleRequest($req);
    // Si le formulaire est soumis et valide, enregistrer l'étudiant
    if ($form->isSubmitted() && $form->isValid()) {
        $em = $mr->getManager();
        $em->persist($student);
        $em->flush();
        $this->addFlash('success', "Étudiant ajouté à la classe {$classroom->getName()} !");
        return $this->redirectToRoute('classroomList');
    }
    return $this->render('user/add.html.twig', [
        'formUser' => $form->createView(),
        'classroom' => $classroom
    ]);
}
}