<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 14.9.2015
 * Time: 03:20
 */

namespace Whole\Core\Commands;

use Illuminate\Console\Command;

class AnalyticsCommand extends Command
{
    protected $name = 'whole:analytics';
    protected $description = 'Whole CMS Analytics Configuration';

    public function handle()
    {

        $this->info("Devam Etmeden Once Sitenizi Google Analytics'e eklemeniz ve ANALYTICS SITE ID, ANALYTICS CLIENT ID, ANALYTICS SERVICE EMAIL Anahtarlari olmasi gerekmektedir.");
        $isOK = $this->confirm('Anahtarlara Sahipmisiniz? (Degilseniz nasil alacaginiz hakkında bilgi verecegim)',false);
        if (!$isOK)
        {
            $this->info("Simdi size nasıl ANALYTICS SITE ID, ANALYTICS CLIENT ID, ANALYTICS SERVICE EMAIL anahtarlarini alacaginizi anlatacaim.

            ");
            $this->info("ANALYTICS SITE ID Anahtari icin: Google analytics'e sitenizi kaydetmeniz ve Google Analyticsden web sitenizi sectikten sonra yonetici sekmesini gelin Hesap | Mulk | Gorunum Sekmesinden Gorum sekmesindeki Ayarlari Goruntuleye tiklayin oradan Gorunum Kimligi yazan kisim ANALYTICS SITE ID deyerinizdir konsol ekrandan bu degeri giris yaparken ga:xxxxxxxx turunde giris yapmalisiniz.

            ");
            $this->info("ANALYTICS CLIENT ID Anahtari icin: https://console.developers.google.com adresine gidin. Menuden APIs & auth'in altindaki Credentials'a tiklatin. Acilan sayfadan  Add Credentials altindaki Service Account'u secin acilan sayfada Key tipi olarak P12 yi secerek keyinizi olsturun. Key olustukdan sonra bir dosya indirmek isteyecek bu indirdiginiz dosyayi storage dizini altinda yoksa laravel-analytics diye bir dosya olusturarak bu dosya altina yukleyiniz. Credentials sayfasindaki olusturmus oldugunuz Service accounts'u seciniz, Acilan sayfada Client ID yazan anahtar degeri ANALYTICS CLIENT ID degerinizdir.  Email address yazan anahtar degeri ANALYTICS SERVICE EMAIL degerinizdir.

            ");
            $this->info("Son Olarak storage dizini altindaki laravel-analytics dizinine atmis oldugunuz .p12 uzantili dosyanin uzantisiyla birlekte tam adini CERTIFICATE PATH deyerine yazmalisiniz.

            ");

            $this->info("Yukaridaki islemleri yapip anahtarlara sahipseniz devam edebiliriz.");
            return false;
        }

        $siteId = $this->ask("ANALYTICS SITE ID Degeriniz (Orn:ga:xxxxxxxx)");
        $this->edit_key('ANALYTICS_SITE_ID',$siteId);
        $this->info("ANALYTICS SITE ID Basariyla Eklendi.");

        $clientId = $this->ask("ANALYTICS CLIENT ID Degeriniz (Orn:xxxxxxxxxxxx-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx.apps.googleusercontent.com)");
        $this->edit_key('ANALYTICS_CLIENT_ID',$clientId);
        $this->info("ANALYTICS CLIENT ID Basariyla Eklendi.");

        $serviceEmail = $this->ask("ANALYTICS SERVICE EMAIL Degeriniz (Orn:xxxxxxxxxxxx-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx@developer.gserviceaccount.com)");
        $this->edit_key('ANALYTICS_SERVICE_EMAIL',$serviceEmail);
        $this->info("ANALYTICS SERVICE EMAIL Basariyla Eklendi.");

        $this->info('ANALYTICS CERTIFICATE PATH indirdiginiz p12 uzantili dosyanin tam adidir bu dosyayi storage dizi altinda laravel-analytics dizini icerisine yuklemeyi unutmayiniz!');
        $certificatePath = $this->ask("ANALYTICS CERTIFICATE PATH Degeriniz (Orn:xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-privatekey.p12)");
        $this->edit_key('ANALYTICS_CERTIFICATE_PATH',$certificatePath);
        $this->info("ANALYTICS CERTIFICATE PATH Basariyla Eklendi.");


    }

    public function edit_key($type,$value)
    {
      $path = base_path('.env');
      if (file_exists($path)) {
          file_put_contents($path, str_replace(
              $type.'=', $type.'='.$value, file_get_contents($path)
          ));
      }
    }
}
