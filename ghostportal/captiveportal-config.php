<?php

// Ghost Hot Spot v1
// Emeği Geçenler : Samet YILMAZ,Uğur Demir,Serhat Sabuncu, Serdar KURT


// MySQL Sunucu Bilgileri
// Aşağıdaki değişkenleri kendi database bilgilerinize göre düzenleyiniz

$kullaniciadi = "root"; // Veritabanı kullanıcı adınız
$sifre = "Cyberark1"; // Veritabanı kullanıcı şifreniz
$host = "localhost"; // Genelde "localhost"'tur. Eğer mysql sunucunuz başka bir yerdeyse onun IP/Hostname'ini giriniz.
$veritabani = "radius"; // varsayılan olarak "radius". veritabanına başka bir isim verdiysen değiştirmen gerekecek.


//MYSQL Bağlantısı
$baglan = mysqli_connect($host, $kullaniciadi, $sifre, $veritabani) or die("Veritabanı bağlantısı yapılamadı !");
mysqli_select_db($baglan, $veritabani) or die("Veritabanı bağlantısı yapılamadı !");
mysqli_query($baglan, "SET NAMES 'utf8'");


//SQL Injection için.

$inj = array('select', 'insert', 'delete', 'update', 'drop table', 'union', 'null', 'SELECT', 'INSERT', 'DELETE', 'UPDATE', 'DROP TABLE', 'UNION', 'NULL', 'order by', 'order  by');
for ($i = 0; $i < sizeof($_GET); ++$i) {
    for ($j = 0; $j < sizeof($inj); ++$j) {
        foreach ($_GET as $gets) {
            if (preg_match('/' . $inj[$j] . '/', $gets)) {
                $temp = key($_GET);
                $_GET[$temp] = '';
                exit('<iframe title="YouTube video player" width="800" height="600" src="http://www.youtube.com/embed/bzen6iORGIk" frameborder="0" allowfullscreen></iframe>');
                continue;
            }
        }
    }
}
?>