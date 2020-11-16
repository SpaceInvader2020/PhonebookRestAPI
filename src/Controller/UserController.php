<?php


namespace App\Controller;


use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @package App\Controller
 */
class UserController extends AbstractController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /**
     * @Route("/users", name="get_all_users", methods={"GET"})
     */
    public function getAllUsers(): JsonResponse
    {
        /**
         * @var User[] $usersCollection
         */
        $usersCollection = $this->userRepository->findAll();
        $data = [];

        foreach ($usersCollection as $user) {
            $data[] = [
                'id' => $user->getId(),
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'email' => $user->getEmail(),
                'phone' => $user->getPhone(),
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @Route("/users/", name="create_user", methods={"POST"})
     */
    public function create(Request $request): JsonResponse
    {


        $firstName = $request->get('firstName');
        $lastName = $request->get('lastName');
        $email = $request->get('email');
        $phone = $request->get('phone');

        if (empty($firstName) || empty($lastName) || empty($email) || empty($phone)) {
            throw new NotFoundHttpException('First name, last name, email and phone are required parameters');
        }

        $this->userRepository->save($firstName, $lastName, $email, $phone);

        return new JsonResponse(['status' => 'User created!'], Response::HTTP_CREATED);
    }

    /**
     * @Route("/users/{id}", name="update_user", methods={"PUT"})
     */
    public function update(User $user, Request $request): JsonResponse
    {

        empty($request->get('firstName')) ? true : $user->setFirstName($request->get('firstName'));
        empty($request->get('lastName')) ? true : $user->setLastName($request->get('lastName'));
        empty($request->get('email')) ? true : $user->setEmail($request->get('email'));
        empty($request->get('phone')) ? true : $user->setPhone($request->get('phone'));

        $updatedUser = $this->userRepository->update($user);

        return new JsonResponse($updatedUser->toArray(), Response::HTTP_OK);
    }
    /**
     * @Route("/users/{id}", name="delete_user", methods={"DELETE"})
     */
    public function delete(User $user): JsonResponse
    {
        $this->userRepository->remove($user);
        return new JsonResponse(['status' => 'User deleted'], Response::HTTP_NO_CONTENT);
    }


    /**
     * @Route("/users/{id}", name="get_user", methods={"GET"})
     */
    public function getSingleUser(User $user): JsonResponse
    {

        $data = [
            'id' => $user->getId(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
            'phone' => $user->getPhone(),
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }
}