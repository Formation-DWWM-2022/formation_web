# Comment et pourquoi nous avons implémenté le « Modèle de dépôt » dans notre backend ?

- Repository Pattern : https://youtu.be/x6C20zhZHw8

Le modèle de dépôt est l’un des modèles les plus discutés en raison de nombreux conflits avec les ORC. Ce modèle est souvent utilisé comme couche d’abstraction pour interagir avec la base de données. Pourtant, puisque les ORMs servent le même but, de nombreux développeurs se confondent.

# Pourquoi utiliser une couche de dépôt pour l’accès aux données?

La raison pour laquelle une couche d’abstraction existe dans une application est de réduire drastiquement la duplication de code.

ORM est la couche d’abstraction la plus connue utilisée pour accéder facilement aux données et les modifier par rapport aux bases de données SQL. Laravel a Éloquent, Symfony a Doctrine, etc.

En utilisant un ORM votre logique d’affaires pourrait être quelque chose comme :

```php
$user = (new User())->find($id);
$user->first_name = "Valerio";
$user->save();
```

C’est la logique d’affaires, et il ne se soucie pas de comment et où les données sont stockées. Il dépend de l’implémentation et de la configuration ORM interne. Si vous êtes un développeur avec une expérience professionnelle, vous utilisez probablement un ORM tous les jours.

Ils fournissent déjà une couche d’abstraction pour avoir un accès intelligent aux données.

```php
interface OrganizationRepository
{
    public function get($id): Organization;
    public function create(array $attributes): Organization;
    public function update($id, array $attributes): Organization;
    public function updateCurrentBillingConsumption($id, $value = null): Organization;
    public function addBonusTransactions($id, int $qty): Organization;
    public function lock($id): Organization;
    public function unlock($id): Organization;
    public function delete($id);
}
```
