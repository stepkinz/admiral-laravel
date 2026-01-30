@php
  $contactPhone = $settings->phone ?? '8 800 500 29 01';
  $contactEmail = $settings->email ?? 'info@pkoadmiral.ru';
  $contactAddress = $settings->address ?? 'Россия, работаем по всей стране';
  $contactWorkSchedule = $settings->work_schedule ?? null;
  $workScheduleLines = $contactWorkSchedule ? array_map('trim', explode("\n", $contactWorkSchedule)) : [];
@endphp
<x-layouts.app title="Контакты — ПКО Адмирал">
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
              Контакты
            </p>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight tracking-tight font-serif" style="color: #243468;">
              Свяжитесь с нами
            </h1>
            <p class="text-xl text-slate-700 max-w-2xl mx-auto font-light">
              Мы готовы ответить на ваши вопросы и помочь найти решение
            </p>
          </div>
        </div>
      </section>

      {{-- Contact cards — Swiss Legal style --}}
      <section class="py-16 md:py-24 relative bg-stone-50 border-b border-slate-200 swiss-pattern-lines">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="absolute bottom-0 right-0 w-40 h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-0 max-w-6xl mx-auto border border-slate-200 rounded-none overflow-hidden">
            <div class="p-8 bg-white border-b sm:border-b-0 sm:border-r border-slate-200 last:border-r-0 flex flex-col items-center text-center">
              <div class="h-12 w-12 rounded-none border border-slate-900 flex items-center justify-center mb-4">
                <svg class="h-6 w-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
              </div>
              <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Телефон</h3>
              <a href="tel:{{ preg_replace('/\D/', '', $contactPhone) }}" class="font-bold text-slate-900 hover:opacity-80 transition-opacity mb-1" style="color: #243468;">{{ $contactPhone }}</a>
              <p class="text-xs text-slate-600">Звонок по России бесплатный</p>
            </div>
            <div class="p-8 bg-white border-b sm:border-b-0 sm:border-r border-slate-200 last:border-r-0 flex flex-col items-center text-center">
              <div class="h-12 w-12 rounded-none border border-slate-900 flex items-center justify-center mb-4">
                <svg class="h-6 w-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              </div>
              <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Email</h3>
              <a href="mailto:{{ $contactEmail }}" class="font-bold text-slate-900 hover:opacity-80 transition-opacity mb-1" style="color: #243468;">{{ $contactEmail }}</a>
              <p class="text-xs text-slate-600">Ответим в течение 24 часов</p>
            </div>
            <div class="p-8 bg-white border-b sm:border-b-0 sm:border-r border-slate-200 last:border-r-0 flex flex-col items-center text-center">
              <div class="h-12 w-12 rounded-none border border-slate-900 flex items-center justify-center mb-4">
                <svg class="h-6 w-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              </div>
              <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Адрес</h3>
              <p class="font-bold text-slate-900 mb-1" style="color: #243468;">{{ $contactAddress }}</p>
              <p class="text-xs text-slate-600">200+ городов</p>
            </div>
            <div class="p-8 bg-white flex flex-col items-center text-center">
              <div class="h-12 w-12 rounded-none border border-slate-900 flex items-center justify-center mb-4">
                <svg class="h-6 w-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              </div>
              <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Режим работы</h3>
              @if(!empty($workScheduleLines))
                <p class="font-bold text-slate-900 mb-1" style="color: #243468;">{{ $workScheduleLines[0] }}</p>
                @foreach(array_slice($workScheduleLines, 1) as $line)
                  <p class="text-xs text-slate-600">{{ $line }}</p>
                @endforeach
              @else
                <p class="text-slate-600 text-sm">Указан в разделе «Реквизиты»</p>
              @endif
            </div>
          </div>
        </div>
      </section>

      {{-- Contact form — Swiss Legal style --}}
      <section class="py-16 md:py-24 relative bg-white border-b border-slate-200 swiss-pattern-diagonal">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="max-w-3xl mx-auto">
            <div class="mb-12 text-center relative">
              <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
                <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
                Заявка
              </p>
              <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif mb-4" style="color: #243468;">Оставьте заявку</h2>
              <p class="text-slate-600">Заполните форму ниже, и наш специалист свяжется с вами в ближайшее время</p>
            </div>
            <div class="border border-slate-200 rounded-none bg-stone-50/50 p-8">
              <form action="{{ route('leads.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                  <label for="contact_phone" class="block text-sm font-bold uppercase tracking-wider text-slate-700 mb-1">Ваш телефон</label>
                  <input type="tel" name="phone" id="contact_phone" required placeholder="+7 (999) 123-45-67" class="w-full rounded-none border border-slate-300 px-4 py-3 text-lg focus:ring-2 focus:ring-slate-900 focus:border-slate-900" />
                  @error('phone')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                  <label for="contact_name" class="block text-sm font-bold uppercase tracking-wider text-slate-700 mb-1">Имя</label>
                  <input type="text" name="name" id="contact_name" required placeholder="Ваше имя" class="w-full rounded-none border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-slate-900 focus:border-slate-900" />
                  @error('name')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                  <x-consent-checkbox id="contact_personal_data_consent" name="personal_data_consent" />
                </div>
                <button type="submit" class="w-full text-white text-base font-bold py-4 rounded-none uppercase tracking-wider transition-opacity hover:opacity-90" style="background-color: #ED3200;">Получить бесплатный разбор</button>
              </form>
              <p class="text-xs text-slate-600 text-center mt-4">Ваш номер нужен <strong class="text-slate-900">только</strong> для разбора ситуации юристом. Мы никому не передаем данные.</p>
            </div>
          </div>
        </div>
      </section>

      <x-phone-checker />

      {{-- Map placeholder — Swiss Legal style --}}
      <section class="py-16 md:py-24 relative bg-stone-50 border-b border-slate-200 swiss-pattern-lines">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="max-w-5xl mx-auto">
            <div class="mb-12 text-center relative">
              <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
                <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
                География
              </p>
              <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif mb-4" style="color: #243468;">Мы работаем по всей России</h2>
              <p class="text-slate-600">Более 200 городов в 85 регионах страны</p>
            </div>
            <div class="aspect-video bg-slate-200 border border-slate-200 rounded-none overflow-hidden flex items-center justify-center text-slate-600">
              <div class="text-center">
                <div class="h-16 w-16 rounded-none border-2 border-slate-900 flex items-center justify-center mx-auto mb-4">
                  <svg class="h-8 w-8 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                </div>
                <p class="text-lg font-bold uppercase tracking-wider text-slate-900">Карта офисов</p>
                <p class="text-sm text-slate-600">(будет добавлена позже)</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <x-footer />

    @if(session('lead_success'))
      <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 5000)"
        x-transition
        class="fixed bottom-5 right-5 text-white p-4 rounded-none shadow-lg z-50 border-l-4 border-slate-900"
        style="background-color: #243468;"
      >
        Заявка отправлена. Мы свяжемся с вами в ближайшее время.
      </div>
    @endif
  </div>
</x-layouts.app>
