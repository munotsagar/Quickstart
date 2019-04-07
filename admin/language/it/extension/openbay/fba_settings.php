<?php
//Traduzione a cura di UltraWeb - ultra3w@gmail.com
// Heading
$_['heading_title']        		= 'Impostazioni';
$_['text_openbay']              = 'OpenBay Pro';
$_['text_fba']                  = 'Gestito da Amazon';

// Text
$_['text_success']     			= 'Impostazioni salvate correttamente';
$_['text_status']         		= 'Stato';
$_['text_account_ok']  			= 'Collegamento alla gestione di Amazon riuscito';
$_['text_api_ok']       		= 'Connessione API riuscita';
$_['text_api_status']           = 'Connessione API';
$_['text_edit']           		= 'Modifica impostazioni gestione di Amazon';
$_['text_standard']           	= 'Standard';
$_['text_expedited']           	= 'Veloce';
$_['text_priority']           	= 'Prioritario;';
$_['text_fillorkill']           = 'Tutto o niente';
$_['text_fillall']           	= 'Riempi tutto';
$_['text_fillallavailable']     = 'Riempi quanto disponibile';
$_['text_prefix_warning']     	= 'Non modificare questa impostazione se sono gi&agrave; stati effettuati ordini su Amazon, impostala alla prima installazione.';
$_['text_disabled_cancel']     	= 'Disabilitata - non cancella automaticamente le gestioni';
$_['text_validate_success']     = 'Dettagli API funzionano correttamente! Premi salva per salvare le impostazioni.';
$_['text_register_banner']      = 'Clicca qui per registrare un account';

// Entry
$_['entry_api_key']            	= 'Codice API';
$_['entry_account_id']          = 'ID account';
$_['entry_send_orders']         = 'Invia ordini automaticamente';
$_['entry_fulfill_policy']      = 'Regole logistica Amazon';
$_['entry_shipping_speed']      = 'Trasporto normale';
$_['entry_debug_log']           = 'Attiva registro errori';
$_['entry_new_order_status']    = 'Nuova attivazione';
$_['entry_order_id_prefix'] 	= 'Prefisso ID ordine';
$_['entry_only_fill_complete'] 	= 'Tutti gli articoli devono essere gestibili da Amazon';

// Help
$_['help_api_key']            	= 'Questo &egrave; il tuo codice API, lo puoi trovare nel tuo account di OpenBay Pro';
$_['help_account_id']           = 'Questo &egrave; il tuo ID account che corrisponde all\'account registrato su Amazon per OpenBay Pro, lo puoi trovare nel tuo account di OpenBay Pro';
$_['help_send_orders']  		= 'Gli ordini contenenti corrispondenze con articoli gestiti da Amazon saranno inviati direttamente ad Amazon';
$_['help_fulfill_policy']  		= 'Le regole predefinite di gestione (FillAll - Tutti gli articoli dell\'ordine sono gestiti e spediti. L\'ordine resta nello stato di elaborazione fino a quando tutti gli articoli vengono spediti da Amazon o quando l\'ordine viene cancellato dal venditore. FillAllAvailable - Tutti gli articoli sono stati spediti. Gli articoli non gestiti da Amazon vengono cancellati dall\'ordine. FillOrKill - Se prima della spedizione si determina che un articolo dell\'ordine non fa parte di quelli gestiti da Amazon l\'ordine passa allo stato di sospeso (iniziano le operazioni di inventario), in seguito l\'intero ordine viene considerato ingestibile. Comunque, se ci&ograve; avviene dopo la spedizione, Amazon canceller&agrave; quanti pi&ugrave; articoli possibile.)';
$_['help_shipping_speed']  		= 'Questa è la categoria predefinita da applicare ai nuovi ordini, altri tipi di servizio potrebbero comportare costi diversi';
$_['help_debug_log']  		    = 'Il registro memorizzer&agrave; in un file le informazioni relative alle azioni svolte dal modulo. Lasciandolo attivato si capiranno pi&ugrave; facilmente le cause dei problemi.';
$_['help_new_order_status']  	= 'Questo &egrave; lo stato dell\'ordine che avvier&agrave; la gestione di Amazon. Prima assicurati di ricevere il pagamento.';
$_['help_order_id_prefix']  	= 'Avere un prefisso ordine aiuter&agrave; ad identificare gli ordini ricevuti tramite il negozio e non da altre integrazioni. &Egrave; una soluzione molto utile quando si utilizzano pi&ugrave; canali di vendita e ci si affida alla gestione di Amazon.';
$_['help_only_fill_complete']  	= 'Gli ordini saranno inviati solo se TUTTI gli articoli corrispondono a quelli gestiti da Amazon. Se solo un articolo non corrisponde l\'ordine non sar&agrave; inviato.';

// Error
$_['error_api_connect']         = 'Connessione API fallita';
$_['error_account_info']    	= 'Impossibile verificare la connessione API alla gestione di Amazon';
$_['error_api_key']    			= 'Codice API non valido';
$_['error_api_account_id']    	= 'ID account non valido';
$_['error_validation']    		= 'Si sono verificati degli errori durante la verifica delle tue informazioni';

// Tabs
$_['tab_api_info']            	= 'Informazioni API';

// Buttons
$_['button_verify']            	= 'Verifica informazioni';
?>