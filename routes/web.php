<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $reviews = \App\Models\Review::where('is_visible', true)->orderByRaw('COALESCE(review_date, created_at) DESC')->take(6)->get();
    $faqs = \App\Models\Faq::orderBy('sort_order')->get();

    // Если в БД нет отзывов — показываем отзывы из оригинала (Next.js LandingContent)
    if ($reviews->isEmpty()) {
        $reviews = collect([
            (object)['author' => 'Анна К.', 'text' => 'Спасибо огромное! Помогли выбраться из сложной ситуации. Менеджер Ольга очень внимательная, все объяснила, предложила удобную рассрочку. Теперь спокойно выплачиваю по 3000 рублей в месяц.', 'rating' => 5, 'photo' => null, 'review_date' => \Carbon\Carbon::parse('2026-01-15'), 'created_at' => \Carbon\Carbon::parse('2026-01-15')],
            (object)['author' => 'Дмитрий П.', 'text' => 'Долг был большой — больше 200 тысяч. Думал, никогда не расплачусь. Ребята сделали скидку 20%, разбили на 12 месяцев. Уже полгода плачу, без проблем. Рекомендую!', 'rating' => 5, 'photo' => null, 'review_date' => \Carbon\Carbon::parse('2026-01-10'), 'created_at' => \Carbon\Carbon::parse('2026-01-10')],
            (object)['author' => 'Мария С.', 'text' => 'Хороший сервис. Немного долго ждала обратного звонка, но когда связались — все прошло быстро. Оформили рассрочку за один день. Спасибо!', 'rating' => 4, 'photo' => null, 'review_date' => \Carbon\Carbon::parse('2026-01-08'), 'created_at' => \Carbon\Carbon::parse('2026-01-08')],
        ]);
    }

    // Если в БД нет FAQ — показываем вопросы из оригинала (Next.js LandingContent)
    if ($faqs->isEmpty()) {
        $faqs = collect([
            (object)['question' => 'Кто может воспользоваться вашими услугами?', 'answer' => 'Любой человек, у которого есть задолженность перед кредитором, чьи права перешли к нашей компании. Мы работаем с физическими лицами и индивидуальными предпринимателями.', 'sort_order' => 1],
            (object)['question' => 'Какие документы нужны для оформления рассрочки?', 'answer' => 'Минимальный пакет: паспорт РФ и номер договора (если он у вас сохранился). В некоторых случаях можем попросить справку о доходах для расчета оптимальных условий.', 'sort_order' => 2],
            (object)['question' => 'Можно ли погасить долг досрочно?', 'answer' => 'Да, конечно! Вы можете погасить задолженность полностью или частично в любой момент без штрафов и комиссий. Досрочное погашение только приветствуется.', 'sort_order' => 3],
            (object)['question' => 'Что будет, если я не смогу платить по графику?', 'answer' => 'Мы понимаем, что жизненные обстоятельства бывают разными. Если у вас возникли временные трудности — свяжитесь с нами. Мы готовы пересмотреть условия и найти решение.', 'sort_order' => 4],
            (object)['question' => 'Это законно? Есть ли у вас лицензия?', 'answer' => 'Да, мы работаем абсолютно законно. Наша компания включена в государственный реестр ФССП (№ 4170044007468). Все операции проводятся в рамках действующего законодательства РФ.', 'sort_order' => 5],
        ]);
    }

    return view('welcome', compact('reviews', 'faqs'));
})->name('home');

Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

Route::get('/about', fn () => view('about'))->name('about');
Route::get('/contact', fn () => view('contact'))->name('contact');
Route::get('/requisites', fn () => view('requisites'))->name('requisites');
Route::get('/legal', fn () => view('legal.index'))->name('legal.index');
Route::get('/legal/privacy', fn () => view('legal.privacy'))->name('legal.privacy');
Route::get('/legal/terms', fn () => view('legal.terms'))->name('legal.terms');
Route::get('/legal/personal-data', fn () => view('legal.personal-data'))->name('legal.personal-data');

Route::get('/api/employees', function (\Illuminate\Http\Request $request) {
    $q = $request->input('q', '');
    // Заглушка: API сотрудников пока нет — всегда пустой список
    return response()->json(['docs' => []]);
});
