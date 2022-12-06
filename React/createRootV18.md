# Note: Utilisation de createRoot dans React 18

Dans la précédente vidéo, au niveau du fichier index.js , nous avons vu comment utiliser la méthode createRoot() afin de générer notre "root" et de l'enregistrer dans la constante "root". Ensuite, nous avons invoqué dessus la méthode render() pour retourner notre `<App />` au niveau de la `<div id="root">`.

Voici un petit rappel:

-[](https://img-b.udemycdn.com/redactor/raw/article_lecture/2022-08-02_17-19-42-af3155f4521243aa04069d80e00399f0.png)

Notez qu'une alternative existe pour avoir le même rendu avec un peu moins de code. En effet, vous pouvez importer seulement la méthode createRoot() et l'enchaîner avec le render() (voir la capture ci-dessous).

-[](https://img-b.udemycdn.com/redactor/raw/article_lecture/2022-08-02_17-21-30-05634e53915f9c2b9e8bc4e4d5ef1a92.png)

ATTENTION !

La configuration ci-dessus avec createRoot() est adaptée aux projets React sous la version 18.0.0 et plus !

Si vous êtes sur un projet sous React 17, vous pouvez effectuer la mise à niveau très facilement:

Ouvrez votre terminal, rendez-vous à la racine de votre projet, et lancez:

```
npm install react@18 react-dom@18
```
