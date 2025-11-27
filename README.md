# Liste des entités
## Utilisateur
(OneToOne => Profil)
- Nom
- Email
- Téléphone
- Mot de Passe

## Participant
// Hérite d'Utilisateur //
- Pseudo
- Adresse
- Date de naissance

## Organisateur
// Hérite d'Utilisateur //
(OneToMany => Évènement)
- SIRET

## Intervenant
// Hérite d'Utilisateur //
- Nom de scène

## Évènement
(ManyToOne => Organisateur | ManyToMany => Activité)
- Nom
- Type
- Date
- Localisation
- Horaires
- Adresse

## Profil
(OneToOne => Utilisateur | ManyToMany => Activité)
- Photo de profil
- Bio
- Préférences

## Activité
(ManyToMany => Évènement, Profil)
- Nom
- Description
- Lieu
- Horaires
