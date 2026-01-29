{{-- TeamSection — Swiss Legal / Authority стиль как на главной --}}
@php
  $team = [
    ['name' => 'Иван Иванов', 'position' => 'Ведущий юрист по досудебному урегулированию', 'quote' => '"Моя задача — найти в договоре законные основания для фиксации долга и защитить вас от неправомерных действий."', 'stats' => ['experience' => '150+ успешных переговоров', 'specialization' => 'ФЗ-230, реструктуризация', 'successRate' => '95% дел'], 'imagePlaceholder' => 'И.И.'],
    ['name' => 'Мария Петрова', 'position' => 'Руководитель отдела переговоров', 'quote' => '"Мы ведем диалог с банками на их языке. Спокойно, аргументированно и с опорой на закон. Ваше участие не требуется."', 'stats' => ['experience' => '8 лет в банковской сфере', 'specialization' => 'Переговоры с МФО, кредитные каникулы', 'successRate' => '92% дел'], 'imagePlaceholder' => 'М.П.'],
    ['name' => 'Сергей Смирнов', 'position' => 'Юрист по работе с ФССП', 'quote' => '"Даже если дело дошло до приставов, есть законные способы снизить нагрузку. Главное — не прятаться."', 'stats' => ['experience' => '200+ закрытых испол. производств', 'specialization' => 'Отмена судебных приказов, работа с ФССП', 'successRate' => '90% дел'], 'imagePlaceholder' => 'С.С.'],
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
        Команда
      </p>
      <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif" style="color: #243468;">
        С вами будут работать эти специалисты
      </h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-0 max-w-6xl mx-auto border border-slate-200 rounded-none">
      @foreach($team as $index => $member)
        <div class="p-8 border-b border-slate-200 md:border-r {{ $index < 2 ? 'md:border-b' : 'md:border-b-0' }} last:border-r-0 last:border-b-0 bg-white">
          <div class="h-24 w-24 rounded-none border-2 border-slate-200 bg-slate-100 flex items-center justify-center mb-5">
            <span class="text-2xl font-bold tracking-tight text-slate-900" style="color: #243468;">{{ $member['imagePlaceholder'] }}</span>
          </div>
          <h3 class="text-base font-bold uppercase tracking-wider text-slate-900 mb-1">{{ $member['name'] }}</h3>
          <p class="text-sm font-medium text-slate-600 mb-3" style="color: #243468;">{{ $member['position'] }}</p>
          <div class="border-l-4 border-slate-900 bg-slate-50 pl-4 py-2 mb-4">
            <p class="text-slate-700 text-sm italic leading-relaxed">{{ $member['quote'] }}</p>
          </div>
          <div class="border border-slate-200 p-4 rounded-none text-sm space-y-2 bg-white">
            <p class="text-slate-700"><strong class="uppercase tracking-wider text-xs text-slate-500">В практике:</strong> {{ $member['stats']['experience'] }}</p>
            <p class="text-slate-700"><strong class="uppercase tracking-wider text-xs text-slate-500">Специализация:</strong> {{ $member['stats']['specialization'] }}</p>
            <p class="text-slate-700"><strong class="uppercase tracking-wider text-xs text-slate-500">Средний % фиксации:</strong> {{ $member['stats']['successRate'] }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
