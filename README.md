# Liste des entités
## Utilisateur
(OneToOne => Profil)
- Nom
- Email
- Téléphone
- Mot de Passe

## Participant
// Hérite d'Utilisateur //
(ManyToMany => Activités)
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
(ManyToOne => Organisateur)
- Nom
- Type
- Date
- Localisation
- Horaires
- Adresse

## Profil
(OneToOne => Utilisateur)
- Photo de profil
- Bio
- Préférences

## Activité
(ManyToMany => Participant)
- Nom
- Description
- Lieu
- Horaires
