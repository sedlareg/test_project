<?php

namespace App\Controller;

use App\Entity\Button;
use App\Repository\ButtonRepository;
use App\Repository\CustomerRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class ExampleController.
 */
class ExampleController
{
    /**
     * @var ButtonRepository
     */
    private $buttonRepository;
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * ExampleController constructor.
     * @param ButtonRepository $repository
     */
    public function __construct(ButtonRepository $repository, CustomerRepository $customerRepository)
    {
        $this->buttonRepository = $repository;
        $this->customerRepository = $customerRepository;
    }

    /**
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function indexAction($id)
    {
        $customer = $this->customerRepository->findById($id);
        $buttons = $this->buttonRepository->findByCustomer($customer);

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        return new Response($serializer->serialize($buttons, 'json'));
    }
}
