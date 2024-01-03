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
                'name' => '',
                'image' => ''
            ],
            'video' => [
                'url' => 'XPspg1WM2zM',
                'desc' => 'Minum kopi telah menjadi tradisi yang sudah ada sejak puluhan tahun yang lalu di Indonesia. Tradisi tersebut dijaga dengan baik oleh Kapal Api yang selalu membuat produk dengan biji kopi pilihan. Salah satunya adalah Kapal Api Fresco, yang dibuat dengan perpaduan 100% biji kopi arabica dan robusta berkualitas tinggi. Aroma dan kualitas setiap seduhan Kapal Api Fresco memberikan sensasi minum kopi yang jelas lebih enak.',
                'collab' => ''
            ],
            'description' => [
                'title' => '',
                'explanation' => '',
                'image' => ''
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
            'product' => [
                'name' => '',
                'image' => ''
            ],
            'video' => [
                'url' => 'QXYyFCfruRg',
                'desc' => 'Kopi FresCo berkolaborasi dengan Tenue de Attire untuk mendukung para pengrajin kemeja lokal di Indonesia. Melalui kemitraan ini, kami berupaya memberikan dukungan kepada para perajin pakaian dalam negeri, mempromosikan keindahan dan kualitas produk lokal. Kopi FresCo, turut mendukung pertumbuhan industri kreatif Indonesia.',
                'collab' => '',
            ],
            'description' => [
                'title' => '',
                'explanation' => '',
                'image' => ''
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
        $this->migrator->add('home.black_product_image', $black_coffee_default['product']['image']);
        $this->migrator->add('home.black_product_name', $black_coffee_default['product']['name']);
        $this->migrator->add('home.cappuccino_product_image', $cappuccino_coffee_default['product']['image']);
        $this->migrator->add('home.cappuccino_product_name', $cappuccino_coffee_default['product']['name']);

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
        $this->migrator->add('home.black_desc_image', $black_coffee_default['description']['image']);
        $this->migrator->add('home.black_desc_title', $black_coffee_default['description']['title']);
        $this->migrator->add('home.black_desc_explanation', $black_coffee_default['description']['explanation']);
        $this->migrator->add('home.cappuccino_desc_image', $cappuccino_coffee_default['description']['image']);
        $this->migrator->add('home.cappuccino_desc_title', $cappuccino_coffee_default['description']['title']);
        $this->migrator->add('home.cappuccino_desc_explanation', $cappuccino_coffee_default['description']['explanation']);
    }
};
