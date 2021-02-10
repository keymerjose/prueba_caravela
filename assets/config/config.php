<?php
define("TEST", FALSE);
define("CANTIDAD_MOSTRAR", 10);
if(TEST){
    define("URL_BASE", "$_SERVER[DOCUMENT_ROOT]/prueba_caravela/");
    define("URL_BASE_IMG", "$_SERVER[DOCUMENT_ROOT]/prueba_caravela/assets/images");
    define("HOST", "localhost");
    define("PORT", "5432");
    define("USERNAME", "postgres");
    define("PASSWORD", "");
    define("DB", "prueba_caravela");
}else{
    define("URL_BASE", "$_SERVER[DOCUMENT_ROOT]/prueba_caravela/");
    define("URL_BASE_IMG", "$_SERVER[DOCUMENT_ROOT]/assets/images");
    define("HOST", "localhost");
    define("PORT", "5432");
    define("USERNAME", "keymer_prueba");
    define("PASSWORD", "123456");
    define("DB", "prueba_caravela");
}
?>