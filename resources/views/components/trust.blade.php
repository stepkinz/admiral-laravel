{{-- Trust Block — 1:1 из Next.js LandingContent (Гарантии + VerifyLicense) --}}
<section class="py-16 md:py-24 relative bg-white border-b border-slate-200 swiss-pattern-diagonal">
  <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
  <div class="absolute top-1/2 left-0 w-1 h-40 bg-slate-900 opacity-5"></div>
  <div class="absolute bottom-0 right-0 w-40 h-1 bg-slate-900 opacity-10"></div>
  <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
    <div class="mb-12 text-center relative">
      <div class="absolute left-1/2 top-0 -translate-x-1/2 w-24 h-px bg-slate-900 opacity-10"></div>
      <div class="absolute left-1/2 bottom-0 -translate-x-1/2 w-24 h-px bg-slate-900 opacity-10"></div>
      <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 swiss-decorative-line pl-20">
        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
        Правовая Основа
      </p>
      <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif" style="color: #243468;">
        Работаем только в "белом" правовом поле
      </h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 border border-slate-200 rounded-none">
      <div class="space-y-0 border-r border-slate-200">
        <div class="p-8 bg-white border-b border-slate-200">
          <h4 class="text-base font-bold mb-4 uppercase tracking-wider" style="color: #243468;">
            Работаем строго по ФЗ-230. Это закон, защищающий вас:
          </h4>
          <div class="grid grid-cols-2 gap-6 text-sm pt-4 border-t border-slate-200">
            <div>
              <h5 class="font-bold text-slate-900 mb-2 text-xs uppercase tracking-wider">Без нас (Нельзя):</h5>
              <ul class="list-none text-slate-700 space-y-2 text-sm">
                <li>— Звонки ночью</li>
                <li>— Угрозы</li>
                <li>— Давление на родных</li>
                <li>— Раскрытие данных</li>
              </ul>
            </div>
            <div>
              <h5 class="font-bold text-slate-900 mb-2 text-xs uppercase tracking-wider">С нами (Можно):</h5>
              <ul class="list-none text-slate-700 space-y-2 text-sm">
                <li>— Офиц. общение</li>
                <li>— Только через юриста</li>
                <li>— В рабочее время</li>
                <li>— Соблюдение прав</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="p-8 bg-stone-50 border-b border-slate-200">
          <h4 class="text-base font-bold mb-3 uppercase tracking-wider" style="color: #243468;">Включены в реестр ФССП</h4>
          <p class="text-slate-700 text-sm leading-relaxed">
            Мы — официальная компания, имеющая право вести деятельность по возврату
            просроченной задолженности (ФЗ-230). Это наша лицензия.
          </p>
        </div>
        <div class="p-8 bg-white">
          <h4 class="text-base font-bold mb-3 uppercase tracking-wider" style="color: #243468;">Физический офис</h4>
          <p class="text-slate-700 text-sm leading-relaxed">
            У нас есть реальный офис, куда вы всегда можете прийти. Мы не
            компания-"однодневка".
          </p>
        </div>
      </div>
      <div class="bg-stone-50">
        <x-verify-license />
      </div>
    </div>
  </div>
</section>
