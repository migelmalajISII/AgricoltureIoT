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


## Sensori Side
1. Utilizzare il software SimulazioneSensori per simulare la presenza di sensori
2. Tutte le richieste per inserire i dati dei sensori nel DB devono essere inviate al seguente url:
    http://localhost:8000/Agriculture_IoT/api.php?user=NOMEUTENTE&apikey=TOKEN
3. Tutti i sensori dovranno spedire un JSON con la seguente sintassi, salvo il mancato inserimento dei dati:
    {tt:value,th:value,at:value,ah:value,uv:value,idsensore:value}
    Dove:
    -tt-> Temperatura del Terreno
    -th-> Umidità del Terreno
    -at-> Temperatura dell'Aria
    -uh-> Umidità dell'Aria
    -uv-> Indice UV
    -idsensore-> ID Univoco del sensore


## Note Utenti:
  Di default è stato creato un utente con privilegi di amministratore:
   Nome Utente: administrator
   Password: password