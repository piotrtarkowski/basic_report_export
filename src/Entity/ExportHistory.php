<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ExportHistoryRepository;

/**
 * ExportHistory
 *
 * @ORM\Table(name="export_history")
 * @ORM\Entity(repositoryClass=ExportHistoryRepository::class)
 */
class ExportHistory
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="id_export_history", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private ?int $idExportHistory = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="export_at", type="datetime", nullable=true)
     */
    private ?\DateTime $exportAt = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=true)
     */
    private ?string $name = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user", type="string", length=150, nullable=true)
     */
    private ?string $user = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="place", type="string", length=150, nullable=true)
     */
    private ?string $place = null;

    public function getIdExportHistory(): ?int
    {
        return $this->idExportHistory;
    }

    public function getExportAt(): ?\DateTimeInterface
    {
        return $this->exportAt;
    }

    public function setExportAt(?\DateTimeInterface $exportAt): self
    {
        $this->exportAt = $exportAt;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(?string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(?string $place): self
    {
        $this->place = $place;

        return $this;
    }


}
