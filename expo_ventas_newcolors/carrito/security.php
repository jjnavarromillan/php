<?php 
function email($valor, $nombre) {
   $valido = "/^\([1-9][0-9]{2}\)[1-9][0-9]{3}-[0-9]{4}/i;
   if(preg_match($valido,$valor) != 1 ) {
      return 'El valor del campo '.$nombre.' es incorrecto';
   }
   return true;
 }
 function nosql($var){
   $var=mysql_escape_string($var);
   $sen=array("SCRIPT"," AND ", "+" ,"SELECT", "UPDATE", "INSERT", "DELETE", "<>", "*","DROP","WHERE","\'"," OR ","ALERT");
   $cache=str_replace($sen,"",strtoupper($var),$num);
   if($num>0){
      return false;
   }
   return true;
}
 
function seg($var,$min,$max){
   $var=mysql_escape_string($var);
   if(is_null($var)){
      return false;
   }elseif(strlen($var)< $min){
      return false;
   }elseif(strlen($var)>$max){
      return false;
   }
   return nosql($var);
}
?>