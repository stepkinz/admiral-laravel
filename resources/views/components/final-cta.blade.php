@php
  $ctaPhone = $settings->phone ?? '8 800 500 29 01';
@endphp
{{-- Final CTA Block — 1:1 из Next.js LandingContent.tsx --}}
<section class="py-20 text-slate-900 relative bg-white border-b border-slate-200 swiss-pattern-diagonal">
  <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
  <div class="absolute top-1/3 left-0 w-24 h-px bg-slate-900 opacity-10"></div>
  <div class="absolute bottom-1/3 right-0 w-24 h-px bg-slate-900 opacity-10"></div>
  <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-32 h-1 bg-slate-900 opacity-10"></div>
  <div class="container mx-auto px-4 text-center relative z-10">
    <div class="max-w-3xl mx-auto">
      <p class="text-xs tracking-widest font-medium mb-8 uppercase text-slate-500">Начните Прямо Сейчас</p>
      <h2 class="text-3xl md:text-4xl font-bold mb-6 tracking-tight font-serif" style="color: #243468;">
        Первый шаг к решению проблемы —<br />
        просто позвонить нам
      </h2>
      <p class="text-lg mb-12 text-slate-700 font-light">
        Наши специалисты работают ежедневно и готовы помочь вам найти оптимальное решение
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a
          href="tel:{{ preg_replace('/\D/', '', $ctaPhone) }}"
          class="inline-flex items-center justify-center text-white font-bold text-base px-10 py-6 rounded-none shadow-none uppercase tracking-wider hover:opacity-90 transition-opacity"
          style="background-color: #ED3200;"
        >
          <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
          {{ $ctaPhone }}
        </a>
        <button
          type="button"
          @click="$dispatch('open-lead-modal')"
          class="font-bold text-base px-10 py-6 rounded-none bg-white text-slate-900 border-2 border-slate-900 hover:bg-slate-900 hover:text-white uppercase tracking-wider shadow-none transition-colors"
        >
          Заказать звонок
        </button>
      </div>
    </div>
  </div>
</section>
