#WholeCMS 

Laravel için hazýrlanmýþ içerik yönetim sistemi.

Sýnýrsýzca geniþletebileceðiniz baðýmlýlýklarý olmadan oluþturacaðýnýz modüllerinizi dahil edip içerik yönetim sisteminden daha fazlasýný elde edebilirsiniz. Ýstediðiniz temaya entegre ederek kolayca kullanabileceðiniz bir sistem.

Oluþturduðunuz içeriklerinizi sürükle býrak ile temanýzýn alanlarýna ekleyerek sayfalarýnýzý inþa edebilirsiniz. 

**Sýnýrlar baðýmlýlýklar yok!**

Birden fazla temayý tek bir sitede kullanma imkaný sunarak istediðiniz sayfada istediðiniz temayý kullanabilirsiniz.

##Kurulum

laravel kurulumu yaptýktan sonra

`composer require whole/core`

Komutunu çalýþtýrarak CMS Paketini kurabilirsiniz.

config dizini altýnda app.php dosyasýnda providers alanýna

`Whole\Core\CoreServiceProvider::class`

Satýrýný Ekledikten Sonra Komut Satýrýnda;

`php artisan whole:install`

Komutunu Çalýþtýrarak Kuruluma Geçebilirsiniz. 
(Kuruluma Geçmeden önce veritabaný yapýlandýrmasýný yaparak .env dosyasýndaki veri tabaný ile ilgili gerekli deðiþiklikleri yaptýðýnýza emin olun)

**Örnek Tema için Example Template Ýndirin**

Yönetim paneline giriþ yaptýktan sonra Eklentiler > Þablon Yöneticisinden Þablonu Yükleyin ve Genel Yapýlandýrma Ayarlarýndan Eklemiþ Olduðunuz Þablonu Seçin.

##Yardýmlar
* **Kurulum [Video](https://youtu.be/Mr3mkBt28IQ)**
* **Yönetim Paneli Hakkýnda Arayüz ve Örnek Uygulama [Video](https://www.youtube.com/watch?v=K7knWnjwWE0)**
* **Nasýl Tema Oluþtururum? [Video](https://youtu.be/fXrqFIrBox0)**
* **Nasýl Modül Oluþtururum?**

##Ekran Görüntüleri

![Login Sayfasý](http://wholecms.furkancelik.com.tr/whole_picture/login.png)


  
![Yonetim Paneli Anasayfasý](http://wholecms.furkancelik.com.tr/whole_picture/index.png)

  

![Yeni Ýçerik Ekleme Sayfasý](http://wholecms.furkancelik.com.tr/whole_picture/content.png)

  

![Blok Detaylarý](http://wholecms.furkancelik.com.tr/whole_picture/blocks_details.png)

  

![Master Page Ayarý](http://wholecms.furkancelik.com.tr/whole_picture/master_page.png)
  


![Giriþ Loglarý Sayfasý](http://wholecms.furkancelik.com.tr/whole_picture/login_log.png)