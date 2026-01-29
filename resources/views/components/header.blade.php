{{-- Header: ROW 1 (лого, телефон, гамбургер) + ROW 2 (навигация). Дословно из Next.js layout/Header.tsx --}}
@php
  $phone = $settings->phone ?? '8 800 500 29 01';
  $menuItems = [
    ['label' => 'Главная', 'href' => '/'],
    ['label' => 'Партнерство', 'href' => '/partnership'],
    ['label' => 'Реализация конфискованного имущества', 'href' => '/confiscated'],
    ['label' => 'О компании', 'href' => '/about'],
    ['label' => 'Реквизиты', 'href' => '/requisites'],
    ['label' => 'Оплата', 'href' => '/payment'],
    ['label' => 'Контакты', 'href' => '/contact'],
  ];
  $currentPath = request()->path() ?: '';
  $isActive = fn($href) => (ltrim($href, '/') ?: '') === $currentPath;
@endphp
<div x-data="{ isSheetOpen: false }">
  {{-- ROW 1: Top Bar --}}
  <div class="bg-white py-4">
    <div class="flex items-center justify-between w-full max-w-site mx-auto px-4 sm:px-6 lg:px-8">
      <a href="{{ url('/') }}" class="flex items-center shrink-0" aria-label="ПКО Адмирал — на главную">
        <img
          src="{{ asset('images/logos/logo.svg') }}"
          alt="ПКО Адмирал"
          width="180"
          height="48"
          class="h-auto w-[160px] sm:w-[180px] transition-opacity hover:opacity-80"
        />
      </a>

      <div class="flex-1 min-w-4" aria-hidden></div>

      <div class="hidden md:flex items-center gap-6 shrink-0">
        <div class="flex flex-col gap-0.5 items-end">
          <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-green-500 shrink-0" aria-hidden></span>
            <span class="text-xs font-sans text-gray-500">Бесплатная горячая линия</span>
          </div>
          <a
            href="tel:{{ preg_replace('/\D/', '', $phone) }}"
            class="flex items-center gap-2 font-bold text-[#243468] text-lg font-sans hover:opacity-80 transition-opacity"
            aria-label="Позвонить: {{ $phone }}"
          >
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            {{ $phone }}
          </a>
        </div>
        <a
          href="{{ url('/contact') }}"
          class="bg-[#ED3200] text-white font-sans font-bold text-sm rounded-full px-6 py-2.5 shrink-0 hover:bg-[#d62a00] transition-colors"
        >
          Заказать звонок
        </a>
      </div>

      {{-- Mobile: hamburger --}}
      <button
        type="button"
        class="md:hidden p-2 rounded-md text-[#243468] hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#243468] focus:ring-offset-2"
        aria-label="Открыть меню"
        @click="isSheetOpen = true"
      >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  </div>

  {{-- Mobile Sheet (Alpine) --}}
  <div
    x-show="isSheetOpen"
    x-cloak
    class="fixed inset-0 z-50 md:hidden"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @keydown.escape.window="isSheetOpen = false"
  >
    <div class="absolute inset-0 bg-black/50" @click="isSheetOpen = false" aria-hidden="true"></div>
    <div
      class="absolute right-0 top-0 bottom-0 w-[300px] sm:w-[340px] bg-white shadow-xl overflow-y-auto"
      @click.stop
      x-show="isSheetOpen"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="translate-x-full"
      x-transition:enter-end="translate-x-0"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="translate-x-0"
      x-transition:leave-end="translate-x-full"
    >
      <div class="mt-8 flex flex-col gap-6 px-4 pb-8">
        <a href="{{ url('/') }}" @click="isSheetOpen = false" class="shrink-0">
          <img src="{{ asset('images/logos/logo.svg') }}" alt="ПКО Адмирал" width="160" height="42" class="h-auto w-[160px]" />
        </a>
        <div class="flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-green-500" aria-hidden></span>
          <span class="text-xs text-gray-600">Бесплатная горячая линия</span>
        </div>
        <a href="tel:{{ preg_replace('/\D/', '', $phone) }}" class="flex items-center gap-2 font-bold text-[#243468]" @click="isSheetOpen = false">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
          {{ $phone }}
        </a>
        <a href="{{ url('/contact') }}" class="bg-[#ED3200] text-white font-bold text-sm rounded-full px-6 py-2.5 text-center block hover:bg-[#d62a00]" @click="isSheetOpen = false">
          Заказать звонок
        </a>
        <nav class="flex flex-col gap-1 border-t border-gray-200 pt-4">
          @foreach($menuItems as $item)
            <a
              href="{{ url($item['href']) }}"
              class="px-2 py-2 text-sm font-sans transition-colors {{ $isActive($item['href']) ? 'text-[#ED3200] font-medium' : 'text-gray-800 hover:text-[#ED3200]' }}"
              @click="isSheetOpen = false"
            >
              {{ $item['label'] }}
            </a>
          @endforeach
          <a href="{{ url('/account') }}" class="flex items-center gap-2 px-2 py-2 text-sm font-bold text-[#243468] hover:text-[#ED3200] mt-2" @click="isSheetOpen = false">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
            Личный кабинет
          </a>
        </nav>
        <button type="button" class="p-2 rounded-md text-gray-500 hover:bg-gray-100" @click="isSheetOpen = false" aria-label="Закрыть">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
      </div>
    </div>
  </div>

  {{-- ROW 2: Navigation Bar --}}
  <div class="bg-white border-y border-gray-100">
    <div class="w-full max-w-site mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-stretch">
        <nav class="hidden md:flex flex-1 items-stretch" aria-label="Основное меню">
          @foreach($menuItems as $item)
            <a
              href="{{ url($item['href']) }}"
              class="flex items-center px-6 py-3 font-sans text-sm font-medium border-r border-gray-200 last:border-r-0 text-gray-700 hover:text-[#ED3200] transition-colors {{ $isActive($item['href']) ? 'text-[#ED3200]' : '' }}"
            >
              {{ $item['label'] }}
            </a>
          @endforeach
        </nav>
        <div class="hidden md:flex items-center border-l border-gray-200 pl-4">
          <a href="{{ url('/account') }}" class="flex items-center gap-2 px-6 py-3 font-sans font-bold text-sm text-[#243468] hover:text-[#ED3200] transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
            Личный кабинет
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
