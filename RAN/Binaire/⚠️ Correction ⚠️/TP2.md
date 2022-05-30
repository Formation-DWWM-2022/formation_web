1. Indiquer la valeur codée par la suite 1101100101110101 qui représente un entier signé en complément à 2 sur 16 bits. 
   
C: C’est un nombre négatif. Complément à 2 : 0010011010001011 donc −9867

Même question avec la suite 1001000011101101.

C: C’est un nombre négatif. Complément à 2 : 0110111100010011 donc −28435

2. Représentation binaire des entiers négatifs

(a) Coder sur 4 bits les entiers 7, 2, 0, −2, −7 et −8 avec les représentations suivantes :

– signe et valeur absolue ;

C: 0111, 0010, 0000 ou 1000, 1010, 1111, n/a

– complément à 1 ;

C: 0111, 0010, 0000 ou 1111, 1101, 1000, n/a

– complément à 2.

C: 0111, 0010, 0000, 1110, 1001, 1000

(b) Coder les entiers 61 et −61 sur un octet en utilisant la représentation par le signe et la valeur absolue. Montrer que l’addition binaire de ces entiers ainsi codés produit un résultat incorrect. Montrer qu’en revanche le résultat est correct si ces entiers sont codés en utilisant la représentation par le complément à 2.

    00111101 = 61
    + 10111101 = -61
    =
    11111010 = -122

    00111101 = 61
    + 11000011 = -61
    =
    00000000 = 0

3. Effectuer en binaire (8 bits) les opérations 1 − 2, 51 + 127, −3 − 127, −127 + 127, −63 − 63. Préciser, pour chaque opération, la retenue et le débordement.
   
4. Représentation des réels
(a) En virgule fixe, décoder le nombre binaire 11.011 puis coder en binaire le réel 11.625.
(b) En virgule flottante normalisée, coder en binaire au format simple précision le réel 12.575 puis effectuer le
codage inverse.
5. Opérations en virgule flottante.
Soit a = [0.10010 × 10^101]
2 et b = [0.11010 × 10^1]
2. Calculer a + b et a × b.