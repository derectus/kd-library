<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();

        $cities = [
            ['name' => 'Adana'],
            ['name' => 'Adıyaman'],
            ['name' => 'Afyonkarahisar'],
            ['name' => 'Ağrı'],
            ['name' => 'Amasya'],
            ['name' => 'Ankara'],
            ['name' => 'Antalya'],
            ['name' => 'Artvin'],
            ['name' => 'Aydın'],
            ['name' => 'Balıkesir'],
            ['name' => 'Bilecik'],
            ['name' => 'Bingöl'],
            ['name' => 'Bitlis'],
            ['name' => 'Bolu'],
            ['name' => 'Burdur'],
            ['name' => 'Bursa'],
            ['name' => 'Çanakkale'],
            ['name' => 'Çankırı'],
            ['name' => 'Çorum'],
            ['name' => 'Denizli'],
            ['name' => 'Diyarbakır'],
            ['name' => 'Edirne'],
            ['name' => 'Elazığ'],
            ['name' => 'Erzincan'],
            ['name' => 'Erzurum'],
            ['name' => 'Eskişehir'],
            ['name' => 'Gaziantep'],
            ['name' => 'Giresun'],
            ['name' => 'Gümüşhane'],
            ['name' => 'Hakkari'],
            ['name' => 'Hatay'],
            ['name' => 'Isparta'],
            ['name' => 'Mersin'],
            ['name' => 'İstanbul'],
            ['name' => 'İzmir'],
            ['name' => 'Kars'],
            ['name' => 'Kastamonu'],
            ['name' => 'Kayseri'],
            ['name' => 'Kırklareli'],
            ['name' => 'Kırşehir'],
            ['name' => 'Kocaeli'],
            ['name' => 'Konya'],
            ['name' => 'Kütahya'],
            ['name' => 'Malatya'],
            ['name' => 'Manisa'],
            ['name' => 'Kahramanmaraş'],
            ['name' => 'Mardin'],
            ['name' => 'Muğla'],
            ['name' => 'Muş'],
            ['name' => 'Nevşehir'],
            ['name' => 'Niğde'],
            ['name' => 'Ordu'],
            ['name' => 'Rize'],
            ['name' => 'Sakarya'],
            ['name' => 'Samsun'],
            ['name' => 'Siirt'],
            ['name' => 'Sinop'],
            ['name' => 'Sivas'],
            ['name' => 'Tekirdağ'],
            ['name' => 'Tokat'],
            ['name' => 'Trabzon'],
            ['name' => 'Tunceli'],
            ['name' => 'Şanlıurfa'],
            ['name' => 'Uşak'],
            ['name' => 'Van'],
            ['name' => 'Yozgat'],
            ['name' => 'Zonguldak'],
            ['name' => 'Aksaray'],
            ['name' => 'Bayburt'],
            ['name' => 'Karaman'],
            ['name' => 'Kırıkkale'],
            ['name' => 'Batman'],
            ['name' => 'Şırnak'],
            ['name' => 'Bartın'],
            ['name' => 'Ardahan'],
            ['name' => 'Iğdır'],
            ['name' => 'Yalova'],
            ['name' => 'Karabük'],
            ['name' => 'Kilis'],
            ['name' => 'Osmaniye'],
            ['name' => 'Düzce'],
            ['name' => 'Merkez Kütüphane']
        ];

        City::insert($cities);
    }
}
