@php
  $aboutPhone = $settings->phone ?? '8 800 500 29 01';
  $aboutLegalName = $settings->legal_name ?? 'ООО ПКО «Адмирал»';
  $aboutOgrn = $settings->ogrn ?? '1234567890123';
  $aboutInn = $settings->inn ?? '4170044007468';
@endphp
<x-layouts.app title="О компании — ПКО Адмирал">
  <div class="min-h-screen bg-white text-slate-900">
    <x-top-bar />
    <x-header />

    <main>
      {{-- Hero — Swiss Legal style --}}
      <section class="border-b border-slate-200 swiss-pattern-dots relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10 z-[1]"></div>
        <div class="absolute top-20 left-0 w-1 h-32 bg-slate-900 opacity-5 z-[1]"></div>
        <div class="absolute bottom-20 right-0 w-1 h-32 bg-slate-900 opacity-5 z-[1]"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 py-20 lg:py-28 relative z-10">
          <div class="max-w-4xl mx-auto text-center">
            <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
              <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
              О компании
            </p>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight tracking-tight font-serif" style="color: #243468;">
              О компании ПКО «Адмирал»
            </h1>
            <p class="text-xl text-slate-700 max-w-2xl mx-auto font-light">
              Мы помогаем людям выйти из долговой ямы с минимальным стрессом и максимальной выгодой
            </p>
          </div>
        </div>
      </section>

      {{-- Mission — Swiss Legal style --}}
      <section class="py-16 md:py-24 relative bg-stone-50 border-b border-slate-200 swiss-pattern-lines">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="absolute top-1/2 left-0 w-1 h-40 bg-slate-900 opacity-5"></div>
        <div class="absolute bottom-0 right-0 w-40 h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="mb-12 text-center relative">
            <div class="absolute left-1/2 top-0 -translate-x-1/2 w-24 h-px bg-slate-900 opacity-10"></div>
            <div class="absolute left-1/2 bottom-0 -translate-x-1/2 w-24 h-px bg-slate-900 opacity-10"></div>
            <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
              <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
              Миссия
            </p>
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif mb-6" style="color: #243468;">Наша миссия</h2>
            <p class="text-lg text-slate-700 leading-relaxed max-w-3xl mx-auto">
              Мы верим, что <strong class="text-slate-900">долг — это не приговор</strong>. Это временная трудность, которую можно решить цивилизованно и с уважением к человеку. Наша цель — превратить коллекторскую компанию из «страшилки» в партнера, который действительно помогает.
            </p>
          </div>
          <div class="max-w-4xl mx-auto border border-slate-200 rounded-none bg-white p-8">
            <h3 class="text-xl font-bold tracking-tight font-serif mb-6 uppercase tracking-wider" style="color: #243468;">Почему мы отличаемся от других коллекторов?</h3>
            <ul class="space-y-4">
              @foreach([
                'Работаем БЕЗ угроз, давления и звонков родственникам',
                'Предлагаем реальные скидки и гибкие рассрочки',
                'Объясняем все условия простым языком',
                'Соблюдаем закон и уважаем права должников',
                'Помогаем найти выход, а не усугубляем ситуацию',
              ] as $item)
                <li class="flex items-start gap-3">
                  <span class="flex-shrink-0 mt-0.5 h-6 w-6 flex items-center justify-center border border-slate-900" aria-hidden="true">
                    <svg class="h-4 w-4 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                  </span>
                  <span class="text-slate-700">{{ $item }}</span>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </section>

      {{-- Values — Swiss Legal style --}}
      <section class="py-16 md:py-24 relative bg-white border-b border-slate-200 swiss-pattern-diagonal">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="absolute bottom-0 right-0 w-40 h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="mb-12 text-center relative">
            <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
              <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
              Принципы
            </p>
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif mb-4" style="color: #243468;">Наши ценности</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">Принципы, на которых строится наша работа</p>
          </div>
          <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-0 max-w-6xl mx-auto border border-slate-200 rounded-none">
            @foreach([
              ['title' => 'Честность и прозрачность', 'desc' => 'Никаких скрытых комиссий и двусмысленных условий. Мы работаем открыто и на основании закона.', 'icon' => 'shield'],
              ['title' => 'Уважение к клиентам', 'desc' => 'Мы понимаем, что долговая ситуация — это стресс. Поэтому общаемся без давления и агрессии.', 'icon' => 'users'],
              ['title' => 'Индивидуальный подход', 'desc' => 'Каждый случай уникален. Мы находим решение, которое подходит именно вам.', 'icon' => 'target'],
              ['title' => 'Профессионализм', 'desc' => 'Наша команда — опытные специалисты в области финансов и юриспруденции.', 'icon' => 'award'],
            ] as $i => $v)
              <div class="p-8 border-b md:border-b-0 md:border-r border-slate-200 last:border-r-0 bg-stone-50/50">
                <div class="h-14 w-14 rounded-none border border-slate-900 flex items-center justify-center mb-4">
                  @if($v['icon'] === 'shield')
                    <svg class="h-7 w-7 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                  @elseif($v['icon'] === 'users')
                    <svg class="h-7 w-7 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                  @elseif($v['icon'] === 'target')
                    <svg class="h-7 w-7 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                  @else
                    <svg class="h-7 w-7 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                  @endif
                </div>
                <h3 class="font-bold text-lg mb-3 uppercase tracking-wider text-slate-900" style="color: #243468;">{{ $v['title'] }}</h3>
                <p class="text-sm text-slate-700 leading-relaxed">{{ $v['desc'] }}</p>
              </div>
            @endforeach
          </div>
        </div>
      </section>

      {{-- Timeline — Swiss Legal style --}}
      <section class="py-16 md:py-24 relative bg-stone-50 border-b border-slate-200 swiss-pattern-lines">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="mb-12 text-center relative">
            <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
              <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
              Хронология
            </p>
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif mb-4" style="color: #243468;">История компании</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">Путь от стартапа до одного из лидеров отрасли</p>
          </div>
          <div class="max-w-4xl mx-auto relative">
            {{-- Вертикальная линия таймлайна --}}
            <div class="absolute left-8 top-6 bottom-6 w-px bg-gradient-to-b from-slate-300 via-slate-200 to-slate-300 hidden sm:block" aria-hidden="true"></div>
            @foreach([
              ['year' => '2019', 'title' => 'Основание компании', 'desc' => ($aboutLegalName) . ' было создано с целью помочь должникам решить финансовые проблемы.'],
              ['year' => '2020', 'title' => 'Получение лицензии ФССП', 'desc' => 'Компания включена в государственный реестр юридических лиц, осуществляющих деятельность по возврату просроченной задолженности.'],
              ['year' => '2021–2023', 'title' => 'Расширение географии', 'desc' => 'Открытие представительств в 200+ городах России. Помощь тысячам клиентов.'],
              ['year' => '2024–2026', 'title' => 'Лидер отрасли', 'desc' => 'Более 1 млн довольных клиентов. Один из самых лояльных коллекторов на рынке.'],
            ] as $index => $item)
              <div class="relative flex items-start gap-6 sm:gap-8 py-8 sm:py-10 {{ $index > 0 ? 'border-t border-slate-200/80' : '' }}">
                <div class="flex-shrink-0 relative z-10 h-14 w-14 sm:h-16 sm:w-16 rounded-full bg-white border-2 border-slate-900 flex items-center justify-center font-bold text-[10px] sm:text-xs text-slate-900 shadow-sm ring-4 ring-stone-50 text-center leading-tight px-0.5">{{ $item['year'] }}</div>
                <div class="flex-1 min-w-0 pt-1">
                  <h3 class="text-base sm:text-lg font-bold uppercase tracking-wider mb-2 text-slate-900" style="color: #243468;">{{ $item['title'] }}</h3>
                  <p class="text-slate-600 text-sm sm:text-base leading-relaxed">{{ $item['desc'] }}</p>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>

      {{-- Licenses — Swiss Legal style --}}
      <section class="py-16 md:py-24 relative bg-white border-b border-slate-200 swiss-pattern-diagonal">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="mb-12 text-center relative">
            <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
              <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
              Документы
            </p>
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif mb-4" style="color: #243468;">Лицензии и документы</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">Мы работаем полностью легально и прозрачно</p>
          </div>
          <div class="max-w-3xl mx-auto grid md:grid-cols-2 gap-0 border border-slate-200 rounded-none overflow-hidden mb-10">
            <div class="p-8 bg-stone-50/50 border-b md:border-b-0 md:border-r border-slate-200">
              <div class="h-12 w-12 rounded-none border border-slate-900 flex items-center justify-center mb-4">
                <svg class="h-6 w-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
              </div>
              <h3 class="font-bold text-lg uppercase tracking-wider mb-2 text-slate-900" style="color: #243468;">Лицензия ФССП</h3>
              <p class="text-xl font-bold mb-2" style="color: #ED3200;">№ {{ $aboutInn }}</p>
              <p class="text-sm text-slate-600">Государственный реестр юридических лиц</p>
            </div>
            <div class="p-8 bg-stone-50/50">
              <div class="h-12 w-12 rounded-none border border-slate-900 flex items-center justify-center mb-4">
                <svg class="h-6 w-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
              </div>
              <h3 class="font-bold text-lg uppercase tracking-wider mb-2 text-slate-900" style="color: #243468;">{{ $aboutLegalName }}</h3>
              <p class="text-xl font-bold mb-2" style="color: #ED3200;">ОГРН: {{ $aboutOgrn }}</p>
              <p class="text-sm text-slate-600">Официально зарегистрированная компания</p>
            </div>
          </div>
          <div class="max-w-3xl mx-auto flex justify-center">
            <x-verify-license />
          </div>
        </div>
      </section>

      {{-- CTA — как final-cta --}}
      <section class="py-20 text-slate-900 relative bg-white border-b border-slate-200 swiss-pattern-diagonal">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 tracking-tight font-serif" style="color: #243468;">Готовы начать решать проблему?</h2>
            <p class="text-lg text-slate-700 mb-8">Свяжитесь с нами сегодня, и мы найдем для вас оптимальное решение</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
              <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-6 text-base font-bold text-white rounded-none uppercase tracking-wider transition-opacity hover:opacity-90" style="background-color: #ED3200;">Связаться с нами</a>
              <a href="tel:{{ preg_replace('/\D/', '', $aboutPhone) }}" class="inline-flex items-center justify-center px-8 py-6 text-base font-bold border-2 border-slate-900 text-slate-900 rounded-none uppercase tracking-wider hover:bg-slate-50 transition-colors">{{ $aboutPhone }}</a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <x-footer />
  </div>
</x-layouts.app>
