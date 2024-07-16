<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Black Coffee Theme (Default Value)
        $black_coffee_default = [
            'intro' => [
                'title' => 'PADUAN SEMPURNA ENAKNYA NGOPI FRESCO',
                'desc' => 'Fresco hadir dengan perpaduan sempurna dari biji kopi Arabica & Robusta pilihan terbaik yang siap menjadi kopi andalan dengan aroma yang harum dan cita rasa yang nikmat dalam setiap kemasan Kopi Fresco. <br /><br /> #EnaknyaNgopiFresco yang nikmat disajikan panas kapanpun dan dimanapun siap menyegarkan harimu.',
                'image' => ''
            ],
            'video' => [
                'url' => 'https://www.youtube.com/watch?v=XPspg1WM2zM',
                'desc' => 'Kopi Fresco bangga berkolaborasi dengan PSSI untuk mendukung para pemain sepak bola Indonesia dan pengembangan olahraga. Melalui kemitraan ini, Kami berkomitmen untuk memajukan prestasi sepak bola nasional dan menyemangati semangat juang atlet-atlet Indonesia. Kopi Fresco, menyertai setiap langkah menuju kejayaan.',
                'collab' => []
            ],
            'pages' => [
                'product' => [
                    'title' => 'BERAGAM PILIHAN RASA, UNTUK MENEMANI AKTIVITASMU',
                    'position' => 'text-left',
                    'background' => ''
                ],
                'article' => [
                    'title' => 'ENAKIN TIAP MOMEN, ENAKNYA NGOPI FRESCO',
                    'position' => 'text-left',
                    'background' => ''
                ],
                'activity' => [
                    'title' => 'IKUTAN BERAGAM AKTIVITAS MENANGKAN HADIAH MENARIK',
                    'position' => 'text-left',
                    'background' => ''
                ],
                'contact' => [
                    'title' => 'KAMI SIAP MEMBANTU',
                    'position' => 'text-left',
                    'background' => ''
                ]
            ]
        ];

        // Cappuccino Coffee Theme (Default Value)
        $cappuccino_coffee_default = [
            'intro' => [
                'title' => 'ENAKNYA NGOPI FRESCO, ENAKIN TIAP MOMEN',
                'desc' => 'Enakin tiap momen dengan #EnaknyaNgopiFresco. Mau panas mau dingin, Fresco Cappuccino enak dinikmati kapan aja dan dimana aja. <br /><br /> Kombinasi sempurna dari biji kopi pilihan, jadikan tiap momen bersama temen-temen lo jadi lebih asik, lebih seru dan PERFECTO !',
                'image' => ''
            ],
            'video' => [
                'url' => 'https://www.youtube.com/watch?v=QXYyFCfruRg',
                'desc' => 'Kopi Fresco berkolaborasi dengan Tenue de Attire untuk mendukung para pengrajin kemeja lokal di Indonesia. Melalui kemitraan ini, kami berupaya memberikan dukungan kepada para perajin pakaian dalam negeri, mempromosikan keindahan dan kualitas produk lokal. Kopi Fresco, turut mendukung pertumbuhan industri kreatif Indonesia.',
                'collab' => [],
            ],
            'pages' => [
                'product' => [
                    'title' => 'BERAGAM PILIHAN RASA, UNTUK MENEMANI AKTIVITASMU',
                    'position' => 'text-left',
                    'background' => ''
                ],
                'article' => [
                    'title' => 'ENAKIN TIAP MOMEN, ENAKNYA NGOPI FRESCO',
                    'position' => 'text-left',
                    'background' => ''
                ],
                'activity' => [
                    'title' => 'IKUTAN BERAGAM AKTIVITAS MENANGKAN HADIAH MENARIK',
                    'position' => 'text-left',
                    'background' => ''
                ],
                'contact' => [
                    'title' => 'KAMI SIAP MEMBANTU',
                    'position' => 'text-left',
                    'background' => ''
                ]
            ]
        ];

        /**
         * Page Home
         */
        // Introduction Section
        $this->migrator->add('pages.black_intro_title', $black_coffee_default['intro']['title']);
        $this->migrator->add('pages.black_intro_desc', $black_coffee_default['intro']['desc']);
        $this->migrator->add('pages.black_intro_image_id', $black_coffee_default['intro']['image']);
        $this->migrator->add('pages.black_intro_image', $black_coffee_default['intro']['image']);

        $this->migrator->add('pages.cappuccino_intro_title', $cappuccino_coffee_default['intro']['title']);
        $this->migrator->add('pages.cappuccino_intro_desc', $cappuccino_coffee_default['intro']['desc']);
        $this->migrator->add('pages.cappuccino_intro_image_id', $cappuccino_coffee_default['intro']['image']);
        $this->migrator->add('pages.cappuccino_intro_image', $cappuccino_coffee_default['intro']['image']);

        // Video & Collaboration Section
        $this->migrator->add('pages.black_video_url', $black_coffee_default['video']['url']);
        $this->migrator->add('pages.black_video_collab', $black_coffee_default['video']['collab']);
        $this->migrator->add('pages.black_video_desc', $black_coffee_default['video']['desc']);

        $this->migrator->add('pages.cappuccino_video_url', $cappuccino_coffee_default['video']['url']);
        $this->migrator->add('pages.cappuccino_video_collab', $cappuccino_coffee_default['video']['collab']);
        $this->migrator->add('pages.cappuccino_video_desc', $cappuccino_coffee_default['video']['desc']);

        /**
         * Page Product
         */
        // Heading Banner
        $this->migrator->add('pages.pd_black_banner_title', $black_coffee_default['pages']['product']['title']);
        $this->migrator->add('pages.pd_black_banner_position', $black_coffee_default['pages']['product']['position']);
        $this->migrator->add('pages.pd_black_banner_image_id', $black_coffee_default['pages']['product']['background']);
        $this->migrator->add('pages.pd_black_banner_image', $black_coffee_default['pages']['product']['background']);

        $this->migrator->add('pages.pd_cappuccino_banner_title', $cappuccino_coffee_default['pages']['product']['title']);
        $this->migrator->add('pages.pd_cappuccino_banner_position', $cappuccino_coffee_default['pages']['product']['position']);
        $this->migrator->add('pages.pd_cappuccino_banner_image_id', $cappuccino_coffee_default['pages']['product']['background']);
        $this->migrator->add('pages.pd_cappuccino_banner_image', $cappuccino_coffee_default['pages']['product']['background']);

        /**
         * Page Article
         */
        // Heading Banner
        $this->migrator->add('pages.ar_black_banner_title', $black_coffee_default['pages']['article']['title']);
        $this->migrator->add('pages.ar_black_banner_position', $black_coffee_default['pages']['article']['position']);
        $this->migrator->add('pages.ar_black_banner_image_id', $black_coffee_default['pages']['article']['background']);
        $this->migrator->add('pages.ar_black_banner_image', $black_coffee_default['pages']['article']['background']);

        $this->migrator->add('pages.ar_cappuccino_banner_title', $cappuccino_coffee_default['pages']['article']['title']);
        $this->migrator->add('pages.ar_cappuccino_banner_position', $cappuccino_coffee_default['pages']['article']['position']);
        $this->migrator->add('pages.ar_cappuccino_banner_image_id', $cappuccino_coffee_default['pages']['article']['background']);
        $this->migrator->add('pages.ar_cappuccino_banner_image', $cappuccino_coffee_default['pages']['article']['background']);

        /**
         * Page Activity
         */
        // Heading Banner
        $this->migrator->add('pages.ac_black_banner_title', $black_coffee_default['pages']['activity']['title']);
        $this->migrator->add('pages.ac_black_banner_position', $black_coffee_default['pages']['activity']['position']);
        $this->migrator->add('pages.ac_black_banner_image_id', $black_coffee_default['pages']['activity']['background']);
        $this->migrator->add('pages.ac_black_banner_image', $black_coffee_default['pages']['activity']['background']);

        $this->migrator->add('pages.ac_cappuccino_banner_title', $cappuccino_coffee_default['pages']['activity']['title']);
        $this->migrator->add('pages.ac_cappuccino_banner_position', $cappuccino_coffee_default['pages']['activity']['position']);
        $this->migrator->add('pages.ac_cappuccino_banner_image_id', $cappuccino_coffee_default['pages']['activity']['background']);
        $this->migrator->add('pages.ac_cappuccino_banner_image', $cappuccino_coffee_default['pages']['activity']['background']);

        /**
         * Page Contact
         */
        // Heading Banner
        $this->migrator->add('pages.cn_black_banner_title', $black_coffee_default['pages']['contact']['title']);
        $this->migrator->add('pages.cn_black_banner_position', $black_coffee_default['pages']['contact']['position']);
        $this->migrator->add('pages.cn_black_banner_image_id', $black_coffee_default['pages']['contact']['background']);
        $this->migrator->add('pages.cn_black_banner_image', $black_coffee_default['pages']['contact']['background']);

        $this->migrator->add('pages.cn_cappuccino_banner_title', $cappuccino_coffee_default['pages']['contact']['title']);
        $this->migrator->add('pages.cn_cappuccino_banner_position', $cappuccino_coffee_default['pages']['contact']['position']);
        $this->migrator->add('pages.cn_cappuccino_banner_image_id', $cappuccino_coffee_default['pages']['contact']['background']);
        $this->migrator->add('pages.cn_cappuccino_banner_image', $cappuccino_coffee_default['pages']['contact']['background']);
    }
};
