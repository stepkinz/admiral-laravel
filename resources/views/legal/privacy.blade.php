<x-layouts.app title="Политика конфиденциальности — ПКО Адмирал">
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
            <span class="text-slate-900 font-medium">Политика конфиденциальности</span>
          </nav>
          <div class="max-w-4xl mx-auto flex flex-col sm:flex-row sm:items-start sm:justify-between gap-6">
            <div class="flex items-center gap-4">
              <div class="h-12 w-12 rounded-none border-2 border-slate-900 flex items-center justify-center flex-shrink-0">
                <svg class="h-6 w-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
              </div>
              <div>
                <h1 class="text-3xl md:text-4xl font-bold tracking-tight font-serif text-slate-900" style="color: #243468;">Политика конфиденциальности</h1>
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
                <p class="text-slate-700 leading-relaxed mb-4">Настоящая Политика конфиденциальности персональных данных (далее — Политика) действует в отношении всей информации, которую {{ $settings->legal_name ?? 'ООО ПКО «Адмирал»' }} (далее — Компания) может получить о Пользователе во время использования сайта pkoadmiral.ru (далее — Сайт).</p>
                <p class="text-slate-700 leading-relaxed">Использование Сайта означает безоговорочное согласие Пользователя с настоящей Политикой и указанными в ней условиями обработки его персональной информации.</p>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">2. Персональная информация пользователей</h2>
                <p class="text-slate-700 leading-relaxed mb-4">В рамках настоящей Политики под «персональной информацией Пользователя» понимаются:</p>
                <ul class="list-none space-y-2 text-slate-700 pl-0">
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Персональная информация, которую Пользователь предоставляет о себе самостоятельно при заполнении форм на Сайте (имя, номер телефона, адрес электронной почты, сообщение).</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Данные, которые автоматически передаются в процессе использования Сайта (IP-адрес, cookie, информация о браузере, время доступа).</li>
                </ul>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">3. Цели сбора персональной информации</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Компания собирает и хранит только ту персональную информацию, которая необходима для предоставления услуг или исполнения соглашений с Пользователем, за исключением случаев, когда законодательством предусмотрено обязательное хранение персональной информации в течение определенного законом срока.</p>
                <p class="text-slate-700 leading-relaxed mb-4">Персональные данные Пользователя Компания обрабатывает в следующих целях:</p>
                <ul class="list-none space-y-2 text-slate-700 pl-0">
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Связь с Пользователем для предоставления информации об услугах Компании</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Обработка заявок и запросов Пользователя</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Улучшение качества услуг и работы Сайта</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Проведение статистических и иных исследований</li>
                </ul>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">4. Условия обработки персональной информации</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Компания принимает все необходимые меры для защиты персональных данных Пользователя от несанкционированного доступа, изменения, раскрытия или уничтожения.</p>
                <p class="text-slate-700 leading-relaxed mb-4">Компания предоставляет доступ к персональным данным только тем работникам, которым эта информация необходима для выполнения должностных обязанностей.</p>
                <p class="text-slate-700 leading-relaxed">Компания вправе передать персональную информацию третьим лицам только в случаях, предусмотренных законодательством Российской Федерации.</p>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">5. Права пользователя</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Пользователь имеет право:</p>
                <ul class="list-none space-y-2 text-slate-700 pl-0">
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Получать информацию, касающуюся обработки его персональных данных</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Требовать уточнения, блокирования или уничтожения своих персональных данных</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Отозвать согласие на обработку персональных данных</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Обжаловать действия или бездействие Компании в уполномоченный орган по защите прав субъектов персональных данных</li>
                </ul>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">6. Изменение политики конфиденциальности</h2>
                <p class="text-slate-700 leading-relaxed">Компания имеет право вносить изменения в настоящую Политику. Новая редакция Политики вступает в силу с момента ее размещения на Сайте, если иное не предусмотрено новой редакцией Политики.</p>
              </section>

              <section>
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">7. Обратная связь</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Все предложения или вопросы по поводу настоящей Политики следует направлять по адресу:</p>
                @php $legalPhone = $settings->phone ?? '8 800 500 29 01'; $legalEmail = $settings->email ?? 'privacy@pkoadmiral.ru'; @endphp
                <div class="border border-slate-200 rounded-none p-6 bg-white">
                  <p class="text-slate-700"><strong class="text-slate-900">Email:</strong> <a href="mailto:{{ $legalEmail }}" class="font-bold hover:opacity-80 transition-opacity" style="color: #ED3200;">{{ $legalEmail }}</a></p>
                  <p class="text-slate-700 mt-2"><strong class="text-slate-900">Телефон:</strong> <a href="tel:{{ preg_replace('/\D/', '', $legalPhone) }}" class="font-bold hover:opacity-80 transition-opacity" style="color: #ED3200;">{{ $legalPhone }}</a></p>
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
