<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Order;
use App\Repository\EventRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/api/test", name: "Test controller", methods: ["GET"])]
class TestController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager, private EventRepository $eventRepository)
    {
    }

    public function __invoke()
    {

        $event = new Event(new DateTime());
//        $event = $this->eventRepository->find(1);

        $order = new Order($event, 1, 100);

        $this->entityManager->persist($order);
        $this->entityManager->persist($event);
        $this->entityManager->flush();

        return $this->json(['message' => 'Hello World!']);
    }
}
