<?php

namespace App\Entity;

use App\Repository\PolicyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PolicyRepository::class)
 */
class Policy
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $update;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $updateOffset;

    /**
     * @ORM\OneToMany(targetEntity=Agent::class, mappedBy="policy")
     */
    private $agents;

    public function __construct()
    {
        $this->agents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getUpdate(): ?string
    {
        return $this->update;
    }

    public function setUpdate(string $update): self
    {
        $this->update = $update;

        return $this;
    }

    public function getUpdateOffset(): ?string
    {
        return $this->updateOffset;
    }

    public function setUpdateOffset(?string $updateOffset): self
    {
        $this->updateOffset = $updateOffset;

        return $this;
    }

    /**
     * @return Collection|Agent[]
     */
    public function getAgents(): Collection
    {
        return $this->agents;
    }

    public function addAgent(Agent $agent): self
    {
        if (!$this->agents->contains($agent)) {
            $this->agents[] = $agent;
            $agent->setPolicy($this);
        }

        return $this;
    }

    public function removeAgent(Agent $agent): self
    {
        if ($this->agents->removeElement($agent)) {
            // set the owning side to null (unless already changed)
            if ($agent->getPolicy() === $this) {
                $agent->setPolicy(null);
            }
        }

        return $this;
    }
}
