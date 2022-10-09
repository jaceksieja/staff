<?php

namespace App\Infrastructure\Controller;

use App\Application\Action\RegisterUser;
use App\Application\Exception\ValidationException;
use App\Application\Model\RegisterUserDTO;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController
{
    public function __construct(
        private readonly RegisterUser $registerUser,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    #[Route('/sign-up', name: 'sign_up', methods: ['POST'])]
    public function __invoke(RegisterUserDTO $registerDTO): Response
    {
        try {
            $userId = ($this->registerUser)($registerDTO);
            $this->entityManager->flush();

            return new JsonResponse(['id' => $userId], Response::HTTP_CREATED);
        } catch (ValidationException $exception) {
            return new JsonResponse($exception->getDetails(), Response::HTTP_BAD_REQUEST);
        } catch (\Throwable) {
            return new JsonResponse([], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
