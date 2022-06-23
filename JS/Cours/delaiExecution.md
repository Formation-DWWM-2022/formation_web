# Gestion du délai d’exécution en JavaScript avec setTimeout() et setInterval()

Parfois, on ne voudra pas exécuter une fonction immédiatement mais plutôt dans un certain temps ou on pourra encore vouloir exécuter une fonction plusieurs fois avec un intervalle de temps défini entre chaque exécution.

Cela va notamment être le cas lors de la création d’une horloge, d’un slider, ou d’une animation comportant un défilement en JavaScript .

Le JavaScript met à notre disposition deux méthodes pour gérer le délai d’exécution d’un code : les méthodes setInterval() et setTimeout() qui sont des méthodes qui vont être implémentées par Window dans un contexte Web.

## La méthode setTimeout()

La méthode setTimeout() permet d’exécuter une fonction ou un bloc de code après une certaine période définie (à la fin de ce qu’on appelle un « timer »).

Il va falloir passer deux arguments à cette méthode : une fonction à exécuter et un nombre en millisecondes qui représente le délai d’exécution de la fonction (le moment où la fonction doit s’exécuter à partir de l’exécution de setTimeout()).

On va également pouvoir passer des arguments facultatifs à setTimeout() qui seront passés à la fonction qui doit s’exécuter après un certain délai.

Notez que la méthode setTimeout() renvoie un entier positif à l’issue de son exécution qui va identifier la timer créé par l’appel à setTimeout(). On va ainsi pouvoir utiliser cet entier pour annuler l’exécution de la fonction à laquelle on a ajouté un délai avec clearTimeout() qu’on va étudier par la suite.

```js
let b1 = document.getElementById('b1');

b1.addEventListener('click', message);
function message(){
    setTimeout(alert, 2000, 'Message d\'alerte après 2 secondes'); 
}
```

Dans l’exemple ci-dessus, nous avons une page avec 4 boutons. On accède à ces boutons en JavaScript avec la méthode getElementById() et on attache un gestionnaire d’évènement click sur le premier bouton en utilisant la méthode addEventListener().

Lorsqu’un utilisateur clique sur le premier bouton, cela déclenche donc l’exécution de la fonction message(). Cette fonction exécute une méthode setTimeout().

La méthode setTimeout() sert ici à afficher un message dans une boite d’alerte avec le texte « Message d’alerte après 2 secondes ». La boite d’alerte n’apparaitra que 2 secondes après la fin de l’exécution de setTimeout().

## La méthode clearTimeout()

La méthode clearTimeout() va nous permettre d’annuler ou de supprimer un délai défini avec setTimeout() (et donc également d’annuler l’exécution de la fonction définie dans setTimeout()).

Pour que cette méthode fonctionne, il va falloir lui passer en argument l’identifiant retourné par setTimeout().

Regardez plutôt le code ci-dessous pour bien comprendre :

```js
let b1 = document.getElementById('b1');
let b2 = document.getElementById('b2');
let timeoutId;

b1.addEventListener('click', message);
b2.addEventListener('click', stopDelai);

function message(){
    timeoutId = setTimeout(alert, 2000, 'Message d\'alerte après 2 secondes'); 
}
function stopDelai(){
    clearTimeout(timeoutId);
}


```

Ici, on commence par récupérer le résultat renvoyé par setTimeout() dans une variable qu’on appelle timeoutId.

On ajoute ensuite un gestionnaire d’évènement click au deuxième bouton de notre page. Ce gestionnaire d’évènement exécute une fonction stopDelai() qui contient elle-même une méthode clearTimeout() qui permet d’annuler le délai défini par la méthode setTimeout() correspondant au timeoutId passé.

Essayez par exemple de cliquer sur le premier bouton puis sur le deuxième bouton avant 2 secondes : vous allez voir que la boite d’alerte ne s’affichera pas.

## La méthode setInterval()

