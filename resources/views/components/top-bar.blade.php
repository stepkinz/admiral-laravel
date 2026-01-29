@php
  $topInn = $settings->inn ?? '4170044007468';
  $topOgrn = $settings->ogrn ?? '1174170018970';
@endphp
{{-- TopBar: ИНН, ОГРН, реестр ФССП — из реквизитов --}}
<div class="bg-gray-800 text-white py-2 text-xs sm:text-sm">
  <div class="container mx-auto px-4 sm:px-6 lg:px-12">
    <div class="flex flex-wrap justify-center sm:justify-between gap-x-4 gap-y-1 items-center">
      <div class="flex items-center gap-x-4">
        @if($topInn)
        <a
          href="https://egrul.nalog.ru/"
          target="_blank"
          rel="noopener noreferrer"
          class="hover:underline transition-colors hover:text-gray-300"
          title="Проверить на nalog.ru"
        >
          ИНН: {{ $topInn }}
        </a>
        @endif
        @if($topOgrn)
        <a
          href="https://egrul.nalog.ru/"
          target="_blank"
          rel="noopener noreferrer"
          class="hover:underline transition-colors hover:text-gray-300"
          title="Проверить на nalog.ru"
        >
          ОГРН: {{ $topOgrn }}
        </a>
        @endif
      </div>
      @if($topInn)
      <a
        href="https://fssp.gov.ru/iss/ip"
        target="_blank"
        rel="noopener noreferrer"
        class="hover:underline font-medium transition-colors hover:text-gray-300"
      >
        Включены в реестр ФССП (№ {{ $topInn }})
      </a>
      @endif
    </div>
  </div>
</div>
