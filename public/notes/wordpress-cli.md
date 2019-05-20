# Installare Wordpress via CLI

Accedendo via SSH e andando alla cartella specifica eseguire:

```ssh
wget https://it.wordpress.org/latest-it_IT.tar.gz
tar xfz latest-it_IT.tar.gz
mv wordpress/* ./
rmdir ./wordpress/
rm -f latest-it_IT.tar.gz
```

o, su una linea sola...

```ssh
wget https://it.wordpress.org/latest-it_IT.tar.gz && tar xfz latest-it_IT.tar.gz && mv wordpress/* ./ && rmdir ./wordpress/ && rm -f latest-it_IT.tar.gz
```
