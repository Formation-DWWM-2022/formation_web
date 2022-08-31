# Mémo des méthodes
# Classe PDO

- boolean beginTransaction ( void )
Commence une transaction et retourne TRUE en cas de réussite ou FALSE sinon.
- boolean commit ( void )
Valide une transaction.
- objetPDO __construct ( string $dsn [, string $username [, string $password ]] )
Constructeur de la classe PDO. Crée un objet représentant la connexion.
- string errorCode ( void )
Retourne un code d’erreur.
- array errorInfo ( void )
Retourne un tableau contenant un code d’erreur (indice 0) et un message d’erreur (indice 2).
- integer exec ( string $requete )
Exécute une requête qui ne retourne pas de résultat et retourne le nombre de lignes affectées.
- string lastInsertId ()
Retourne l’identifiant de la colonne dont l’attribut est déclaré AUTO_INCREMENT.
- objet PDOStatement prepare ( string $requete )
Crée une requête préparée et retourne un objet PDOStatement.
- objet PDOStatement query ( string $requete )
Envoie une requête au serveur et retourne un objet résultat.
- string quote( string $chaine )
Protège les caractères spéciaux d’une chaîne.
- boolean rollBack ( void )
Annule la transaction courante.

## Classe PDOStatement
- boolean bindColumn ( divers $colonne, divers $var [, integer type] )
Lie une colonne désignée par son numéro ou son nom à une variable ; le type peut être PDO::PARAM_STR pour une
chaîne ou PDO::PARAM_INT pour un nombre.
- boolean bindParam (divers $parametre, divers $variable [, int type ] )
Lie un paramètre nommé ou interrogatif à une variable. La constante type prend les mêmes valeurs que ci-dessus.
- integer columnCount ( void )
Retourne le nombre de lignes d’un résultat.
- string errorCode ( void )
Retourne un code d’erreur.
- array errorInfo ( void )
Retourne un tableau contenant les informations sur l’erreur en cours.
- bool execute ( [array $parametre] )
Exécute une requête préparée ; le paramètre peut contenir les liaisons des paramètres nommés ou interrogatifs.
- divers fetch ( [integer $style] )
Retourne une ligne de résultat sous forme de tableau indicé ou associatif.
- array fetchAll ( [integer $style )
Retourne l’ensemble des lignes de résultat sous forme de tableau multidimensionnel indicé ou associatif.
- int rowCount ( void )
Retourne le nombre de lignes affectées par la dernière requête.

# Classe PDOException
- objet PDOException _construct()
Crée un objet exception.
- string getCode()
Retourne le code d’erreur.
- string getFile()
Retourne le nom du fichier dans lequel s’est produite l’erreur.
- integer getLine()
Retourne le numéro de ligne du script où s’est produite l’erreur.
- string getMessage()
Retourne le message d’erreur