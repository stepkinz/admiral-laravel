@php
  $legalName = $settings->legal_name ?? 'ООО "ПКО Адмирал"';
@endphp
{{-- PhoneChecker — проверка официальных номеров телефонов компании — Swiss Legal style --}}
<section class="py-16 md:py-24 text-slate-900 relative bg-white border-b border-slate-200 swiss-pattern-diagonal" x-data="phoneChecker()">
  <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
  <div class="absolute bottom-0 right-0 w-40 h-1 bg-slate-900 opacity-10"></div>
  <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
    <div class="max-w-4xl mx-auto">
      <div class="mb-12 text-center relative">
        <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
          <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
          Проверка
        </p>
        <h2 class="text-3xl md:text-4xl font-bold mb-6 tracking-tight font-serif" style="color: #243468;">Проверьте номер телефона</h2>
        <p class="text-lg text-slate-700 max-w-3xl mx-auto font-light">Если к вам поступают сообщения или звонки с угрозами или оскорблениями от имени {{ $legalName }}, вы можете проверить официальные номера телефонов, которые зарегистрированы на {{ $legalName }} и используются для взаимодействия с должниками по вопросам взыскания просроченной задолженности.</p>
      </div>

      <div class="border border-slate-200 rounded-none bg-stone-50/50 overflow-hidden">
        <div class="p-8 border-b border-slate-200">
          <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-1">Поиск номера телефона</h3>
          <p class="text-sm text-slate-600 mb-6">Введите номер телефона для проверки</p>
          <form x-on:submit.prevent="search()" class="space-y-4">
            <div class="flex flex-col sm:flex-row gap-4">
              <div class="flex-1">
                <input
                  type="tel"
                  x-model="searchQuery"
                  placeholder="+7 (800) 500-29-01 или 88005002901"
                  :disabled="isSearching"
                  class="w-full rounded-none border border-slate-300 px-4 py-3 text-lg focus:ring-2 focus:ring-slate-900 focus:border-slate-900 disabled:opacity-50"
                  :class="{ 'border-red-500': error }"
                />
                <p x-show="error" x-text="error" class="text-sm text-red-600 mt-2"></p>
              </div>
              <button
                type="submit"
                :disabled="isSearching"
                class="px-8 py-3 text-base font-bold text-white rounded-none uppercase tracking-wider transition-opacity hover:opacity-90 disabled:opacity-50 flex items-center justify-center gap-2"
                style="background-color: #ED3200;"
              >
                <template x-if="isSearching">
                  <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                </template>
                <template x-if="!isSearching">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </template>
                <span x-text="isSearching ? 'Поиск...' : 'Проверить'"></span>
              </button>
            </div>
          </form>
        </div>

        <div class="p-8">
          <div x-show="result === 'found'" x-transition class="border-2 border-green-200 rounded-none bg-green-50/50 p-6">
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0 h-12 w-12 rounded-none border-2 border-green-600 flex items-center justify-center bg-white">
                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
              </div>
              <div class="flex-1">
                <div class="flex items-start justify-between mb-4">
                  <div>
                    <h3 class="text-xl font-bold font-serif text-slate-900 mb-1" style="color: #243468;" x-text="phone.phone_number"></h3>
                    <p x-show="phone.description" class="text-sm text-slate-600 mt-1" x-text="phone.description"></p>
                  </div>
                  <div class="flex items-center gap-2 px-3 py-1 bg-green-100 rounded-none border border-green-200">
                    <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span class="text-xs font-bold uppercase tracking-wider text-green-700">Подтвержден</span>
                  </div>
                </div>
                <div class="mt-4 p-4 bg-white border border-slate-200 rounded-none">
                  <p class="text-sm text-slate-700 font-light">✓ Этот номер телефона действительно принадлежит {{ $legalName }} и используется для официального взаимодействия с должниками по вопросам взыскания просроченной задолженности.</p>
                </div>
              </div>
            </div>
            <div class="mt-6">
              <button type="button" x-on:click="reset()" class="w-full py-3 border-2 border-slate-900 text-slate-900 rounded-none uppercase tracking-wider hover:bg-slate-50 transition-colors font-bold">Проверить другой номер</button>
            </div>
          </div>

          <div x-show="result === 'notfound'" x-transition class="border-2 border-red-200 rounded-none bg-red-50/50 p-6">
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0 h-12 w-12 rounded-none border-2 border-red-600 flex items-center justify-center bg-white">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
              </div>
              <div class="flex-1">
                <h3 class="text-lg font-bold font-serif text-slate-900 mb-2" style="color: #243468;">Номер не найден</h3>
                <p class="text-sm text-slate-700 mb-4 font-light">Этот номер телефона не зарегистрирован в нашей базе официальных номеров {{ $legalName }}. Это может быть признаком мошенничества.</p>
                <div class="p-4 bg-white border border-slate-200 rounded-none mb-4">
                  <p class="text-sm text-slate-700 font-bold uppercase tracking-wider mb-2">Что делать?</p>
                  <ul class="text-sm text-slate-600 space-y-2 list-none">
                    <li class="flex items-start gap-2">
                      <span class="text-slate-900 font-bold">•</span>
                      <span>Не сообщайте личные данные и не переводите деньги</span>
                    </li>
                    <li class="flex items-start gap-2">
                      <span class="text-slate-900 font-bold">•</span>
                      <span>Свяжитесь с нами по официальным каналам: <a href="tel:{{ preg_replace('/\D/', '', $settings->phone ?? '88005002901') }}" class="font-bold hover:opacity-80 transition-opacity" style="color: #243468;">{{ $settings->phone ?? '8 800 500 29 01' }}</a></span>
                    </li>
                    <li class="flex items-start gap-2">
                      <span class="text-slate-900 font-bold">•</span>
                      <span>Сообщите о подозрительных звонках или сообщениях</span>
                    </li>
                    <li class="flex items-start gap-2">
                      <span class="text-slate-900 font-bold">•</span>
                      <span>Проверьте правильность введенного номера</span>
                    </li>
                  </ul>
                </div>
                <button type="button" x-on:click="reset()" class="w-full py-3 border-2 border-slate-900 text-slate-900 rounded-none uppercase tracking-wider hover:bg-slate-50 transition-colors font-bold">Попробовать снова</button>
              </div>
            </div>
          </div>
        </div>

        <div class="p-8 pt-0 border-t border-slate-200">
          <div class="p-6 bg-slate-50 border border-slate-200 rounded-none">
            <p class="text-sm font-bold uppercase tracking-wider text-slate-900 mb-3">Важно: Наши сотрудники никогда не будут:</p>
            <ul class="text-sm text-slate-700 space-y-2 list-none font-light">
              <li class="flex items-start gap-2">
                <span class="text-slate-900 font-bold">•</span>
                <span>Угрожать или оскорблять вас</span>
              </li>
              <li class="flex items-start gap-2">
                <span class="text-slate-900 font-bold">•</span>
                <span>Просить перевести деньги на личную карту</span>
              </li>
              <li class="flex items-start gap-2">
                <span class="text-slate-900 font-bold">•</span>
                <span>Сообщить CVV код или пароли от банка</span>
              </li>
              <li class="flex items-start gap-2">
                <span class="text-slate-900 font-bold">•</span>
                <span>Оплатить несуществующие комиссии</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function phoneChecker() {
    return {
      searchQuery: '',
      isSearching: false,
      error: '',
      result: null,
      phone: null,
      normalizePhone(phone) {
        // Удаляем все нецифровые символы, кроме +
        return phone.replace(/[^\d+]/g, '').replace(/^\+/, '');
      },
      search() {
        this.error = ''
        const normalized = this.normalizePhone(this.searchQuery)
        if (normalized.length < 10) {
          this.error = 'Введите корректный номер телефона'
          return
        }
        this.isSearching = true
        this.result = null
        fetch(`/api/phones/check?phone=${encodeURIComponent(normalized)}`)
          .then(r => r.json())
          .then(data => {
            if (data.found && data.phone) {
              this.phone = data.phone
              this.result = 'found'
            } else {
              this.result = 'notfound'
            }
          })
          .catch(() => { this.result = 'notfound' })
          .finally(() => { this.isSearching = false })
      },
      reset() {
        this.searchQuery = ''
        this.result = null
        this.phone = null
        this.error = ''
      }
    }
  }
</script>
