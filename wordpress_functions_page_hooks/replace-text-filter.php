/ ==== Function Start ==== /

add_filter('gettext', 'translate_reply110');
add_filter('ngettext', 'translate_reply110');

function translate_reply110($translated) {
$translated = str_ireplace('Mail ORDERING', 'Posta Kodu', $translated);
return $translated; 
}

/ ==== Function END ==== /
ibaadurrehmanDev 
1b@@durRe4man