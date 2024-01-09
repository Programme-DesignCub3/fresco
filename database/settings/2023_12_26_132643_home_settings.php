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
                'title' => 'FRESH KOPINYA, JELAS LEBIH ENAK',
                'desc' => 'Minum kopi telah menjadi tradisi yang sudah ada sejak puluhan tahun yang lalu di Indonesia. Tradisi tersebut dijaga dengan baik oleh Kapal Api yang selalu membuat produk dengan biji kopi pilihan. Salah satunya adalah Kapal Api Fresco, yang dibuat dengan perpaduan 100% biji kopi arabica dan robusta berkualitas tinggi. Aroma dan kualitas setiap seduhan Kapal Api Fresco memberikan sensasi minum kopi yang jelas lebih enak.',
                'image' => ''
            ],
            'product' => [
                [
                    'black_product_image' => '',
                    'black_product_name' => 'Kopi Bubuk Hitam'
                ],
                [
                    'black_product_image' => '',
                    'black_product_name' => 'Kopi Krim Moka'
                ],
                [
                    'black_product_image' => '',
                    'black_product_name' => 'Kopi Krim Susu'
                ],
                [
                    'black_product_image' => '',
                    'black_product_name' => 'Kopi + Gula'
                ],
            ],
            'video' => [
                'url' => 'XPspg1WM2zM',
                'desc' => 'Kopi FresCo bangga berkolaborasi dengan PSSI untuk mendukung para pemain sepak bola Indonesia dan pengembangan olahraga. Melalui kemitraan ini, Kami berkomitmen untuk memajukan prestasi sepak bola nasional dan menyemangati semangat juang atlet-atlet Indonesia. Kopi FresCo, menyertai setiap langkah menuju kejayaan.',
                'collab' => ''
            ],
            'description' => [
                [
                    'black_desc_title' => 'BIJI KOPI PILIHAN TERBAIK',
                    'black_desc_explanation' => 'Biji kopi pilihan memiliki kualitas unggul dengan rasa yang kaya dan aroma yang mendalam. Dipetik secara selektif dari kebun terbaik, biji kopi ini menjanjikan pengalaman kopi yang istimewa dan memikat bagi para pencinta kopi sejati.',
                    'black_desc_image' => ''
                ],
                [
                    'black_desc_title' => 'DIRACIK OLEH AHLI KOPI',
                    'black_desc_explanation' => 'Kopi blend adalah hasil racikan para ahli kopi yang menggabungkan biji dari berbagai daerah. Dengan resep khusus, kopi blend menciptakan harmoni cita rasa unik, menyajikan pengalaman kopi yang istimewa yang memikat lidah para penikmat kopi.',
                    'black_desc_image' => ''
                ],
                [
                    'black_desc_title' => 'MENGGUNAKAN TEKNOLOGI CANGGIH',
                    'black_desc_explanation' => 'Teknologi canggih diterapkan oleh para ahli dalam pembuatan produk kopi. Dari penggilingan presisi hingga metode pemanggangan inovatif, penggunaan teknologi terkini memastikan setiap gelas menghadirkan cita rasa kopi terbaik, memuaskan keinginan para penikmat kopi yang menghargai inovasi.',
                    'black_desc_image' => ''
                ],
                [
                    'black_desc_title' => 'PENGALAMAN KOPI YANG FRESH',
                    'black_desc_explanation' => 'Kopi FresCo menyajikan pengalaman minum kopi baru dengan biji kopi segar. Nikmati keharuman yang melepaskan semangat kopi yang baru dipanggang, serta rasa yang penuh cita, memberikan sensasi minum kopi yang memikat dan memuaskan.',
                    'black_desc_image' => ''
                ],
            ]
        ];

        /**
         * Cappuccino Coffee Theme (Default Value)
         */
        $cappuccino_coffee_default = [
            'intro' => [
                'title' => 'STRONG CREAMY SMOOTH CRUNCHY PERFECTO',
                'desc' => 'Minum kopi telah menjadi tradisi yang sudah ada sejak puluhan tahun yang lalu di Indonesia. Tradisi tersebut dijaga dengan baik oleh Kapal Api yang selalu membuat produk dengan biji kopi pilihan. Salah satunya adalah Kapal Api Fresco, yang dibuat dengan perpaduan 100% biji kopi arabica dan robusta berkualitas tinggi. Aroma dan kualitas setiap seduhan Kapal Api Fresco memberikan sensasi minum kopi yang jelas lebih enak.',
                'image' => ''
            ],
            'product' => [],
            'video' => [
                'url' => 'QXYyFCfruRg',
                'desc' => 'Kopi FresCo berkolaborasi dengan Tenue de Attire untuk mendukung para pengrajin kemeja lokal di Indonesia. Melalui kemitraan ini, kami berupaya memberikan dukungan kepada para perajin pakaian dalam negeri, mempromosikan keindahan dan kualitas produk lokal. Kopi FresCo, turut mendukung pertumbuhan industri kreatif Indonesia.',
                'collab' => '',
            ],
            'description' => [
                [
                    'cappuccino_desc_title' => 'BIJI KOPI PILIHAN TERBAIK',
                    'cappuccino_desc_explanation' => 'Biji kopi pilihan memiliki kualitas unggul dengan rasa yang kaya dan aroma yang mendalam. Dipetik secara selektif dari kebun terbaik, biji kopi ini menjanjikan pengalaman kopi yang istimewa dan memikat bagi para pencinta kopi sejati.',
                    'cappuccino_desc_image' => ''
                ],
                [
                    'cappuccino_desc_title' => 'DIRACIK OLEH AHLI KOPI',
                    'cappuccino_desc_explanation' => 'Kopi blend adalah hasil racikan para ahli kopi yang menggabungkan biji dari berbagai daerah. Dengan resep khusus, kopi blend menciptakan harmoni cita rasa unik, menyajikan pengalaman kopi yang istimewa yang memikat lidah para penikmat kopi.',
                    'cappuccino_desc_image' => ''
                ],
                [
                    'cappuccino_desc_title' => 'MENGGUNAKAN TEKNOLOGI CANGGIH',
                    'cappuccino_desc_explanation' => 'Teknologi canggih diterapkan oleh para ahli dalam pembuatan produk kopi. Dari penggilingan presisi hingga metode pemanggangan inovatif, penggunaan teknologi terkini memastikan setiap gelas menghadirkan cita rasa kopi terbaik, memuaskan keinginan para penikmat kopi yang menghargai inovasi.',
                    'cappuccino_desc_image' => ''
                ],
                [
                    'cappuccino_desc_title' => 'PENGALAMAN KOPI YANG FRESH',
                    'cappuccino_desc_explanation' => 'Kopi FresCo menyajikan pengalaman minum kopi baru dengan biji kopi segar. Nikmati keharuman yang melepaskan semangat kopi yang baru dipanggang, serta rasa yang penuh cita, memberikan sensasi minum kopi yang memikat dan memuaskan.',
                    'cappuccino_desc_image' => ''
                ],
            ]
        ];

        /**
         * Introduction Section
         */
        $this->migrator->add('home.black_intro_title', $black_coffee_default['intro']['title']);
        $this->migrator->add('home.black_intro_desc', $black_coffee_default['intro']['desc']);
        $this->migrator->add('home.black_intro_image', $black_coffee_default['intro']['image']);
        $this->migrator->add('home.cappuccino_intro_title', $cappuccino_coffee_default['intro']['title']);
        $this->migrator->add('home.cappuccino_intro_desc', $cappuccino_coffee_default['intro']['desc']);
        $this->migrator->add('home.cappuccino_intro_image', $cappuccino_coffee_default['intro']['image']);

        /**
         * Product List Section
         */
        $this->migrator->add('home.black_product_list', $black_coffee_default['product']);
        $this->migrator->add('home.cappuccino_product_list', $cappuccino_coffee_default['product']);

        /**
         * Video & Collaboration Section
         */
        $this->migrator->add('home.black_video_url', $black_coffee_default['video']['url']);
        $this->migrator->add('home.black_video_collab', $black_coffee_default['video']['collab']);
        $this->migrator->add('home.black_video_desc', $black_coffee_default['video']['desc']);
        $this->migrator->add('home.cappuccino_video_url', $cappuccino_coffee_default['video']['url']);
        $this->migrator->add('home.cappuccino_video_collab', $cappuccino_coffee_default['video']['collab']);
        $this->migrator->add('home.cappuccino_video_desc', $cappuccino_coffee_default['video']['desc']);

        /**
         * Description Section
         */
        $this->migrator->add('home.black_desc_list', $black_coffee_default['description']);
        $this->migrator->add('home.cappuccino_desc_list', $cappuccino_coffee_default['description']);
    }
};
