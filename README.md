# api-rest
Extension du projet - Live Coding "Créer une API Rest" -

Utiliser l'API

Produits

    - lire : methode GET
    - lire_un : méthode GET + envoyer { "id" : 1}
    - supprimer : méthode DELETE + envoyer { "id" : 1}
    - créer : méthode POST + envoyer 
        {
            "nom": "Nom du produit",
            "description": "Ma description",
            "prix": "50",
            "categories_id": 5
        }
    - modifier : méthode PUT + envoyer
        {
            "id" : 1
            "nom": "Nom du produit modifié",
            "description": "Ma nouvelle description",
            "prix": "50",
            "categories_id": 5
        }

Categories

    - lire : methode GET
    - lire_un : méthode GET + envoyer { "id" : 1}
    - supprimer : méthode DELETE + envoyer { "id" : 1}
    - créer : méthode POST + envoyer 
        {
            "nom": "Nom de la catégorie",
            "description": "Ma description"
        }
    - modifier : méthode PUT + envoyer
        {
            "id" : 1
            "nom": "Nom de la catégorie modifiée",
            "description": "Ma nouvelle description"
        }
