<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        /**
         * Black Coffee Theme (Default Value)
         */
        $black_coffee_default = [
            'intro' => [
                'title' => 'PADUAN SEMPURNA ENAKNYA NGOPI FRESCO',
                'desc' => 'Fresco hadir dengan perpaduan sempurna dari biji kopi Arabica & Robusta pilihan terbaik yang siap menjadi kopi andalan dengan aroma yang harum dan cita rasa yang nikmat dalam setiap kemasan Kopi Fresco. <br /><br /> #EnaknyaNgopiFresco yang nikmat disajikan panas kapanpun dan dimanapun siap menyegarkan harimu.',
                'image' => ''
            ],
            'video' => [
                'url' => 'XPspg1WM2zM',
                'desc' => 'Kopi FresCo bangga berkolaborasi dengan PSSI untuk mendukung para pemain sepak bola Indonesia dan pengembangan olahraga. Melalui kemitraan ini, Kami berkomitmen untuk memajukan prestasi sepak bola nasional dan menyemangati semangat juang atlet-atlet Indonesia. Kopi FresCo, menyertai setiap langkah menuju kejayaan.',
                'collab' => ''
            ],
            'description' => [
                [
                    'black_desc_position' => 'left',
                    'black_desc_title' => 'BIJI KOPI PILIHAN TERBAIK',
                    'black_desc_explanation' => 'Terbuat dari biji kopi arabica dan robusta terbaik yang diolah langsung setelah dipetik, sehingga menghasilkan Kopi Fresco yang harum dan rasa yang nikmat.',
                    'black_desc_image' => ''
                ],
                [
                    'black_desc_position' => 'right',
                    'black_desc_title' => 'AROMA YANG HARUM DAN CITA RASA YANG NIKMAT',
                    'black_desc_explanation' => 'Perpaduan sempurna Kopi Fresco dalam setiap kemasan menghadirkan aroma yang harum dan cita rasa yang nikmat di setiap harimu.',
                    'black_desc_image' => ''
                ],
                [
                    'black_desc_position' => 'left',
                    'black_desc_title' => 'KOPI PILIHAN KITA SEMUA',
                    'black_desc_explanation' => 'Aroma yang harum dan cita rasa yang nikmat menjadikan Kopi Fresco menjadi kopi pilihan kita semua. Kini giliranmu yang mencobanya.',
                    'black_desc_image' => ''
                ]
            ]
        ];

        /**
         * Cappuccino Coffee Theme (Default Value)
         */
        $cappuccino_coffee_default = [
            'intro' => [
                'title' => 'ENAKNYA NGOPI FRESCO, ENAKIN TIAP MOMEN',
                'desc' => 'Enakin tiap momen dengan #EnaknyaNgopiFresco. Mau panas mau dingin, Fresco Cappuccino enak dinikmati kapan aja dan dimana aja. <br /><br /> Kombinasi sempurna dari biji kopi pilihan, jadikan tiap momen bersama temen-temen lo jadi lebih asik, lebih seru dan PERFECTO !',
                'image' => ''
            ],
            'video' => [
                'url' => 'QXYyFCfruRg',
                'desc' => 'Kopi FresCo berkolaborasi dengan Tenue de Attire untuk mendukung para pengrajin kemeja lokal di Indonesia. Melalui kemitraan ini, kami berupaya memberikan dukungan kepada para perajin pakaian dalam negeri, mempromosikan keindahan dan kualitas produk lokal. Kopi FresCo, turut mendukung pertumbuhan industri kreatif Indonesia.',
                'collab' => '',
            ],
            'description' => [
                [
                    'cappuccino_desc_position' => 'left',
                    'cappuccino_desc_title' => 'BIJI KOPI PILIHAN TERBAIK',
                    'cappuccino_desc_explanation' => 'Terbuat dari biji kopi arabica dan robusta terbaik yang diolah langsung setelah dipetik, sehingga menghasilkan Kopi Fresco yang harum dan rasa yang nikmat.',
                    'cappuccino_desc_image' => ''
                ],
                [
                    'cappuccino_desc_position' => 'right',
                    'cappuccino_desc_title' => 'AROMA YANG HARUM DAN CITA RASA YANG NIKMAT',
                    'cappuccino_desc_explanation' => 'Perpaduan sempurna Kopi Fresco dalam setiap kemasan menghadirkan aroma yang harum dan cita rasa yang nikmat di setiap harimu.',
                    'cappuccino_desc_image' => ''
                ],
                [
                    'cappuccino_desc_position' => 'left',
                    'cappuccino_desc_title' => 'ENAKNYA KEBERSAMAAN ENAKNYA NGOPI FRESCO',
                    'cappuccino_desc_explanation' => 'Perpaduan sempurna yang strong kopinya, lembut foamnya dan crunchy choco granule-nya Kopi Fresco akan selalu enakin tiap momen kebersamaan lo! #EnaknyaNgopiFresco',
                    'cappuccino_desc_image' => ''
                ]
            ]
        ];

        /**
         * Introduction Section
         */
        $this->migrator->add('general.black_intro_title', $black_coffee_default['intro']['title']);
        $this->migrator->add('general.black_intro_desc', $black_coffee_default['intro']['desc']);
        $this->migrator->add('general.black_intro_image', $black_coffee_default['intro']['image']);
        $this->migrator->add('general.cappuccino_intro_title', $cappuccino_coffee_default['intro']['title']);
        $this->migrator->add('general.cappuccino_intro_desc', $cappuccino_coffee_default['intro']['desc']);
        $this->migrator->add('general.cappuccino_intro_image', $cappuccino_coffee_default['intro']['image']);

        /**
         * Video & Collaboration Section
         */
        $this->migrator->add('general.black_video_url', $black_coffee_default['video']['url']);
        $this->migrator->add('general.black_video_collab', $black_coffee_default['video']['collab']);
        $this->migrator->add('general.black_video_desc', $black_coffee_default['video']['desc']);
        $this->migrator->add('general.cappuccino_video_url', $cappuccino_coffee_default['video']['url']);
        $this->migrator->add('general.cappuccino_video_collab', $cappuccino_coffee_default['video']['collab']);
        $this->migrator->add('general.cappuccino_video_desc', $cappuccino_coffee_default['video']['desc']);

        /**
         * Description Section
         */
        $this->migrator->add('general.black_desc_list', $black_coffee_default['description']);
        $this->migrator->add('general.cappuccino_desc_list', $cappuccino_coffee_default['description']);

        /**
         * Marketplace
         */
        $this->migrator->add('general.tokopedia_store', 'https://www.tokopedia.com/kapalapistore/etalase/fresco');
        $this->migrator->add('general.shopee_store', 'https://shopee.co.id/mall/search?keyword=fresco&shop=24114453');
        $this->migrator->add('general.lazada_store', 'https://www.lazada.co.id/kapal-api-store/?q=All-Products&shop_category_ids=1363364&from=wangpu&sc=KVUG&spm=a2o4j.8553159.cutImages_2346226926.1');
        $this->migrator->add('general.kapalapi_store', 'https://www.kapalapistore.com/brand/fresco');

        /**
         * Social Media Link
         */
        $this->migrator->add('general.facebook_link', 'https://www.facebook.com/kopifresco.id');
        $this->migrator->add('general.instagram_link', 'https://www.instagram.com/kopifresco.id');
        $this->migrator->add('general.x_link', '#');
        $this->migrator->add('general.tiktok_link', 'https://www.tiktok.com/@kopifresco.id');
        $this->migrator->add('general.youtube_link', 'https://www.youtube.com/@kopifresco934');
        $this->migrator->add('general.email_link', 'santos@kapalapi.co.id');
        $this->migrator->add('general.phone_link', '0800-1-726867');
        $this->migrator->add('general.whatsapp_link', '08111 726 867');
        $this->migrator->add('general.line_link', '@halosantos');
    }
};
