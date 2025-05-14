# Implémentation de la Réalité Virtuelle (VR) dans Airmess

Ce document explique comment la fonctionnalité de réalité virtuelle a été intégrée à l'application Airmess, principalement pour la section des Bons Plans.

## Aperçu

La fonctionnalité VR permet aux utilisateurs de visualiser les Bons Plans (restaurants, cafés, musées, etc.) en réalité virtuelle avant de les visiter. Cela offre une expérience immersive qui aide les utilisateurs à prendre des décisions plus éclairées.

## Technologie utilisée

- **Three.js** : Une bibliothèque JavaScript pour créer et afficher des graphiques 3D animés dans un navigateur web
- **WebXR API** : Une API web qui permet de créer des expériences de réalité virtuelle et augmentée dans le navigateur
- **Symfony** : Le framework PHP utilisé pour l'application

## Structure des fichiers

- `src/Controller/VrExperienceController.php` : Contrôleur pour les fonctionnalités VR
- `src/Entity/BonPlan.php` : Entité mise à jour avec des champs pour le contenu VR
- `templates/bonplan/vr_experience.html.twig` : Template pour l'expérience VR
- `templates/bonplan/vr_list.html.twig` : Template pour la liste des expériences VR
- `migrations/VRBonplanMigration.sql` : Script SQL pour mettre à jour la base de données

## Mise en place de la base de données

Pour ajouter les champs nécessaires à la base de données, exécutez :

```bash
mysql -u [username] -p [database_name] < migrations/VRBonplanMigration.sql
```

Ou utilisez la commande de migration Symfony :

```bash
php bin/console doctrine:migrations:migrate
```

## Fonctionnalités VR

### 1. Visualisation 3D des lieux

Les utilisateurs peuvent explorer une représentation 3D des Bons Plans. Le système génère automatiquement un environnement 3D basé sur le type de lieu (restaurant, café, etc.).

### 2. Images panoramiques 360°

Les administrateurs peuvent télécharger des images 360° pour créer une expérience panoramique immersive d'un lieu.

### 3. Modèles 3D personnalisés

Les lieux peuvent être représentés par des modèles 3D personnalisés au format GLTF/GLB.

## Comment ajouter une expérience VR

1. Allez dans le panneau d'administration des Bons Plans
2. Créez un nouveau Bon Plan ou modifiez un existant
3. Cochez la case "Activer l'expérience VR"
4. Téléchargez une image 360° et/ou un modèle 3D (optionnel)
5. Enregistrez les modifications

Si aucun modèle 3D ou image 360° n'est fourni, le système générera automatiquement un environnement 3D basé sur le type de lieu.

## Accès utilisateur

Les utilisateurs peuvent accéder aux expériences VR via :

- Le menu principal de l'application
- La section Bons Plans dans le tableau de bord
- La page détaillée d'un Bon Plan

## Compatibilité

L'expérience VR est compatible avec :

- Casques VR via WebXR (Oculus Quest, HTC Vive, etc.)
- Expérience 3D standard sur ordinateur de bureau (souris pour naviguer)
- Appareils mobiles (gyroscope pour la vue 360°)

## Futures améliorations

- Ajout d'interactions avec les objets 3D
- Intégration de l'audio spatial
- Visites virtuelles guidées
- Fonctionnalités multi-utilisateurs pour explorer ensemble 