La méthode setInterval() permet d’exécuter une fonction ou un bloc de code en l’appelant en boucle selon un intervalle de temps fixe entre chaque appel.

Cette méthode va prendre en arguments le bloc de code à exécuter en boucle et l’intervalle entre chaque exécution exprimé en millisecondes.

On va également pouvoir passer en arguments facultatifs les arguments de la fonction qui doit être exécutée en boucle.

Tout comme la méthode setTimeout(), la méthode setInterval() renvoie un entier positif qui va servir à identifier un appel à setInterval() et nous permettre d’annuler l’intervalle de répétition avec clearInterval().

La méthode setInterval() va s’avérer très utile et être beaucoup utilisée pour réaliser de nombreuses choses sur un site. On va notamment pouvoir l’utiliser pour afficher une horloge qui va se mettre à jour automatiquement toutes les secondes :

```js
let b1 = document.getElementById('b1');
let b2 = document.getElementById('b2');
let b3 = document.getElementById('b3');
let p1 = document.getElementById('p1');
let timeoutId;

b1.addEventListener('click', message);
b2.addEventListener('click', stopDelai);
b3.addEventListener('click', afficheHeure);

function message(){
    timeoutId = setTimeout(alert, 2000, 'Message d\'alerte après 2 secondes'); 
}
function stopDelai(){
    clearTimeout(timeoutId);
}

function afficheHeure(){
    setInterval(function(){
        let d = new Date();
        p1.innerHTML = d.toLocaleTimeString();
    }, 1000)
}
```

Ici, on passe une fonction anonyme à notre méthode setInterval(). Cette fonction anonyme sera exécutée toutes les secondes. A chaque exécution, elle récupère la date courante dans une variable let d avec let d = new Date() et l’affiche dans un format local au sein de l’élément portant l’id='p1' dans notre page HTML.

## La méthode clearInterval()

La méthode clearInterval() permet d’annuler l’exécution en boucle d’une fonction ou d’un bloc de code définie avec setInterval().

Pour que cette méthode fonctionne, il va falloir lui passer en argument l’identifiant retourné par setInterval().

```js
let b1 = document.getElementById('b1');
let b2 = document.getElementById('b2');
let b3 = document.getElementById('b3');
let b4 = document.getElementById('b4');
let p1 = document.getElementById('p1');
let timeoutId;
let intervalId;

let dec = 0;
let sec = 0;
let min = 0;
let heu = 0;
p1.textContent = heu + ' : ' + min + ' :' + sec + ' . ' + dec;

b1.addEventListener('click', message);
b2.addEventListener('click', stopDelai);
b3.addEventListener('click', timer);
b4.addEventListener('click', stopTimer);

function message(){
    timeoutId = setTimeout(alert, 2000, 'Message d\'alerte après 2 secondes'); 
}
function stopDelai(){
    clearTimeout(timeoutId);
}

function timer(){
    intervalId = setInterval(function(){
        p1.textContent = heu + ' : ' + min + ' : ' + sec + ' . ' + dec;
        dec += 1;
        if(dec >= 10){dec = 0; sec += 1;}
        if(sec >= 60){sec = 0; min += 1;}
        if(min >= 60){min = 0; heu += 1;}
    }, 100)
}
function stopTimer(){
    clearInterval(intervalId);
}
```

Ici, on utilise la méthode setInterval() pour créer un timer ou chronomètre qui va s’incrémenter toutes les 100 millisecondes. Pour créer ce chronomètre, on déclare 4 variables let dec, let sec, let min et let heu qui vont contenir respectivement des dixièmes de secondes, des secondes, des minutes et des heures.

On affiche les valeurs contenues dans ces variables à chaque exécution du code de setInterval() et on rajoute 1 à la variable dec pour incrémenter le chronomètre d’un dixième de secondes.

On utilise enfin un système de if pour ajouter une seconde au chronomètre tous les 10 dixièmes de secondes et réinitialiser la valeur de dec, puis pour ajouter une minute toutes les 60 secondes et etc.
