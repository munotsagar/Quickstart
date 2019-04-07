<?php
//Headings
$_['heading_title']                 = 'Accedi e paga con Amazon';

//Text
$_['text_success']                  = 'Modulo accedi e paga con Amazon aggiornato correttamente';
$_['text_ipn_url']					= 'Indirizzo Web del Cron Job';
$_['text_ipn_token']				= 'Chiave segreta';
$_['text_us']						= 'USA';
$_['text_germany']                  = 'Germania';
$_['text_uk']                       = 'Regno Unito';
$_['text_live']                     = 'Reale';
$_['text_sandbox']                  = 'Sandbox';
$_['text_auth']						= 'Autorizzazione';
$_['text_payment']                  = 'Pagamento';
$_['text_no_capture']               = '--- Nessun rilevamento automatico ---';
$_['text_all_geo_zones']            = 'Tutte le zone geografiche';
$_['text_button_settings']          = 'Impostazioni pulsante di pagamento';
$_['text_colour']                   = 'Colore';
$_['text_orange']                   = 'Arancione';
$_['text_tan']                      = 'Marrone chiaro';
$_['text_white']                    = 'Bianco';
$_['text_light']                    = 'Chiaro';
$_['text_dark']                     = 'Scuro';
$_['text_size']                     = 'Grandezza';
$_['text_medium']                   = 'Media';
$_['text_large']                    = 'Grande';
$_['text_x_large']                  = 'Molto grande';
$_['text_background']               = 'Sfondo';
$_['text_amazon_login_pay']         = '<a href="http://go.amazonservices.com/opencart.html" target="_blank" title="Sign-up to Login and Pay with Amazon"><img src="view/image/payment/amazon.png" alt="Login and Pay with Amazon" title="Login and Pay with Amazon" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_amazon_join']              = '<a href="http://go.amazonservices.com/opencart.html" target="_blank" title="Sign-up to Login and Pay with Amazon"><u>Sign-up to Login and Pay with Amazon</u></a>';
$_['entry_login_pay_test']          = 'Modalit&agrave; di prova';
$_['entry_login_pay_mode']          = 'Modalit&agrave; di pagamento';
$_['text_payment_info']				= 'Informazioni di pagamento';
$_['text_capture_ok']				= 'Pagamento riuscito';
$_['text_capture_ok_order']			= 'Pagamento riuscito, autorizzazione ottenuta completamente';
$_['text_refund_ok']				= 'Rimborso richiesto correttamente';
$_['text_refund_ok_order']			= 'Rimborso richiesto correttamente, importo completamente restituito';
$_['text_cancel_ok']				= 'Ordine cancellato correttamente, stato ordine modificato in cancellato';
$_['text_capture_status']			= 'Pagamento ricevuto';
$_['text_cancel_status']			= 'Pagamento cancellato';
$_['text_refund_status']			= 'Pagamento rimborsato';
$_['text_order_ref']				= 'Riferimento ordine';
$_['text_order_total']				= 'Totale autorizzato';
$_['text_total_captured']			= 'Totale acquisito';
$_['text_transactions']				= 'Transazioni';
$_['text_column_authorization_id']	= 'ID autorizzazione Amazon';
$_['text_column_capture_id']		= 'ID acquisizione Amazon';
$_['text_column_refund_id']			= 'ID rimborso Amazon';
$_['text_column_amount']			= 'Importo';
$_['text_column_type']				= 'Tipo';
$_['text_column_status']			= 'Stato';
$_['text_column_date_added']		= 'Data operazione';
$_['text_confirm_cancel']			= 'Sei sicuro di volere cancellare il pagamento?';
$_['text_confirm_capture']			= 'Sei sicuro di volere accettare il pagamento?';
$_['text_confirm_refund']			= 'Sei sicuro di volere rimborsare il pagamento?';
$_['text_minimum_total']            = 'Totale ordine minimo';
$_['text_geo_zone']                 = 'Zona geografica';
$_['text_status']                   = 'Stato';
$_['text_declined_codes']           = 'Codici rifiuto';
$_['text_sort_order']               = 'Ordinamento';
$_['text_amazon_invalid']           = 'Metodo di pagamento non valido';
$_['text_amazon_rejected']          = 'Respinto da Amazon';
$_['text_amazon_timeout']           = 'Transazione scaduta';
$_['text_amazon_no_declined']       = '--- Nessuna autorizzazione respinta in automatico ---';

// Columns
$_['column_status']                 = 'Stato';

//entry
$_['entry_merchant_id']             = 'ID venditore';
$_['entry_access_key']              = 'Chiave di accesso';
$_['entry_access_secret']           = 'Chiave segreta';
$_['entry_client_id']               = 'ID cliente';
$_['entry_client_secret']           = 'Cliente nascosto';
$_['entry_marketplace']             = 'Sito di vendita';
$_['entry_capture_status']          = 'Stato acquisizione automatica';
$_['entry_pending_status']          = 'Stato ordine sospeso';
$_['entry_ipn_url']					= 'Indirizzo Web dell\'IPN';
$_['entry_ipn_token']				= 'Chiave segreta';
$_['entry_debug']					= 'Analisi log di sistema';


// Help
$_['help_pay_mode']					= 'Pagamento disponibile solo per il sito di vendita in USA';
$_['help_capture_status']			= 'Scegli lo stato dell\'ordine che provoca l\'accettazione automatica di un pagamento autorizzato';
$_['help_ipn_url']					= 'Impostalo come indirizzo Web di venditore in Amazon Seller Central';
$_['help_ipn_token']				= 'Sceglila lunga e difficile da indovinare';
$_['help_debug']					= 'Enabling debug will write sensitive data to a log file. You should always disable unless instructed otherwise';
$_['help_declined_codes']			= 'This is for testing purposes only';

// Order Info
$_['tab_order_adjustment']          = 'Adeguamento ordine';

// Errors
$_['error_permission']              = 'Non sei autorizzato a modificare questo modulo';
$_['error_merchant_id']			    = 'ID Venditore mancante';
$_['error_access_key']			    = 'Chiave di accesso mancante';
$_['error_access_secret']		    = 'Chiave segreta mancante';
$_['error_client_id']			    = 'ID cliente mancante';
$_['error_client_secret']			= 'Chiave cliente mancante';
$_['error_pay_mode']				= 'Pagamento disponibile solo per il sito di vendita in USA';
$_['error_curreny']                 = 'Il tuo negozio deve avere la valuta %s installata ed attivata';
$_['error_upload']                  = 'Caricamento fallito';
$_['error_data_missing'] 			= 'I dati richiesti sono mancanti';

// Buttons
$_['button_capture']				= 'Accetta';
$_['button_refund']					= 'Rimborsa';
$_['button_cancel']					= 'Cancella';
?>