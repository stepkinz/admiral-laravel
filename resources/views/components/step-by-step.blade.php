{{-- StepByStep — Swiss Legal / Authority стиль как на главной --}}
@php
  $steps = [
    ['num' => '01', 'title' => 'Бесплатная консультация', 'desc' => 'Вы оставляете заявку. Наш юрист связывается с вами без какого-либо давления или продаж. Вы получаете честный правовой анализ ситуации и 1-2 варианта решения. Только после этого вы решаете, имеет ли смысл продолжать. Эта первая консультация бесплатна и ни к чему вас не обязывает.', 'last' => false],
    ['num' => '02', 'title' => 'Анализ ситуации', 'desc' => 'Наш юрист изучает ваши документы (договоры, графики), чтобы найти законные основания для начала переговоров и фиксации долга.', 'last' => false],
    ['num' => '03', 'title' => 'План решения', 'desc' => 'Мы готовим и согласовываем с вами 1-2 варианта решения (например, фиксация долга с новым графиком) и получаем от вас доверенность на ведение переговоров.', 'last' => false],
    ['num' => '04', 'title' => 'Переговоры и результат', 'desc' => 'Это наша работа. Мы сами ведем диалог с кредиторами от вашего имени. Вы защищены от звонков. Результат — фиксация долга и комфортный график платежей.', 'last' => true],
  ];
@endphp
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
        Процесс
      </p>
      <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif" style="color: #243468;">
        4 простых шага к решению вашего вопроса
      </h2>
    </div>
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-0 border border-slate-200 rounded-none">
      @foreach($steps as $step)
        <div class="p-8 border-b lg:border-b-0 lg:border-r border-slate-200 last:border-r-0 bg-white {{ $step['last'] ? 'border-l-4 border-l-slate-900' : '' }}">
          <div class="flex justify-between items-start mb-4">
            <span class="font-bold text-4xl tracking-tight text-slate-900" style="color: #243468;">{{ $step['num'] }}</span>
            @if($step['last'])
              <span class="flex items-center justify-center h-10 w-10 rounded-none border border-slate-900" aria-hidden="true">
                <svg class="h-6 w-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              </span>
            @endif
          </div>
          <h3 class="text-base font-bold mb-3 uppercase tracking-wider text-slate-900">{{ $step['title'] }}</h3>
          <p class="text-slate-700 text-sm leading-relaxed">{{ $step['desc'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
