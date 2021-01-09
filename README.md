# Agricolture IoT

## Database Side
1. Tutto il codice per la creazione del database e delle tabelle è contenuto nel file **ScriptCreazione.sql**
2. Tutto il codice per creare un utente amministratore e per inserire dei sensori è contenuto nel file **ScriptPopolamento.sql**
3. Creare l'utente collegato al database(agriculture_iot):<br>
    -username: Agriculture_IoT<br>
    -password: @Password1234<br>
    -hostname: localhost<br>
   Nel caso in cui cambiate password e/o username è necessario modficare, di conseguenza, anche il file **config.php**(File di configurazione del database)


## WebSite Side
1. Copiare il contenuto della cartella **Agriculture_IoT** nella root directory del nostro server web


## Sensori Side
1. Utilizzare il software SimulazioneSensori per simulare la presenza di sensori
2. Tutte le richieste per inserire i dati dei sensori nel DB devono essere inviate al seguente url:<br>
    http://localhost:8000/Agriculture_IoT/api.php?user=NOMEUTENTE&apikey=TOKEN
3. Tutti i sensori dovranno spedire un JSON con la seguente sintassi, salvo il mancato inserimento dei dati:<br>
    {tt:value,th:value,at:value,ah:value,uv:value,idsensore:value}<br>
    Dove:<br>
    -tt-> Temperatura del Terreno<br>
    -th-> Umidità del Terreno<br>
    -at-> Temperatura dell'Aria<br>
    -uh-> Umidità dell'Aria<br>
    -uv-> Indice UV<br>
    -idsensore-> ID Univoco del sensore<br>


## Note Utenti:
  Di default è stato creato un utente con privilegi di amministratore:<br>
   Nome Utente: administrator<br>
   Password: password<br>
   Token: 4JkGnxsuywdzmgk<br>