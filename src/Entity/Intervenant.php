<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Intervenant extends Utilisateur
{
    #[ORM\Column(length: 255)]
    private ?string $nomDeScene = null;

    public function getNomDeScene(): ?string
    {
        return $this->nomDeScene;
    }

    public function setNomDeScene(?string $nomDeScene): void
    {
        $this->nomDeScene = $nomDeScene;
    }
}
