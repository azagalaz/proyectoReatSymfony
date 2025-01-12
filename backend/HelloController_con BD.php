<?php
namespace App\Controller;

use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HelloController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/api/hello', name: 'api_hello')]
    public function index(): JsonResponse
    {
        $repository = $this->entityManager->getRepository(Message::class);
        $message = $repository->find(1); // Obtiene el mensaje con ID 1

        if (!$message) {
            return new JsonResponse(['error' => 'Message not found'], 404);
        }

        return new JsonResponse(['message' => $message->getMessage()]);
    }
}
