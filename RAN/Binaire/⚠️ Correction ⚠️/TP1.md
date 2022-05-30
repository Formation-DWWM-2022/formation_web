1. Donner la valeur décimale des entiers suivants, la base dans laquelle ces entiers sont codés étant précisée.

        (a) 1011011 = 1+2+0+8+16+0+64 = 91
            101010 = 42

        (b) A1BE = 1010,0001,1011,1110 = 41406
            C4F3 = 1100,0100,1111,0011 = 50419

        (c) 77210 = 111,111,010,001,000 = 32392
            31337 = 011,001,011,011,111 = 13023

2. Coder l’entier 2 397 successivement en base 2, 8 et 16.

        2397[10] 
        = 2397 / 2 = 1198 reste 1
        = 1198 / 2 = 599 reste 0
        = 599 / 2 = 299 reste 1
        = 299 / 2 = 149 reste 1
        = 149 / 2 = 74 reste 1
        = 74 / 2 = 37 reste 0
        = 37 / 2 = 18 reste 1
        = 18 / 2 = 9 reste 0
        = 9 / 2 = 4 reste 1
        = 4 / 2 = 2 reste 0
        = 2 / 2 = 1 reste 0
        = 1 / 2 = 0 reste 1

        = 100,101,011,101[2] = 4535[8] 
        = 1001,0101,1101[2] = 95D[16]

3. Donner la valeur décimale du nombre 10101, dans le cas où il est codé en base 2, 8 ou 16. Même question avec le nombre 6535 codé en base 8 ou 16.
   
        10101[2] = 21[10] 
        10101[8] = 001,000,001,000,001[2] = 1041[16] 
        10101[16] = 0001,0000,0001,0000,0001[2] = 65793[10]

4. Combien d’entiers positifs peut-on coder en binaire sur un octet ? 
   
C: Un octet contient 8 bits, on peut donc coder 2^8 = 256 entiers

5. Soit un ordinateur dont les mots mémoire sont composés de 32 bits. Cet ordinateur dispose de 4 Mo de mémoire.
Un entier étant codé sur un mot, combien de mots cet ordinateur peut-il mémoriser simultanément ? 

C: 4 Mo = 4 × 2^20 octets, un mot est composé de 4 octets. Cet ordinateur peut donc mémoriser (4×2^20)/4 = 2^20 = 1 048 576 mots

Quelle est la plus grande valeur entière (décimale) que cet ordinateur peut mémoriser, cette valeur étant représentée par son codage binaire pur ? 

C: La mémoire contient 4 × 2^20 octets, c.-à-d. 4 × 2^20 × 8 = 33 554 432 bits. La plus grande valeur entière que cet ordinateur peut mémoriser est donc 2^(33 554 432) − 1.

6. Coder en binaire sur un octet les entiers 105 et 21 puis effectuer l’addition binaire des entiers ainsi codés. Vérifier que le résultat sur un octet est correct. Même question avec les entiers 184 et 72.
    
        105 = 1101001 +
        21 = 10101
        =
        126 = 1111110 correct

        184 = 10111000 +
        72 = 1001000
        =
        0 = (1)00000000 pas correct(sur 8 bits)

7. Coder en binaire sur un octet les entiers 79 et 52 puis effectuer la multiplication binaire des entiers ainsi codés.
Même question avec les entiers 135 et 46.

        1001111 = 79
        × 110100 = 52
        =
        1001111

        1001111
        + 1001111
        =
        1000000001100 = 4108

        10000111 = 135
        × 101110 = 46
        =
        10000111

        10000111
        + 10000111
        =
        1100001000010 = 6210

8. Indiquer la valeur codée par le mot de 16 bits 1101100101110101 suivant qu’il représente un entier non signé, ou un entier signé. 

C: En non signé, la valeur est 1101100101110101[2] = 55669[10]. En signé, le premier bit (bit de signe) vaut 1, c’est donc un nombre négatif dont la valeur est −101100101110101[2] = −22901[10].

Même question avec le mot 1001000011101101.

C: En non signé, la valeur est 1001000011101101[2] = 37101[10]. 
En signé, c’est un nombre négatif dont la valeur est −1000011101101[2] = −4333[10].
   