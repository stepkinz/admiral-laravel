<x-layouts.app title="Юридическая информация — ПКО Адмирал">
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
              Документы
            </p>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight tracking-tight font-serif" style="color: #243468;">
              Юридическая информация
            </h1>
            <p class="text-xl text-slate-700 max-w-2xl mx-auto font-light">
              Прозрачность и законность — основа нашей работы. Здесь вы найдете все важные юридические документы.
            </p>
          </div>
        </div>
      </section>

      {{-- Doc cards — Swiss Legal style --}}
      <section class="py-16 md:py-24 relative bg-stone-50 border-b border-slate-200 swiss-pattern-lines">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="absolute bottom-0 right-0 w-40 h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="grid md:grid-cols-3 gap-0 max-w-5xl mx-auto border border-slate-200 rounded-none overflow-hidden mb-16">
            <a href="{{ route('legal.privacy') }}" class="block group p-8 bg-white border-b md:border-b-0 md:border-r border-slate-200 last:border-r-0 hover:bg-stone-50/80 transition-colors">
              <div class="h-14 w-14 rounded-none border border-slate-900 flex items-center justify-center mb-4 group-hover:border-slate-700 transition-colors">
                <svg class="h-7 w-7 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
              </div>
              <h3 class="font-bold text-lg mb-3 uppercase tracking-wider text-slate-900 group-hover:opacity-80 transition-opacity" style="color: #243468;">Политика конфиденциальности</h3>
              <p class="text-sm text-slate-700 leading-relaxed mb-4">Информация о том, как мы собираем, храним и защищаем ваши персональные данные</p>
              <span class="inline-flex items-center text-sm font-bold uppercase tracking-wider" style="color: #ED3200;">
                Читать документ
                <svg class="ml-2 h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
              </span>
            </a>
            <a href="{{ route('legal.terms') }}" class="block group p-8 bg-white border-b md:border-b-0 md:border-r border-slate-200 last:border-r-0 hover:bg-stone-50/80 transition-colors">
              <div class="h-14 w-14 rounded-none border border-slate-900 flex items-center justify-center mb-4 group-hover:border-slate-700 transition-colors">
                <svg class="h-7 w-7 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
              </div>
              <h3 class="font-bold text-lg mb-3 uppercase tracking-wider text-slate-900 group-hover:opacity-80 transition-opacity" style="color: #243468;">Пользовательское соглашение</h3>
              <p class="text-sm text-slate-700 leading-relaxed mb-4">Условия использования нашего сайта и правила взаимодействия с пользователями</p>
              <span class="inline-flex items-center text-sm font-bold uppercase tracking-wider" style="color: #ED3200;">
                Читать документ
                <svg class="ml-2 h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
              </span>
            </a>
            <a href="{{ route('legal.personal-data') }}" class="block group p-8 bg-white hover:bg-stone-50/80 transition-colors">
              <div class="h-14 w-14 rounded-none border border-slate-900 flex items-center justify-center mb-4 group-hover:border-slate-700 transition-colors">
                <svg class="h-7 w-7 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
              </div>
              <h3 class="font-bold text-lg mb-3 uppercase tracking-wider text-slate-900 group-hover:opacity-80 transition-opacity" style="color: #243468;">Согласие на обработку персональных данных</h3>
              <p class="text-sm text-slate-700 leading-relaxed mb-4">Подробная информация о ваших правах и условиях обработки персональных данных</p>
              <span class="inline-flex items-center text-sm font-bold uppercase tracking-wider" style="color: #ED3200;">
                Читать документ
                <svg class="ml-2 h-4 w-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
              </span>
            </a>
          </div>

          {{-- Legal notice block — Swiss Legal style --}}
          <div class="max-w-5xl mx-auto border border-slate-200 rounded-none p-8 bg-white">
            <div class="flex items-start gap-6">
              <div class="h-12 w-12 rounded-none border-2 border-slate-900 flex items-center justify-center flex-shrink-0">
                <svg class="h-6 w-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
              </div>
              <div class="flex-1">
                <h3 class="text-xl font-bold uppercase tracking-wider mb-2 text-slate-900" style="color: #243468;">Мы работаем легально</h3>
                <p class="text-slate-700 mb-4 leading-relaxed">{{ $settings->legal_name ?? 'ООО ПКО «Адмирал»' }} включено в государственный реестр ФССП (№ {{ $settings->inn ?? '4170044007468' }}) и осуществляет деятельность по возврату просроченной задолженности в строгом соответствии с законодательством Российской Федерации.</p>
                <div class="grid sm:grid-cols-2 gap-4">
                  <div class="flex items-center gap-2 text-sm">
                    <span class="w-2 h-2 bg-slate-900"></span>
                    <span class="text-slate-700">Федеральный закон № 230-ФЗ</span>
                  </div>
                  <div class="flex items-center gap-2 text-sm">
                    <span class="w-2 h-2 bg-slate-900"></span>
                    <span class="text-slate-700">Федеральный закон № 152-ФЗ</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- CTA contact — Swiss Legal style --}}
          <div class="max-w-5xl mx-auto mt-10 border border-slate-200 rounded-none p-8 bg-stone-50/50 text-center">
            <p class="text-slate-700 mb-4">Есть вопросы по юридическим документам?</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
              <a href="mailto:{{ $settings->email ?? 'legal@pkoadmiral.ru' }}" class="font-bold uppercase tracking-wider hover:opacity-80 transition-opacity" style="color: #ED3200;">{{ $settings->email ?? 'legal@pkoadmiral.ru' }}</a>
              <span class="hidden sm:inline text-slate-300">|</span>
              <a href="tel:{{ preg_replace('/\D/', '', $settings->phone ?? '88005002901') }}" class="font-bold uppercase tracking-wider hover:opacity-80 transition-opacity" style="color: #ED3200;">{{ $settings->phone ?? '8 800 500 29 01' }}</a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <x-footer />
  </div>
</x-layouts.app>
