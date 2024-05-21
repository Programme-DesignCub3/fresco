<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Black Coffee Theme (Default Value)
        $black_coffee_default = [
            'description' => [
                [
                    'black_desc_position' => 'left',
                    'black_desc_title' => 'BIJI KOPI PILIHAN TERBAIK',
                    'black_desc_explanation' => 'Terbuat dari biji kopi arabica dan robusta terbaik yang diolah langsung setelah dipetik, sehingga menghasilkan Kopi Fresco yang harum dan rasa yang nikmat.',
                    'black_desc_image_id' => '',
                    'black_desc_image' => ''
                ],
                [
                    'black_desc_position' => 'right',
                    'black_desc_title' => 'AROMA YANG HARUM DAN CITA RASA YANG NIKMAT',
                    'black_desc_explanation' => 'Perpaduan sempurna Kopi Fresco dalam setiap kemasan menghadirkan aroma yang harum dan cita rasa yang nikmat di setiap harimu.',
                    'black_desc_image_id' => '',
                    'black_desc_image' => ''
                ],
                [
                    'black_desc_position' => 'left',
                    'black_desc_title' => 'KOPI PILIHAN KITA SEMUA',
                    'black_desc_explanation' => 'Aroma yang harum dan cita rasa yang nikmat menjadikan Kopi Fresco menjadi kopi pilihan kita semua. Kini giliranmu yang mencobanya.',
                    'black_desc_image_id' => '',
                    'black_desc_image' => ''
                ]
            ]
        ];

        // Cappuccino Coffee Theme (Default Value)
        $cappuccino_coffee_default = [
            'description' => [
                [
                    'cappuccino_desc_position' => 'left',
                    'cappuccino_desc_title' => 'BIJI KOPI PILIHAN TERBAIK',
                    'cappuccino_desc_explanation' => 'Terbuat dari biji kopi arabica dan robusta terbaik yang diolah langsung setelah dipetik, sehingga menghasilkan Kopi Fresco yang harum dan rasa yang nikmat.',
                    'cappuccino_desc_image_id' => '',
                    'cappuccino_desc_image' => ''
                ],
                [
                    'cappuccino_desc_position' => 'right',
                    'cappuccino_desc_title' => 'AROMA YANG HARUM DAN CITA RASA YANG NIKMAT',
                    'cappuccino_desc_explanation' => 'Perpaduan sempurna Kopi Fresco dalam setiap kemasan menghadirkan aroma yang harum dan cita rasa yang nikmat di setiap harimu.',
                    'cappuccino_desc_image_id' => '',
                    'cappuccino_desc_image' => ''
                ],
                [
                    'cappuccino_desc_position' => 'left',
                    'cappuccino_desc_title' => 'ENAKNYA KEBERSAMAAN ENAKNYA NGOPI FRESCO',
                    'cappuccino_desc_explanation' => 'Perpaduan sempurna yang strong kopinya, lembut foamnya dan crunchy choco granule-nya Kopi Fresco akan selalu enakin tiap momen kebersamaan lo! #EnaknyaNgopiFresco',
                    'cappuccino_desc_image_id' => '',
                    'cappuccino_desc_image' => ''
                ]
            ]
        ];

        // Description Section
        $this->migrator->add('general.black_desc_list', $black_coffee_default['description']);
        $this->migrator->add('general.cappuccino_desc_list', $cappuccino_coffee_default['description']);

        // Marketplace Link
        $this->migrator->add('general.tokopedia_store', 'https://www.tokopedia.com/kapalapistore/etalase/fresco');
        $this->migrator->add('general.shopee_store', 'https://shopee.co.id/mall/search?keyword=fresco&shop=24114453');
        $this->migrator->add('general.lazada_store', 'https://www.lazada.co.id/kapal-api-store/?q=All-Products&shop_category_ids=1363364&from=wangpu&sc=KVUG&spm=a2o4j.8553159.cutImages_2346226926.1');
        $this->migrator->add('general.kapalapi_store', 'https://www.kapalapistore.com/brand/fresco');

        // Social Media Link
        $this->migrator->add('general.facebook_alias', 'Kopi Fresco');
        $this->migrator->add('general.facebook_link', 'https://www.facebook.com/kopifresco.id');

        $this->migrator->add('general.instagram_alias', 'kopifresco.id');
        $this->migrator->add('general.instagram_link', 'https://www.instagram.com/kopifresco.id');

        $this->migrator->add('general.x_alias', '#');
        $this->migrator->add('general.x_link', '#');

        $this->migrator->add('general.tiktok_alias', '@kopifresco.id');
        $this->migrator->add('general.tiktok_link', 'https://www.tiktok.com/@kopifresco.id');

        $this->migrator->add('general.youtube_alias', 'Kopi Fresco');
        $this->migrator->add('general.youtube_link', 'https://www.youtube.com/@kopifresco934');

        $this->migrator->add('general.email_alias', 'santos@kapalapi.co.id');
        $this->migrator->add('general.email_link', 'santos@kapalapi.co.id');

        $this->migrator->add('general.phone_alias', '0800-1-726867');
        $this->migrator->add('general.phone_link', '08001726867');

        $this->migrator->add('general.whatsapp_alias', '08111 726 867');
        $this->migrator->add('general.whatsapp_link', 'https://wa.me/628111726867');

        $this->migrator->add('general.line_alias', '@halosantos');
        $this->migrator->add('general.line_link', '@halosantos');
    }
};
