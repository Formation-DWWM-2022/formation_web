- TOP 10 OWASP et ses vulnérabilités : https://youtu.be/pHI2zitLph8

# Identifiez les risques de sécurité pour une entreprise
## Appréhendez l'importance de la sécurité

En 2012, la société Yahoo a été piratée.  À cause d'une mauvaise configuration de la sécurité des bases de données, les mots de passe des utilisateurs ont été rendus publics. Vous pouvez imaginer à quel point cela a nui à l’entreprise, et combien d'argent elle a perdu - sans parler de l'effet que cela a eu sur plus de 450 000 utilisateurs ! 

Une faille aussi importante aurait-elle pu être évitée ?

Probablement ! 80 % des attaques sur les applications web sont dues à de mauvaises pratiques de développement, qui sont à l’origine des vulnérabilités découvertes et exploitées.

De plus en plus d'entreprises utilisent des applications web pour traiter des données privées, telles que des informations personnelles (nom, date de naissance, numéro d'identification national, etc.) ou des données bancaires. Toutes ces données représentent un attrait considérable pour un attaquant. 

Une fuite de données due à un piratage a un impact majeur sur l’image d’une entreprise. Ces dommages se matérialisent bien souvent par des pertes financières. Le cas de Yahoo n’est pas une exception : de nombreuses entreprises sont victimes de piratages exposant les données des utilisateurs. Mais ce n'est pas tout, l'image de marque des entreprises piratées est également écornée en cas d'attaque.

    Le site https://haveibeenpwned.com/ répertorie les différentes fuites de données liées à des sites web largement utilisés.

Dans ce cours, nous parlerons des atteintes à la protection des données qui découlent d'attaques courantes. Ces violations sont spécifiquement liées aux applications web.

## Découvrez comment les entreprises gèrent les risques

La mise en place de pratiques de développement sécurisées au sein d'une entreprise peut représenter un budget considérable. Toutes les entreprises ont des actifs qu'elles doivent protéger. Ces actifs peuvent être des équipements physiques tels que des serveurs, mais aussi des données que l'entreprise doit protéger. C’est pour cette raison que les entreprises doivent mettre en place une politique de gestion des risques, comprenant la gestion de la responsabilité de la sécurité de l'entreprise.

Cependant, cette politique ne sera pas la même en fonction de la valeur des actifs.

    La gestion du risque consiste à déterminer la valeur d'un actif et le coût de sa protection.

Prenons un exemple.

Si j'ai un ensemble de données d'une valeur de 10 € et que je dois investir 100 € pour les sécuriser, est-ce que cela vaut la peine de les sécuriser ? Probablement pas.

Mais qu'en est-il des données qui pourraient valoir des millions d’euros et qui nécessitent un investissement de  100 000 € pour les sécuriser ?

# Identifiez les règles de sécurité à appliquer par les entreprises

De nos jours, la plupart des informations se trouvent facilement sur le web. Un pirate n'a pas besoin d'entrer dans un immeuble pour obtenir des données, il peut le faire directement depuis chez lui ! Cela signifie que les entreprises doivent mettre en place des mesures de sécurité pour se protéger des attaques potentielles.

## Découvrez les mesures de sécurité pour les applications web

Il existe trois principes de sécurité qui peuvent être appliqués pour garantir la sécurité d’une application ou d’une infrastructure.
1. La confidentialité. C'est l'assurance que les personnes non autorisées n'accèdent pas à des informations sensibles.
2. L'intégrité. Elle permet d'être sûr que les données sont fiables et n'ont pas été modifiées par des personnes non autorisées.
3. La disponibilité. C'est l’assurance qu'il n'y a pas de perturbation d'un service ou de l'accessibilité aux données.

La sécurité de l'information repose sur l'équilibre entre ces trois principes.

Ces principes fondamentaux sont des éléments clés dans l’élaboration des politiques de sécurité en entreprise. Mais il existe également des réglementations imposées pour certains secteurs d’activités qui influencent également les politiques de sécurité des entreprises. 

Il existe de nombreux règlements en fonction des domaines d’activité des entreprises, en voici quelques-uns qui pourront vous être utiles.

