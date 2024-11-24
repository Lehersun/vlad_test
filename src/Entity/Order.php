<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private int $user_id;

    #[ORM\Column]
    private int $equal_price;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private \DateTimeImmutable $created;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private Event $event;

    public function __construct(Event $event, int $user_id, int $equal_price)
    {
        $this->event = $event;
        $this->user_id = $user_id;
        $this->equal_price = $equal_price;
        $this->created = new \DateTimeImmutable();
    }
}
