# Progetto-Finale

### Progetto: 

Realizza un'app per il frontend, che sia una single-page-application o una multi-page-application, che possa gestire delle chiamate ad API RESTful, da te sviluppate, che implementino un sistema di login/logout e registrazione dell'utente.
Aggiungi poi, alle API, delle funzionalità a tuo piacimento.

### Idea:

Nella realizzazione di questo progetto ho avuto molte idee riguardo a come e che funzionalità implementare, la scelta libera mi ha lasciato spazio alla creatività.
Cosi ho deciso di creare un sito che innanzitutto sia utile a me!
Da più di un anno ormai mi interesso e investo nelle criptovalute e più di una volta mi sono trovato davanti al solito problema:
Investendo su vari assets non riuscivo, in modo semplice, a capire le perdite e i guadagni da quali asset era dovuti.
Per questo motivo ho creato questo sito, che ha queste funzioni:
Registrazione, Accesso, Disconnessione, Eliminazione utente
e per ogni utente Registrazione ed Eliminazione di assets.

### Perché PHP?

Il progetto è stato scritto principalmente in PHP, ma perché?
Il motivo è perché con PHP mi trovo molto a mio agio nell'fare le chiamate al database MySQL e inoltre perché tramite le variabili globali mi trovo meglio a gestire le informazioni di Sessione che sono fondamentali da mantenere fra una pagina e l'altra del sito e per gestire il sistema di Logout dell'utente.

### Struttura della Directory:

Anche essendo un progetto principalmente in PHP ho deciso di non utilizzare il framework Laravel.
Nella cartella CSS ci sono i file inerenti allo stile del sito, li ho divisi in più file per rendere tutto più leggibile è modificabile,
La cartella MIGRATIONS contiene i file sql per ricostruire localmente il mio database,
Nella cartella PHP ci sono tutti i file e le funzioni che gestiscono il backend del sito,
La cartella VIEWS invece sono le pagine vere e proprie del sito (esclusa la home che si trova nel file 'index.php').
Il file config.php contiene i dati di configurazione del database e l'api key del sito coinmarket cap.

### Primi Passi: 

Per prima cosa ho creato i due FORMS di Login e Registrazione ed ho creato le query (nei file php) per l'inserimento e la verifica di dati.

### Home: 

La struttura della Home è molto semplice, dall'Header possiamo navigare nel sito e fare il login o registrarsi mentre nel Content ho pensato fosse una buona idea quella di mostrare a schermo una lista (in ordine di importanza) le prime 100 criptovalute ottenute tramite una chiamata api al sito coinmarketcap.
Mi sono inspirato ad esso anche per l'aspetto grafico della tabella.

### Wallet

Il Wallet (Accessibile solo se Loggati) è il vero 'cuore' del sito,
infatti ogni utente può aggiungere criptovalute a proprio piacimento inserendo i dati riguardanti il nome della criptovaluta , la quantità di investimento  e il prezzo di acquisto. Ogni investimento avrà il suo spazio dedicato con tutte le informazioni e alla fine della pagina c'è un resoconto totale.

### Conclusioni

Sono molto soddisfatto del risultato ottenuto anche se ci sono 2 cose che mi prometto di risolvere: 
* La valuta di default è il dollaro, che per me è perfetto, ma per un utente che utilizza l'euro dovrei aggiungere un opzione che switcha la fiat a discrezione dell'utente.
* Le chiamate API sono limitate avendo richiesto il piano gratuito, quindi ogni giorno c'è un limite massimo di chiamate che posso fare al sito coinmarketcap, ma per lo scopo che ha adesso mi basta questo.
