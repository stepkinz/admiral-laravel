{{-- Footer: данные из $settings (админка → Реквизиты) --}}
@php
  $footerPhone = $settings->phone ?? '8 800 500 29 01';
  $footerEmail = $settings->email ?? 'info@pkoadmiral.ru';
  $footerAddress = $settings->address ?? 'г. Москва, ул. Тверская, д. 1';
  $footerLegalName = $settings->legal_name ?? 'ООО ПКО «Адмирал»';
  $footerInn = $settings->inn ?? '4170044007468';
  $footerOgrn = $settings->ogrn ?? '1174170018970';
@endphp
<footer class="bg-gray-800 text-gray-300">
  <div class="container mx-auto px-4 sm:px-6 lg:px-12 py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="space-y-3">
        <h5 class="font-bold text-white text-lg mb-2">
          {{ $footerLegalName }}
        </h5>
        @if($footerInn)<p class="text-sm">ИНН: {{ $footerInn }}</p>@endif
        @if($footerOgrn)<p class="text-sm">ОГРН: {{ $footerOgrn }}</p>@endif
        @if($footerInn)<p class="text-sm">Реестр ФССП: № {{ $footerInn }}</p>@endif
        <p class="text-sm">© {{ date('Y') }} Все права защищены.</p>
      </div>

      <div class="space-y-3">
        <h5 class="font-bold text-white text-lg mb-2">Контакты</h5>
        <p class="text-sm">
          Телефон:
          <a href="tel:{{ preg_replace('/\D/', '', $footerPhone) }}" class="hover:underline">{{ $footerPhone }}</a>
          (Бесплатно по РФ)
        </p>
        <p class="text-sm">
          Email:
          <a href="mailto:{{ $footerEmail }}" class="hover:underline">{{ $footerEmail }}</a>
        </p>
        @if($footerAddress)<p class="text-sm">Адрес: {{ $footerAddress }}</p>@endif
      </div>

      <div class="space-y-3">
        <h5 class="font-bold text-white text-lg mb-2">
          Наша специализация
        </h5>
        <p class="text-sm leading-relaxed">
          «ПКО Адмирал» специализируется <strong>только</strong> на законных и реалистичных методах урегулирования (по ФЗ-230): фиксации долга и реструктуризации. Мы не используем сомнительные схемы "списания", а достигаем результата через переговоры с кредитором.
        </p>
      </div>
    </div>
  </div>
</footer>

{{-- Маленький футер с юридическими ссылками --}}
<footer class="bg-gray-900 text-gray-400 border-t border-gray-700">
  <div class="container mx-auto px-4 sm:px-6 lg:px-12 py-4">
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-6 text-xs">
      <a href="{{ route('legal.privacy') }}" class="hover:text-white hover:underline transition-colors">Политика конфиденциальности</a>
      <span class="hidden sm:inline">•</span>
      <a href="{{ route('legal.terms') }}" class="hover:text-white hover:underline transition-colors">Пользовательское соглашение</a>
      <span class="hidden sm:inline">•</span>
      <a href="{{ route('legal.personal-data') }}" class="hover:text-white hover:underline transition-colors">Согласие на обработку персональных данных</a>
    </div>
  </div>
</footer>
