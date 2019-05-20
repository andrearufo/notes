# Quando su Wordpress non funziona l'FTP

Quando capita che, nel pannello di Wordpress, tenti di installare un plugin o un tema e c'è un errore di FTP per qui non riesci a risolvere inserendo le credenziali, una possibile soluzione è inserire questo codice in `wp-config.php`:

```php
define('FS_METHOD','direct');
```

Permette di trasferire i file senza usare il protocollo FTP.
