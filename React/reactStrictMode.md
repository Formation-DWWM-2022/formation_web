# Note concernant React.StrictMode

Contrairement à mes vidéos, vous avez certainement remarqué `<React.StrictMode>` dans votre fichier index.js.

C'est normal, StrictMode est un outil que React utilise pour détecter les problèmes potentiels dans votre application. StrictMode n’affiche rien dans votre application, il active simplement des vérifications et avertissements supplémentaires pour ses descendants. Ces vérifications du mode strict sont effectuées uniquement durant le développement. Elles n'impactent pas la version utilisée en production. https://fr.reactjs.org/docs/strict-mode.html