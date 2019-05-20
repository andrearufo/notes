# Installazione completa di ambiente LAMP

Installo tutti pacchetti necessari per un ambiente base LAMP attraverso un unico comando:

```
sudo apt-get install lamp-server^
```

Poi avvio il setup per usare MySQL

```
mysql_secure_installation
```

Altre librerie necessarie al sistema

```
sudo apt install zip unzip
```

Altre estensioni necessarie per PHP

```
sudo apt-get install php-mbstring
sudo apt-get install php-zip
```

Ricorda poi di installare [Certbot](https://certbot.eff.org/lets-encrypt/ubuntubionic-apache)

Per una procedura più dettagliata però meglio seguitre [la guida di DigitalOcean](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04)
