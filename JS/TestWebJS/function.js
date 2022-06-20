// Les déclaration de fonctions
// function disBonjour() {
//     alert('Bonjour');
// }

// Décommentez le code pour lancer l'exécution
// disBonjour();


// Les expressions de fonctions
// let disBonjour = function () {
//     alert('Bonjour');
// };

// Décommentez le code pour lancer l'exécution
// disBonjour();

// let disBonjour = function (nom) {
//     if (nom) {
//         alert('Bonjour ' + nom);
//     } else {
//         bonjour('inconnu');
//     }
// };

// Décommentez le code pour lancer l'exécution
// disBonjour('Pierre');
// disBonjour();


// Déclarations de fonctions vs expressions de fonctions
// Décommentez le code pour lancer l'exécution
// disBonjour(); //Ceci fonctionne

// function disBonjour() {
//     alert('Bonjour');
// }

// disAuRevoir(); //Ceci ne fonctionne pas

// let disAuRevoir = function () {
//     alert('Au revoir');
// }

// Les expressions de fonctions fléchées : syntaxe et intérêts
/*Expression de fonction classique :
let somme = function(a, b) {
    return a + b;
};

function somme(a,b){
    return a + b;
};
*/

//Equivalent en fonction fléchée :
let somme = (a, b) => a + b;

// Décommentez le code pour l'exécuter
// alert(somme(1, 2));


/*Expression de fonction classique :
let double = function(n){
    return n * 2
}
*/

//Equivalent en fonction fléchée :
let double = (n) => n * 2;

// Décommentez le code pour l'exécuter
// alert(double(3));


// Les fonctions fléchées et le mot clef this
// let pierre = {
//     nom: 'Giraud',
//     prenom: 'Pierre',
//     hobbies: ['Trail', 'Triathlon', 'Cuisine'],

//     getFullName() {
//         alert(this.prenom + ' ' + this.nom);
//     }
// };

// Décommentez le code pour l'exécuter
// pierre.getFullName();

// let pierre = { name: 'Pierre' };
// let mathilde = { name: 'Mathilde' };

// function disBonjour() {
//     alert('Bonjour ' + this.name);
// }

// pierre.bonjour = disBonjour;
// mathilde.bonjour = function disBonjour() {
//     alert('Bonjour ' + this.name);
// }
// ;

// Décommentez le code pour l'exécuter
// pierre.bonjour(); //Bonjour Pierre
// mathilde.bonjour(); //Bonjour Mathilde

// console.log(pierre);



/*
Les fonctions fléchées, cependant, sont différentes des autres 
fonctions au sens où elles ne possèdent pas de valeur propre 
pour this : si on utilise ce mot clef dans une
fonction fléchée, alors la valeur utilisée pour celui-ci sera 
celle du contexte de la fonction fléchée c’est-à-dire celle de 
la fonction englobante. */
let pierre = {
    nom: 'Giraud',
    prenom: 'Pierre',
    hobbies: ['Trail', 'Triathlon', 'Cuisine'],

    disBonjour() {
        // document.addEventListener('click', function(){
        //     alert('Bonjour ' + this.prenom);
        // })
        document.addEventListener('click', () => {
            alert('Bonjour ' + this.prenom);
        })
        // let bonjour = () => alert('Bonjour ' + this.prenom);
        // bonjour();
    }
};

// Décommentez le code pour l'exécuter
// pierre.disBonjour(); //Bonjour Pierre