## Identifiez les principales réglementations de sécurité pour les applications web

En 2018, le règlement général sur la protection des données (RGPD) est entré en vigueur. Il modifie la manière dont les données personnelles sont stockées et utilisées et la façon dont les entreprises les traitent. Il permet aux résidents de l'Union européenne de contrôler leurs informations personnelles, comme leur nom, leur âge, leur affiliation politique et leur orientation sexuelle, par exemple. 

Les entreprises ne respectant pas le RGPD sont passibles d'une amende. Bien qu'il soit basé sur la législation de l'Union européenne, il concerne tous les pays car les applications web sont disponibles dans le monde entier. Les entreprises en dehors de l’UE qui font du business avec des entreprises européennes devront respecter le RGPD pour leurs applications web à destination du marché européen.

    Comment puis-je être sûr que mon application web répond à ces normes ?

Un des éléments primordial et de veiller à garantir la sécurité des données personnelles stockées et échangées via l’application web. Les données collectées doivent aussi répondre à un usage spécifique.

De plus, il est nécessaire d’avoir la possibilité de supprimer les données personnelles à la demande du client. Par exemple, si un utilisateur veut se désabonner d'une newsletter, il faut s’assurer qu'il existe une option permettant le désabonnement. Une fois qu’une personne se désabonne, l'adresse e-mail doit être automatiquement supprimée de la base de données.

    Jetez un coup d'œil au [site web officiel du RGPD  (en anglais)](https://gdpr.eu/) pour avoir plus d'informations sur la façon dont vous pouvez développer votre application web selon les normes du règlement.

### Découvrez la norme PCI DSS

La norme Payment Card Industry Data Security Standard (PCI DSS) est une norme établie pour toutes les entreprises qui traitent des données bancaires. La sécurisation des données bancaires met l'accent sur la sécurité lors de la transmission, du traitement et du stockage des données. 

De plus en plus de plateformes web et de solutions de stockage gèrent les applications pour les entreprises, il est essentiel que le fournisseur soit également conforme à la norme PCI DSS.

Si vous créez une application web qui traite des données bancaires, comme une boutique en ligne ou un site web par abonnement, vous devez chiffrer les transmissions pour garantir la sécurité des données en transit. Les données bancaires transmises en texte clair constituent une violation de la norme PCI DSS, ce qui peut faire l’objet d’une amende. 

Si vous souhaitez en savoir plus, voici le [site officiel du PCI DSS (en anglais)](https://www.pcisecuritystandards.org/).

### Appréhendez la réglementation du traitement des données de santé

Les données de santé sont des données à caractère personnel particulières car considérées comme sensibles. Elles font à ce titre l’objet d’une protection spécifique inscrite dans de nombreux textes comme le règlement européen sur la protection des données personnelles, la loi Informatique et Libertés, le Code de la santé publique, etc., afin de garantir le respect de la vie privée des personnes.

    Pour en savoir plus sur le traitement des données personnelles en France, rendez-vous sur le site de la [CNIL](https://www.cnil.fr/).

## Découvrez l'OWASP

L’Open Web Application Security Project (OWASP) est un organisme impartial, mondial et sans but lucratif. Il évalue les dix principaux risques pour la sécurité des applications web et préconise un développement logiciel sécurisé.

L'OWASP organise des rencontres et des conférences ouvertes à tous à travers le monde. Il est donc possible de rencontrer et d’échanger avec la communauté pour effectuer une veille constante.

En tant que développeur web, il est important d'apprendre comment sécuriser votre application, afin qu'elle ne soit pas vulnérable aux attaques courantes. Le Top Ten de l'OWASP fournit des lignes directrices à suivre permettant de respecter des bonnes pratiques pour protéger une application web. Cela vous permettra de prendre en compte la sécurité dès vos premiers développements et apportera également une crédibilité supplémentaire à vos clients ou à l’entreprise pour laquelle vous travaillez. De plus, si vous avez besoin de développer votre application web selon les normes RGPD, PCI DSS ou autre, vous devrez d'abord la sécuriser avec l’OWASP ! 
