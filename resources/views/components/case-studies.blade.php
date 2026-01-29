{{-- CaseStudies — Swiss Legal / Authority стиль как на главной --}}
@php
  $cases = [
    ['name' => 'Алина К.', 'type' => 'Кредитная карта, 180 000 ₽', 'before' => ['debt' => '180 000 ₽ (Росла из-за штрафов)', 'payment' => '25 000 ₽/мес (Неподъемный)', 'communication' => 'Ежедневные звонки, угрозы'], 'after' => ['debt' => '185 000 ₽ (Сумма зафиксирована)', 'payment' => '8 000 ₽/мес (Комфортный график)', 'communication' => '0 звонков. Общение через юриста.']],
    ['name' => 'Виктор Н.', 'type' => '3 МФО, общая сумма 95 000 ₽', 'before' => ['debt' => '95 000 ₽ (Проценты 2% в день)', 'payment' => 'Требовали вернуть все сразу', 'communication' => 'Звонки на работу, родным'], 'after' => ['debt' => '110 000 ₽ (Сумма зафиксирована)', 'payment' => '10 000 ₽/мес (График на 11 мес.)', 'communication' => '0 звонков. Все контакты прекращены.']],
  ];
@endphp
<section class="py-16 md:py-24 relative bg-white border-b border-slate-200 swiss-pattern-diagonal">
  <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
  <div class="absolute top-1/2 left-0 w-1 h-40 bg-slate-900 opacity-5"></div>
  <div class="absolute bottom-0 right-0 w-40 h-1 bg-slate-900 opacity-10"></div>
  <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
    <div class="mb-12 text-center relative">
      <div class="absolute left-1/2 top-0 -translate-x-1/2 w-24 h-px bg-slate-900 opacity-10"></div>
      <div class="absolute left-1/2 bottom-0 -translate-x-1/2 w-24 h-px bg-slate-900 opacity-10"></div>
      <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
        Кейсы
      </p>
      <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif" style="color: #243468;">
        Примеры ситуаций, которые мы решили
      </h2>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 max-w-5xl mx-auto border border-slate-200 rounded-none">
      @foreach($cases as $index => $caseItem)
        <div class="p-8 {{ $index === 0 ? 'lg:border-r border-b lg:border-b-0' : '' }} border-slate-200 bg-white">
          <h3 class="text-base font-bold mb-4 uppercase tracking-wider text-slate-900">Клиент: {{ $caseItem['name'] }} ({{ $caseItem['type'] }})</h3>
          <div class="overflow-x-auto">
            <table class="w-full text-left text-sm border-collapse">
              <thead>
                <tr class="border-b-2 border-slate-200">
                  <th class="py-2 pr-4 font-semibold text-slate-700 uppercase tracking-wider text-xs">Параметр</th>
                  <th class="py-2 pr-4 font-semibold text-red-700 uppercase tracking-wider text-xs">Ситуация «До»</th>
                  <th class="py-2 font-semibold text-green-700 uppercase tracking-wider text-xs">Результат «После»</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b border-slate-100">
                  <td class="py-3 pr-4 font-medium text-slate-700">Сумма долга</td>
                  <td class="py-3 pr-4 text-slate-600">{{ $caseItem['before']['debt'] }}</td>
                  <td class="py-3 text-slate-900 font-medium">{{ $caseItem['after']['debt'] }}</td>
                </tr>
                <tr class="border-b border-slate-100">
                  <td class="py-3 pr-4 font-medium text-slate-700">Ежемес. платеж</td>
                  <td class="py-3 pr-4 text-slate-600">{{ $caseItem['before']['payment'] }}</td>
                  <td class="py-3 text-slate-900 font-medium">{{ $caseItem['after']['payment'] }}</td>
                </tr>
                <tr>
                  <td class="py-3 pr-4 font-medium text-slate-700">Общение</td>
                  <td class="py-3 pr-4 text-slate-600">{{ $caseItem['before']['communication'] }}</td>
                  <td class="py-3 text-slate-900 font-medium">{{ $caseItem['after']['communication'] }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
