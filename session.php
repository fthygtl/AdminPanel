<?php 
//Eğer giriş sessionin içinde şifrelenmiş bir şekilde var yazmıyor ise veya kullanıcı ismindeki cookinin içinde msb yazmıyorsa
//güvenlik kontrolünden geçemez ve bu sayfa açılmaz
if ($_SESSION["giris"] != sha1(md5("a")) || $_COOKIE["kullanici"] != "msb") {
    header("Location:cikis.php");
}
?>