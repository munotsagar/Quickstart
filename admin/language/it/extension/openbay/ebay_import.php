<?php
//Traduzione a cura di UltraWeb - ultra3w@gmail.com
// Heading
$_['heading_title']                     = 'Importazione articolo';
$_['text_openbay']                      = 'OpenBay Pro';
$_['text_ebay']                         = 'eBay';

// Text
$_['text_sync_import_line1']            = '<strong>Attenzione!</strong> Saranno importati tutti i prodotti eBay e verr&agrave; creata una nuova categoria nel Negozio. Si consiglia di eliminare tutte le categorie ed i prodotti prima di eseguire questa operazione. <br />La struttura delle categorie sar&agrave; uguale a quella di eBay, che &egrave; diversa dalla struttura del negozio (se hai un negozio eBay). Sarai in grado comunque di rinominare, rimuovere e modificare le categorie importate senza modificare i prodotti su eBay.';
$_['text_sync_import_line3']            = 'Accertati che il tuo server possa accettare e processare file di grosse dimensioni. Ad esempio 1000 articoli eBay pesano circa 40 Mb, di conseguenza dovrai valutare in base alle tue esigenze. Se la tua richiesta fallisce probabilmente sar&agrave; dovuto ad un valore troppo basso impostato nel server. Il limite richiesto di memoria PHP dovrebbe essere di circa 128 Mb.';
$_['text_sync_server_size']             = 'Attualmente il tuo server pu&ograve; accettare: ';
$_['text_sync_memory_size']             = 'Limite di memoria PHP: ';
$_['text_import_confirm']				= 'Saranno importati tutti gli articoli da eBay come nuovi prodotti, sei sicuro? Questa operazione NON PU&Ograve; essere annullata! ASSICURATI prima di avere effettuato una copia di sicurezza!';
$_['text_import_notify']				= 'La richiesta &egrave; stata inviata. I tempi di importazione sono pari a circa 1 ora per ogni 1000 articoli.';
$_['text_import_images_msg1']           = 'immagini in attesa da eBay (per importazione/copia). images are pending import/copy from eBay. Prova a ricaricare la pagina, se il numero non decresce allora';
$_['text_import_images_msg2']           = 'clicca qui';
$_['text_import_images_msg3']           = 'e aspetta. Puoi trovare maggiori informazioni sul motivo di questo comportamento visitando la pagina <a href="http://shop.openbaypro.com/index.php?route=information/faq&topic=8_45" target="_blank">a questo indirizzo</a>';

// Entry
$_['entry_import_item_advanced']        = 'Ottieni dati avanzati';
$_['entry_import_categories']         	= 'Importa categorie';
$_['entry_import_description']			= 'Importa descrizioni articolo';
$_['entry_import']						= 'Importa articoli da eBay';

// Buttons
$_['button_import']						= 'Importa';
$_['button_complete']					= 'Completa';

// Help
$_['help_import_item_advanced']        	= 'Occorreranno tempi 10 volte pi&ugrave; lunghi per importare gli articoli. Saranno importati i pesi, le dimensioni, i codici ISBN e le altre informazioni disponibili';
$_['help_import_categories']         	= 'Realizza una struttura di categorie nel tuo Negozio a partire dalle categorie di eBay';
$_['help_import_description']         	= 'Verr&agrave; importato tutto incluso il codice HTML, i contatori delle visite ecc.';

// Error
$_['error_import']                   	= 'Caricamento fallito';
$_['error_maintenance']					= 'Il Negozio &egrave; in modalit&agrave; manutenzione. Impossibile effettuare operazioni di importazione!';
$_['error_ajax_load']					= 'Connessione al server fallita';
$_['error_validation']					= 'Ti devi registrare per ottenere il codice API e per abilitare il modulo.';
?>