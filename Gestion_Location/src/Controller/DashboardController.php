<?php
// src/Controller/DashboardController.php
namespace App\Controller;

use App\Entity\Locataire;
use App\Repository\LocataireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'dashboard')]
    public function index(LocataireRepository $locataireRepository): Response
    {
        // Récupérer les données nécessaires pour le tableau de bord
        $totalLocataires = $locataireRepository->count([]);

        // Passer les données à la vue Twig
        return $this->render('dashboard/index.html.twig', [
            'totalLocataires' => $totalLocataires,
            // Autres données à passer ici...
        ]);
    }
}
