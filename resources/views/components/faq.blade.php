@props(['faqs'])

{{-- FAQ Section — 1:1 из Next.js LandingContent (аккордеон) --}}
<section class="py-20 relative bg-stone-50 border-b border-slate-200 swiss-pattern-lines">
  <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
  <div class="absolute top-1/2 left-0 w-1 h-32 bg-slate-900 opacity-5"></div>
  <div class="absolute bottom-0 right-0 w-40 h-1 bg-slate-900 opacity-10"></div>
  <div class="container mx-auto px-4 relative z-10">
    <div class="text-center mb-16 relative">
      <div class="absolute left-1/2 top-0 -translate-x-1/2 w-24 h-px bg-slate-900 opacity-10"></div>
      <div class="absolute left-1/2 bottom-0 -translate-x-1/2 w-24 h-px bg-slate-900 opacity-10"></div>
      <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
        Часто задаваемые вопросы
      </p>
      <h2 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight font-serif" style="color: #243468;">Частые вопросы</h2>
      <p class="text-base max-w-2xl mx-auto text-slate-700 font-light">Ответы на самые популярные вопросы о работе с задолженностью</p>
    </div>

    @if($faqs->isEmpty())
      <p class="text-center text-slate-500 py-8 max-w-3xl mx-auto">Вопросов пока нет</p>
    @else
      <div class="max-w-3xl mx-auto bg-white border border-slate-200 rounded-none" x-data="{ active: null }">
        @foreach($faqs as $index => $faq)
          <div class="border-b last:border-b-0 border-slate-200">
            <button
              type="button"
              @click="active = (active === {{ $index }} ? null : {{ $index }})"
              class="text-left w-full px-8 py-6 font-medium text-slate-900 hover:bg-stone-50 flex justify-between items-center transition"
            >
              <span>{{ $faq->question }}</span>
              <span class="shrink-0 ml-2 text-slate-500" x-text="active === {{ $index }} ? '−' : '+'"></span>
            </button>
            <div x-show="active === {{ $index }}" x-cloak class="overflow-hidden" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
              <div class="px-8 pb-6 leading-relaxed text-slate-700 font-light">{{ $faq->answer }}</div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>
