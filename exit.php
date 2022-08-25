<?php

    //oluşturduğumuz tüm sessionları sildik
    session_start();
    session_destroy();
    setcookie("kullanici","",time()-1);
    // ve kullanıcı paneline yönlendirdik
    echo "<script> window.location.href='giris.php'; </script>";
?>