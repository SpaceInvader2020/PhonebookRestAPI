<?php


namespace App\Controller;


use App\Entity\Phonebook;
use App\Form\Type\PhonebookType;
use App\Repository\PhonebookRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class PhonebookController
 * @package App\Controller
 */
class PhonebookController extends AbstractApiController
{
    /**
     * @var PhonebookRepository
     */
    private $phonebookRepository;

    public function __construct(PhonebookRepository $phonebookRepository)
    {
        $this->phonebookRepository = $phonebookRepository;
    }
    /**
     * @Rest\Get("/phonebook")
     */
    public function read(): Response
    {
        /**
         * @var Phonebook[] $itemsCollection
         */
        $itemsCollection = $this->phonebookRepository->findAll();
        return $this->response($itemsCollection, Response::HTTP_OK);
    }

    /**
     * @Rest\Post("/phonebook/")
     */
    public function create(Request $request): Response
    {

        $form = $this->buildForm(PhonebookType::class);
        $form->handleRequest($request);
        if(!$form->isSubmitted() || !$form->isValid()){
           return $this->response($form, Response::HTTP_BAD_REQUEST);
        }

        $item = $form->getData();

        $item = $this->phonebookRepository->save($item);

        return $this->response($item);
    }

    /**
     * @Rest\Put("/phonebook/{id}")
     */
    public function update(Request $request, $id ): Response
    {
        $phonebook = $this->phonebookRepository->find($id);
        $form = $this->buildForm(PhonebookType::class, $phonebook,["method"=>$request->getMethod()]);
        $form->handleRequest($request);
        if(!$form->isSubmitted() || !$form->isValid()){
            return $this->response($form, Response::HTTP_BAD_REQUEST);
        }

        $item = $form->getData();
        $this->phonebookRepository->save($item);

        return $this->response($item);

    }
    /**
     * @Rest\Delete("/phonebook/{id}")
     */
    public function delete($id): Response
    {
        $item = $this->phonebookRepository->find($id);
        if(!$item) {
            throw new NotFoundHttpException("Phone book item doesn't exist");
        }

        $this->phonebookRepository->remove($item);
        return $this->response(["message"=>"Phone book item successfully removed"],Response::HTTP_OK);
    }


    /**
     * @Rest\Get("/phonebook/{id}", name="get_phonebook_item", methods={"GET"})
     */
    public function getSingleItem($id): Response
    {
        $item = $this->phonebookRepository->find($id);
        if(!$item) {
            throw new NotFoundHttpException("Phone book item doesn't exist");
        }

        return $this->response($item);
    }
}