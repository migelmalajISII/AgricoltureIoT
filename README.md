# Agricolture IoT

## Database Side
1. Tutto il codice per la creazione del database e delle tabelle è contenuto nel file **ScriptCreazione.sql**
2. Tutto il codice per creare un utente amministratore e per inserire dei sensori è contenuto nel file **ScriptPopolamento.sql**
3. Creare l'utente collegato al database(agriculture_iot):
    -username: Agriculture_IoT
    -password: password.1234
    -hostname: localhost
   Nel caso in cui cambiate password e/o username è necessario modficare, di conseguenza, anche il file **config.php**(File di configurazione del database)


## WebSite Side
1. Copiare il contenuto della cartella **Agriculture_IoT** nella root directory del nostro server web
