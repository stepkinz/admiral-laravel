<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            [
                'author' => 'Анна К.',
                'text' => 'Спасибо огромное! Помогли выбраться из сложной ситуации. Менеджер Ольга очень внимательная, все объяснила, предложила удобную рассрочку. Теперь спокойно выплачиваю по 3000 рублей в месяц.',
                'rating' => 5,
                'is_visible' => true,
            ],
            [
                'author' => 'Дмитрий П.',
                'text' => 'Долг был большой — больше 200 тысяч. Думал, никогда не расплачусь. Ребята сделали скидку 20%, разбили на 12 месяцев. Уже полгода плачу, без проблем. Рекомендую!',
                'rating' => 5,
                'is_visible' => true,
            ],
            [
                'author' => 'Мария С.',
                'text' => 'Хороший сервис. Немного долго ждала обратного звонка, но когда связались — все прошло быстро. Оформили рассрочку за один день. Спасибо!',
                'rating' => 4,
                'is_visible' => true,
            ],
        ];

        foreach ($reviews as $item) {
            Review::updateOrCreate(
                ['author' => $item['author'], 'text' => $item['text']],
                ['rating' => $item['rating'], 'is_visible' => $item['is_visible']]
            );
        }
    }
}
