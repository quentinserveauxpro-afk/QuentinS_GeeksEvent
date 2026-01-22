<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
class Profil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pdp = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bio = null;

    /**
     * @var Collection<int, Activite>
     */
    #[ORM\ManyToMany(targetEntity: Activite::class, inversedBy: 'profils')]
    private Collection $preferences;

    #[ORM\OneToOne(mappedBy: 'profil', cascade: ['persist', 'remove'])]
    private ?Utilisateur $utilisateur = null;

    public function __construct()
    {
        $this->preferences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPDP(): ?string
    {
        return $this->pdp;
    }

    public function setPDP(?string $pdp): static
    {
        $this->pdp = $pdp;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * @return Collection<int, Activite>
     */
    public function getPreferences(): Collection
    {
        return $this->preferences;
    }

    public function addPreference(Activite $preference): static
    {
        if (!$this->preferences->contains($preference)) {
            $this->preferences->add($preference);
        }

        return $this;
    }

    public function removePreference(Activite $preference): static
    {
        $this->preferences->removeElement($preference);

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        // unset the owning side of the relation if necessary
        if ($utilisateur === null && $this->utilisateur !== null) {
            $this->utilisateur->setProfil(null);
        }

        // set the owning side of the relation if necessary
        if ($utilisateur !== null && $utilisateur->getProfil() !== $this) {
            $utilisateur->setProfil($this);
        }

        $this->utilisateur = $utilisateur;

        return $this;
    }
}
