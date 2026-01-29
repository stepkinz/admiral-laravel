<x-layouts.app title="Согласие на обработку персональных данных — ПКО Адмирал">
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
            <span class="text-slate-900 font-medium">Обработка персональных данных</span>
          </nav>
          <div class="max-w-4xl mx-auto flex flex-col sm:flex-row sm:items-start sm:justify-between gap-6">
            <div class="flex items-center gap-4">
              <div class="h-12 w-12 rounded-none border-2 border-slate-900 flex items-center justify-center flex-shrink-0">
                <svg class="h-6 w-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
              </div>
              <div>
                <h1 class="text-3xl md:text-4xl font-bold tracking-tight font-serif text-slate-900" style="color: #243468;">Согласие на обработку персональных данных</h1>
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
                <p class="text-slate-700 leading-relaxed mb-4">В соответствии с требованиями Федерального закона от 27.07.2006 № 152-ФЗ «О персональных данных» настоящим Пользователь, оставляя свои персональные данные на сайте pkoadmiral.ru (далее — Сайт), дает согласие {{ $settings->legal_name ?? 'ООО ПКО «Адмирал»' }} (далее — Оператор) на обработку своих персональных данных.</p>
                <p class="text-slate-700 leading-relaxed">Согласие дается свободно, своей волей и в своем интересе.</p>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">2. Перечень персональных данных</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Настоящим Пользователь дает согласие на обработку следующих персональных данных:</p>
                <ul class="list-none space-y-2 text-slate-700 pl-0">
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Фамилия, имя, отчество</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Номер телефона</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Адрес электронной почты (e-mail)</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Сообщения, оставленные через формы обратной связи</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Данные о долговых обязательствах (при их предоставлении)</li>
                </ul>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">3. Цели обработки персональных данных</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Персональные данные обрабатываются Оператором в следующих целях:</p>
                <ul class="list-none space-y-2 text-slate-700 pl-0">
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Связь с Пользователем для предоставления информации об услугах Оператора</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Обработка заявок и запросов Пользователя</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Предоставление персонализированных предложений по реструктуризации долга</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Заключение и исполнение договоров о реструктуризации задолженности</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Улучшение качества услуг Оператора</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Проведение статистических исследований</li>
                </ul>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">4. Способы обработки персональных данных</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Оператор осуществляет обработку персональных данных следующими способами:</p>
                <ul class="list-none space-y-2 text-slate-700 pl-0">
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Сбор</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Запись</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Систематизация</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Накопление</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Хранение</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Уточнение (обновление, изменение)</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Извлечение</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Использование</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Передача (распространение, предоставление, доступ)</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Обезличивание</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Блокирование</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Удаление</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Уничтожение</li>
                </ul>
                <p class="text-slate-700 leading-relaxed mt-4">Обработка персональных данных осуществляется как с использованием средств автоматизации, так и без использования таких средств.</p>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">5. Передача персональных данных третьим лицам</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Оператор вправе передавать персональные данные Пользователя третьим лицам в следующих случаях:</p>
                <ul class="list-none space-y-2 text-slate-700 pl-0">
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Пользователь явно выразил свое согласие на такие действия в письменной форме</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Передача необходима для достижения целей обработки персональных данных</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Передача предусмотрена российским или иным применимым законодательством</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Передача происходит в рамках продажи или иной передачи бизнеса (полностью или в части)</li>
                </ul>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">6. Срок обработки персональных данных</h2>
                <p class="text-slate-700 leading-relaxed">Персональные данные обрабатываются в течение срока, необходимого для достижения целей их обработки, а также в течение срока, установленного законодательством Российской Федерации. По достижении целей обработки или при отзыве согласия персональные данные подлежат уничтожению или обезличиванию.</p>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">7. Права субъекта персональных данных</h2>
                <p class="text-slate-700 leading-relaxed mb-4">В соответствии с Федеральным законом № 152-ФЗ «О персональных данных» Пользователь имеет право:</p>
                <ul class="list-none space-y-2 text-slate-700 pl-0">
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Требовать уточнения своих персональных данных, их блокирования или уничтожения</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Отозвать согласие на обработку персональных данных</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Получить информацию, касающуюся обработки его персональных данных</li>
                  <li class="flex items-start gap-2"><span class="w-1.5 h-1.5 bg-slate-900 mt-2 flex-shrink-0"></span>Обжаловать действия или бездействие Оператора в уполномоченный орган по защите прав субъектов персональных данных или в судебном порядке</li>
                </ul>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">8. Отзыв согласия</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Пользователь вправе отозвать свое согласие на обработку персональных данных, направив письменное уведомление Оператору по адресу:</p>
                @php $pdPhone = $settings->phone ?? '8 800 500 29 01'; $pdEmail = $settings->email ?? 'privacy@pkoadmiral.ru'; @endphp
                <div class="border border-slate-200 rounded-none p-6 bg-white mb-4">
                  <p class="text-slate-700 mb-2"><strong class="text-slate-900">Email:</strong> <a href="mailto:{{ $pdEmail }}" class="font-bold hover:opacity-80 transition-opacity" style="color: #ED3200;">{{ $pdEmail }}</a></p>
                  <p class="text-slate-700"><strong class="text-slate-900">Телефон:</strong> <a href="tel:{{ preg_replace('/\D/', '', $pdPhone) }}" class="font-bold hover:opacity-80 transition-opacity" style="color: #ED3200;">{{ $pdPhone }}</a></p>
                </div>
                <p class="text-slate-700 leading-relaxed">В случае отзыва согласия Оператор прекращает обработку персональных данных и уничтожает их в срок, не превышающий 30 дней с даты получения отзыва.</p>
              </section>

              <section class="border-b border-slate-200 pb-8">
                <h2 class="text-2xl font-bold tracking-tight font-serif mb-4 text-slate-900" style="color: #243468;">9. Меры по защите персональных данных</h2>
                <p class="text-slate-700 leading-relaxed mb-4">Оператор принимает все необходимые правовые, организационные и технические меры для защиты персональных данных от неправомерного или случайного доступа к ним, уничтожения, изменения, блокирования, копирования, распространения, а также от иных неправомерных действий.</p>
                <p class="text-slate-700 leading-relaxed">К таким мерам относятся: использование антивирусных средств защиты информации; применение необходимых средств защиты информации, прошедших процедуру оценки соответствия; использование криптографических средств защиты информации; назначение лица, ответственного за организацию обработки персональных данных; издание документов, определяющих политику Оператора в отношении обработки персональных данных; обучение работников Оператора, непосредственно осуществляющих обработку персональных данных.</p>
              </section>

              <section>
                <div class="border border-slate-200 border-l-4 border-l-slate-900 rounded-none p-6 bg-white">
                  <p class="font-bold uppercase tracking-wider text-slate-900 mb-2" style="color: #243468;">Подтверждение согласия</p>
                  <p class="text-slate-700">Используя Сайт и/или предоставляя свои персональные данные, вы подтверждаете, что ознакомились с настоящим Согласием и принимаете все его условия.</p>
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
