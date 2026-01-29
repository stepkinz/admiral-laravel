{{-- Модалка заявки — 1:1 из Next.js Dialog + ContactForm (одна на всю страницу) --}}
<div
  x-show="showModal"
  x-cloak
  class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50"
  x-transition:enter="transition ease-out duration-200"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  @keydown.escape.window="showModal = false"
>
  <div class="bg-white rounded-none shadow-xl max-w-md w-full p-6 text-gray-900" @click.stop>
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-xl font-semibold">Получить предложение</h2>
      <button type="button" @click="showModal = false" class="p-2 rounded-lg text-gray-500 hover:bg-gray-100" aria-label="Закрыть">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
      </button>
    </div>
    <p class="text-sm text-slate-600 mb-4">Оставьте свои контакты, и мы свяжемся с вами в ближайшее время для обсуждения вашей ситуации</p>
    <form action="{{ route('leads.store') }}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label for="lead_phone_modal" class="block text-sm font-medium text-gray-700 mb-1">Ваш телефон</label>
        <input type="tel" name="phone" id="lead_phone_modal" required placeholder="+7 (999) 123-45-67" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-lg focus:ring-2 focus:ring-primary focus:border-primary" />
        @error('phone')<p class="text-sm text-red-500 mt-1">{{ $message }}</p>@enderror
      </div>
      <div>
        <label for="lead_name_modal" class="block text-sm font-medium text-gray-700 mb-1">Имя</label>
        <input type="text" name="name" id="lead_name_modal" required placeholder="Ваше имя" class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-primary focus:border-primary" />
        @error('name')<p class="text-sm text-red-500 mt-1">{{ $message }}</p>@enderror
      </div>
      <div>
        <x-consent-checkbox id="lead_modal_personal_data_consent" name="personal_data_consent" wrapperClass="flex items-start gap-3" labelClass="text-gray-700 text-sm cursor-pointer select-none" inputClass="rounded-lg border-gray-300 text-primary focus:ring-primary" />
      </div>
      <button type="submit" class="w-full bg-primary hover:bg-primary/90 text-white text-lg font-bold py-3 shadow-lg transition-colors">
        Получить бесплатный разбор
      </button>
    </form>
    <p class="text-xs text-gray-500 text-center mt-4">Ваш номер нужен <strong>только</strong> для разбора ситуации юристом. Мы никому не передаем данные.</p>
  </div>
</div>
