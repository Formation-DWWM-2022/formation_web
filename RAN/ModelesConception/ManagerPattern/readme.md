Ces classes sont utilisées pour gérer un ensemble d’objets d’une autre classe, qui sont souvent des ressources.

Par exemple, disons que vous avez un pool de connexions de base de données, chacune représentée par un objet de classe DBConnection.

Si votre code doit se connecter à DB via un pool de connexions, il demandera simplement à la classe DBConnection_Manager une nouvelle connexion. Pourquoi on a besoin de la classe de manager ?

La classe Manager consultera sa liste d’objets DBConnection, et déterminera si l’un d’eux est non alloué, et en retournera un. Si tout est attribué, il en créera un et l’ajoutera au pool (sous réserve de la limite maximale de connexions autorisées) ou placera la demande dans la file d’attente, ou signalera un échec.

TOUTES ces fonctionnalités sont complètement cachées de l’appelant - les détails techniques de la gestion du pool sont le travail de la classe Manager.

Ceci est juste un exemple spécifique, mais l’idée est que la gestion des ressources est centralisée et encapsulée avec une classe Manager et le code utilisateur demande simplement "une ressource".

Je ne sais pas s’il y a un véritable « modèle de conception » pour cette approche, mais j’ai trouvé au moins une page Web qui le dit : http://www.eventhelix.com/realtimemantra/ManagerDesignPattern.htm
