<?php

namespace App\Entity;

use App\Repository\IntervenantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: IntervenantRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class Intervenant extends Utilisateur
{
    #[ORM\Column(length: 50)]
    private ?string $nomDeScene = null;

    public function getNomDeScene(): ?string
    {
        return $this->nomDeScene;
    }

    public function setNomDeScene(string $nomDeScene): static
    {
        $this->nomDeScene = $nomDeScene;

        return $this;
    }
}
