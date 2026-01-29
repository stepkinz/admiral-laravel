@php
  $verifyInn = $settings->inn ?? '4170044007468';
@endphp
{{-- VerifyLicense — ИНН из реквизитов --}}
<div class="bg-blue-50 p-6 sm:p-8 rounded-xl shadow-lg border border-blue-200 sticky top-24" x-data="{ copied: false }">
  <h3 class="text-2xl font-bold text-primary mb-4">
    Проверьте нашу лицензию в реестре ФССП за 30 секунд
  </h3>
  <p class="text-gray-700 mb-5">
    Мы работаем официально. Вот как это проверить:
  </p>

  <div class="space-y-4">
    <div class="flex items-start gap-3">
      <div class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">1</div>
      <div class="flex-1">
        <p class="text-gray-700">Наш ИНН: <strong class="text-gray-900">{{ $verifyInn }}</strong></p>
        <button
          type="button"
          @click="navigator.clipboard.writeText('{{ $verifyInn }}'); copied = true; setTimeout(() => copied = false, 2000)"
          class="text-sm text-primary font-medium hover:underline mt-1 flex items-center gap-1"
        >
          <span x-show="copied" x-cloak class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg> Скопировано!</span>
          <span x-show="!copied">Скопировать ИНН</span>
        </button>
      </div>
    </div>
    <div class="flex items-start gap-3">
      <div class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">2</div>
      <div class="flex-1">
        <p class="text-gray-700">
          Нажмите на
          <a href="https://fssp.gov.ru/iss/ip" target="_blank" rel="noopener noreferrer" class="font-bold text-primary underline hover:text-primary/80 transition-colors">эту официальную ссылку</a>,
          чтобы открыть государственный портал ФССП.
        </p>
      </div>
    </div>
    <div class="flex items-start gap-3">
      <div class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">3</div>
      <div class="flex-1">
        <p class="text-gray-700">
          На сайте ФССП выберите вкладку "Поиск по ИНН юридического лица", вставьте наш ИНН и нажмите "Найти".
        </p>
      </div>
    </div>
  </div>
</div>
