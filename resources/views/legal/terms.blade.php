<x-layouts.app title="Пользовательское соглашение — ПКО Адмирал">
  <div class="min-h-screen bg-white text-slate-900">
    <x-top-bar />
    <x-header />

    <main>
      {{-- Hero — Swiss Legal style --}}
      <section class="border-b border-slate-200 swiss-pattern-dots relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10 z-[1]"></div>
        <div class="absolute top-20 left-0 w-1 h-32 bg-slate-900 opacity-5 z-[1]"></div>
        <div class="absolute bottom-20 right-0 w-1 h-32 bg-slate-900 opacity-5 z-[1]"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 py-16 lg:py-20 relative z-10">
          <nav class="text-sm text-slate-600 mb-8 max-w-4xl mx-auto">
            <a href="{{ route('home') }}" class="hover:opacity-80 transition-opacity" style="color: #243468;">Главная</a>
            <span class="mx-2">/</span>
            <a href="{{ route('legal.index') }}" class="hover:opacity-80 transition-opacity" style="color: #243468;">Юридическая информация</a>
            <span class="mx-2">/</span>
            <span class="text-slate-900 font-medium">Пользовательское соглашение</span>
          </nav>
          <div class="max-w-4xl mx-auto flex flex-col sm:flex-row sm:items-start sm:justify-between gap-6">
            <div class="flex items-center gap-4">
              <div class="h-12 w-12 rounded-none border-2 border-slate-900 flex items-center justify-center flex-shrink-0">
                <svg class="h-6 w-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
              </div>
              <div>
                <h1 class="text-3xl md:text-4xl font-bold tracking-tight font-serif text-slate-900" style="color: #243468;">Пользовательское соглашение</h1>
                <p class="text-slate-600 mt-1 text-sm">Дата последнего обновления: 23.01.2026</p>
              </div>
            </div>
            <button type="button" class="px-4 py-2 border-2 border-slate-900 rounded-none text-sm font-bold uppercase tracking-wider hover:bg-slate-50 transition-colors flex items-center gap-2 self-start">
              <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
              Скачать PDF
            </button>
          </div>
        </div>
      </section>

      {{-- Content — Swiss Legal style --}}
      <section class="py-16 md:py-24 relative bg-stone-50 border-b border-slate-200 swiss-pattern-lines">
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="max-w-4xl mx-auto prose prose-lg max-w-none">
            <div class="space-y-10">
              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">1. Общие положения</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Настоящее Пользовательское соглашение (далее — Соглашение) регулирует отношения между {{ $settings->legal_name ?? 'ООО ПКО «Адмирал»' }} (далее — Компания) и посетителями сайта pkoadmiral.ru (далее — Сайт, Пользователи).</p>
                <p class="text-slate-700 leading-relaxed">Использование Сайта означает безоговорочное согласие Пользователя со всеми условиями настоящего Соглашения.</p>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">2. Предмет соглашения</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Компания предоставляет Пользователю доступ к информации о своих услугах, размещенной на Сайте, а также возможность использования функционала Сайта (калькулятор рассрочки, формы обратной связи, проверка сотрудников).</p>
                <p class="text-slate-700 leading-relaxed">Все существующие на данный момент функции Сайта, а также любое их развитие и/или добавление новых являются предметом настоящего Соглашения.</p>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">3. Права и обязанности сторон</h2>
                <h3 class="text-xl font-bold uppercase tracking-wider mb-3 text-slate-900" style="color: #243468;">3.1. Пользователь имеет право:</h3>
                <ul class="list-none space-y-2 text-slate-700 pl-0 mb-4">
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Использовать все доступные функции Сайта</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Получать информацию об услугах Компании, размещенную на Сайте</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Задавать вопросы и получать консультации через формы обратной связи</li>
                </ul>
                <h3 class="text-xl font-bold uppercase tracking-wider mb-3 text-slate-900" style="color: #243468;">3.2. Пользователь обязуется:</h3>
                <ul class="list-none space-y-2 text-slate-700 pl-0 mb-4">
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Предоставлять достоверную информацию при заполнении форм на Сайте</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Не использовать Сайт в целях, противоречащих законодательству РФ</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Не нарушать работоспособность Сайта</li>
                </ul>
                <h3 class="text-xl font-bold uppercase tracking-wider mb-3 text-slate-900" style="color: #243468;">3.3. Компания обязуется:</h3>
                <ul class="list-none space-y-2 text-slate-700 pl-0">
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Поддерживать работоспособность Сайта</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Обеспечивать конфиденциальность персональных данных Пользователей в соответствии с Политикой конфиденциальности</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Предоставлять актуальную информацию об услугах</li>
                </ul>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">4. Ответственность сторон</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Компания не несет ответственности за:</p>
                <ul class="list-none space-y-2 text-slate-700 pl-0">
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Временные технические сбои и перерывы в работе Сайта, возникшие по независящим от Компании причинам</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Действия Пользователя, связанные с использованием или невозможностью использования Сайта</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Решения, принятые Пользователем на основании информации, полученной на Сайте</li>
                </ul>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">5. Интеллектуальная собственность</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Все объекты, размещенные на Сайте, в том числе элементы дизайна, текст, графические изображения, иллюстрации, видео, программы, музыка, звуки и другие объекты (далее — Контент), являются объектами исключительных прав Компании и других правообладателей.</p>
                <p class="text-slate-700 leading-relaxed">Использование Контента, а также каких-либо иных элементов Сайта возможно только с письменного разрешения правообладателя.</p>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">6. Изменение условий соглашения</h2>
                <p class="text-slate-700 leading-relaxed">Компания вправе в любое время в одностороннем порядке изменять условия настоящего Соглашения. Новая редакция вступает в силу с момента размещения на Сайте, если иное не предусмотрено новой редакцией.</p>
              </section>

              <section>
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">7. Контактная информация</h2>
                @php $termsPhone = $settings->phone ?? '8 800 500 29 01'; $termsEmail = $settings->email ?? 'info@pkoadmiral.ru'; $termsLegal = $settings->legal_name ?? 'ООО ПКО «Адмирал»'; $termsInn = $settings->inn ?? '4170044007468'; @endphp
                <div class="border border-slate-200 rounded-none p-6 bg-white">
                  <p class="text-slate-700 mb-2"><strong class="text-slate-900">{{ $termsLegal }}</strong></p>
                  <p class="text-slate-700 mb-2"><strong class="text-slate-900">Лицензия ФССП:</strong> № {{ $termsInn }}</p>
                  <p class="text-slate-700 mb-2"><strong class="text-slate-900">Email:</strong> <a href="mailto:{{ $termsEmail }}" class="font-bold hover:opacity-80 transition-opacity" style="color: #ED3200;">{{ $termsEmail }}</a></p>
                  <p class="text-slate-700"><strong class="text-slate-900">Телефон:</strong> <a href="tel:{{ preg_replace('/\D/', '', $termsPhone) }}" class="font-bold hover:opacity-80 transition-opacity" style="color: #ED3200;">{{ $termsPhone }}</a></p>
                </div>
              </section>
            </div>
          </div>
        </div>
      </section>
    </main>

    <x-footer />
  </div>
</x-layouts.app>
