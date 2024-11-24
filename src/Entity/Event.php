<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private \DateTimeInterface $event_date;

    #[ORM\OneToMany(targetEntity: Order::class, mappedBy: 'event')]
    private Collection $orders;

    public function __construct(\DateTimeInterface $date)
    {
        $this->event_date = $date;
        $this->orders = new ArrayCollection();
    }
}
