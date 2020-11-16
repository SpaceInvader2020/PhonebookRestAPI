<?php


namespace App\Repository;


use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class PhonebookRepository
 * @package App\Repository
 */
class UserRepository extends ServiceEntityRepository
{

    /**
     * @var EntityManagerInterface
     */
    private $manager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, User::class);
        $this->manager = $manager;
    }

    /**
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $phone
     */
    public function save($firstName, $lastName, $email, $phone)
    {
        $newUser = new User();

        $newUser
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setEmail($email)
            ->setPhone($phone);

        $this->manager->persist($newUser);
        $this->manager->flush();
    }

    /**
     * @param User $user
     * @return User
     */
    public function update(User $user)
    {
        $this->manager->persist($user);
        $this->manager->flush();

        return $user;
    }

    /**
     * @param User $user
     */
    public function remove(User $user)
    {
        $this->manager->remove($user);
        $this->manager->flush();
    }

}