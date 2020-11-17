<?php


namespace App\Repository;


use App\Entity\Phonebook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class UserRepository
 * @package App\Repository
 */
class PhonebookRepository extends ServiceEntityRepository
{

    /**
     * @var EntityManagerInterface
     */
    private $manager;

    public function __construct(ManagerRegistry $registry, EntityManagerInterface $manager)
    {
        parent::__construct($registry, Phonebook::class);
        $this->manager = $manager;
    }

    /**
     * @param $user Phonebook
     */
    public function save(Phonebook $user): Phonebook
    {
        $this->manager->persist($user);
        $this->manager->flush();
        return $user;
    }

    /**
     * @param Phonebook $user
     */
    public function remove(Phonebook $user)
    {
        $this->manager->remove($user);
        $this->manager->flush();
    }

}