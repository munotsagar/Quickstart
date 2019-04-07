<?php
//Traduzione a cura di UltraWeb - ultra3w@gmail.com
// Text
$_['text_title']				= 'Fattura Klarna - Paga entro 14 giorni';
$_['text_terms_fee']			= '<span id="klarna_invoice_toc"></span> (+%s)<script type="text/javascript">var terms = new Klarna.Terms.Invoice({el: \'klarna_invoice_toc\', eid: \'%s\', country: \'%s\', charge: %s});</script>';
$_['text_terms_no_fee']			= '<span id="klarna_invoice_toc"></span><script type="text/javascript">var terms = new Klarna.Terms.Invoice({el: \'klarna_invoice_toc\', eid: \'%s\', country: \'%s\'});</script>';
$_['text_additional']			= 'Il conto Klarna necessita di alcune informazioni aggiuntive prima di poter elaborare l\'ordine.';
$_['text_male']					= 'Maschio';
$_['text_female']				= 'Femmina';
$_['text_year']					= 'Anno';
$_['text_month']				= 'Mese';
$_['text_day']					= 'Giorno';
$_['text_comment']				= 'ID fattura Klarna: %s. ' . "\n" . '%s/%s: %.4f';

// Entry
$_['entry_gender']				= 'Sesso';
$_['entry_pno']					= 'Numero personale';
$_['entry_dob']					= 'Data di nascita';
$_['entry_phone_no']			= 'Numero di telefono';
$_['entry_street']				= 'Indirizzo';
$_['entry_house_no']			= 'Numero civico.';
$_['entry_house_ext']			= 'Estensione numero civico.';
$_['entry_company']				= 'Numero di iscrizione al registro delle imprese';

// Help
$_['help_pno']					= 'Inserisci il tuo numero Social Security.';
$_['help_phone_no']				= 'Inserisci il tuo numero di telefono.';
$_['help_street']				= 'Si prega notare che in caso di pagamento con Klarna la consegna pu&ograve; avvenire soltanto presso l\'indirizzo registrato.';
$_['help_house_no']				= 'Inserisci il tuo numero civico.';
$_['help_house_ext']			= 'Inserisci l\'estensione. Per esempio: A, B, C, Red, Blue ecc.';
$_['help_company']				= 'Inserisci il numero di registrazione della tua ditta';

// Error
$_['error_deu_terms']			= 'Devi accettare la politica sulla privacy di Klarna (Datenschutz)';
$_['error_address_match']		= 'Se desideri utilizzare i pagamenti con Klarna l\'indirizzo di fatturazione e quello di spedizione devono coincidere';
$_['error_network']				= 'Si &egrave; verificato un errore di connessione a Klarna. Riprova pi&ugrave; tardi.';
?>