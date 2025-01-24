<?php
namespace App\Controller;
use App\Repository\AppartementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/acceuil', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }
    #[Route('/home', name: 'APPhome')]
    public function home(): Response
    {
        return $this->render('home/home.html.twig');
    }
    #[Route('/login', name: 'LoginPhome')]
    public function login(): Response
    {
        return $this->render('home/login.html.twig');
    }

    #[Route('/appartement', name: 'appartementtHome')]
    public function appartement(): Response
    {
        return $this->render('home/appartement.html.twig');
    }

    #[Route('/appartement', name: 'app_appartement_show', methods: ['GET'])]
    public function show(int $id, appartementRepository $appartementRepository): Response
    {   
        $appartement = $appartementRepository->find($id);

        if (!$appartement) {
            throw $this->createNotFoundException('appartement not found');
        }

        return $this->render('appartement/show.html.twig', [
            'appartements' => $appartement,
        ]);
    }
    
}
