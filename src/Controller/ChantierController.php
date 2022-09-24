<?php

namespace App\Controller;

use App\Service\ChantierService;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChantierController extends AbstractController
{

    #[Route('/api/chantier', name: 'app_chantier_get', methods: ['GET'])]
    public function getRandomChantier(SerializerInterface $serializer, ChantierService $chantierService): Response
    {
        return new Response($serializer->serialize($chantierService->getRandomChantier(), 'json'));
    }

    #[Route('/api/chantier', name: 'app_chantier_post', methods: ['POST'])]
    public function saveRandomChantier(SerializerInterface $serializer, ChantierService $chantierService): Response
    {
        $numero = $chantierService->updateRandomChantier();
        return new Response($serializer->serialize(['numero' => $numero], 'json'));
    }
}
