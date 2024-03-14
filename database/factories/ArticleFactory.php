<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => 18,
            'type' => 'article',
            'title' => 'WOIIIIIIIIII OKWAOkoaw kaoWKoak wok',
            'slug' => 'woiiiiiiiiii-okwa-okoaw-kao-w-koak-wok',
            'excerpt' => 'SSSiiiUUUUUUUUUUuuUUuuuu',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam ipsam iste eius laudantium harum iusto eveniet, facere quia, ad repellat provident cumque quo necessitatibus officiis ea fuga ab doloremque deserunt esse nobis dignissimos quos minus deleniti? Maiores at iure aliquid laudantium sequi! At ipsa hic fuga distinctio totam velit cumque nobis non eaque voluptas sunt molestias repudiandae, quia ab aliquid voluptatem. Quis, sequi? Cupiditate velit repellendus voluptatem dolorem officiis, possimus suscipit vero iure quae, quod aliquam ipsam adipisci fugiat! Cupiditate, deserunt. Fugiat nam, totam facere tenetur unde delectus quisquam ipsum, enim omnis vitae magni perferendis est ipsam in possimus? Suscipit.',
            'published' => true,
            'pin' => false
        ];
    }
}
