{{-- EmployeeChecker — заглушка 1:1 по вёрстке; API сотрудников пока нет, поиск возвращает «не найден». --}}
<section class="py-16 bg-gray-50" x-data="employeeChecker()">
  <div class="container mx-auto px-4">
    <div class="max-w-3xl mx-auto">
      <div class="text-center mb-8">
        <h2 class="text-3xl font-heading font-bold text-primary mb-4">Проверьте сотрудника</h2>
        <p class="text-gray-600">Если с вами связывался наш сотрудник, вы можете проверить его личность по табельному номеру или ФИО</p>
      </div>

      <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="p-6 border-b border-gray-200">
          <h3 class="font-heading font-bold text-lg text-primary mb-1">Поиск сотрудника</h3>
          <p class="text-sm text-gray-500 mb-4">Введите табельный номер или ФИО сотрудника</p>
          <form x-on:submit.prevent="search()" class="space-y-4">
            <div class="flex gap-2">
              <div class="flex-1">
                <input
                  type="text"
                  x-model="searchQuery"
                  placeholder="Например: EMP001 или Иванов Иван"
                  :disabled="isSearching"
                  class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-primary focus:border-primary disabled:opacity-50"
                  :class="{ 'border-red-500': error }"
                />
                <p x-show="error" x-text="error" class="text-sm text-red-500 mt-1"></p>
              </div>
              <button
                type="submit"
                :disabled="isSearching"
                class="px-6 py-2 bg-primary hover:bg-primary/90 text-white font-medium rounded-lg transition-colors disabled:opacity-50 flex items-center gap-2"
              >
                <template x-if="isSearching">
                  <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                </template>
                <template x-if="!isSearching">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </template>
                <span x-text="isSearching ? 'Поиск...' : 'Найти'"></span>
              </button>
            </div>
          </form>
        </div>

        <div class="p-6">
          <div x-show="result === 'found'" x-transition class="p-6 bg-green-50 border-2 border-green-200 rounded-lg">
            <div class="flex items-start gap-4">
              <div class="flex-shrink-0 h-24 w-24 rounded-lg bg-green-200 flex items-center justify-center">
                <svg class="h-12 w-12 text-green-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
              </div>
              <div class="flex-1">
                <div class="flex items-start justify-between mb-3">
                  <div>
                    <h3 class="text-xl font-bold font-heading text-gray-900" x-text="employee.fullName"></h3>
                    <p class="text-sm text-gray-600" x-text="employee.position"></p>
                  </div>
                  <div class="flex items-center gap-2 px-3 py-1 bg-green-100 rounded-full">
                    <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span class="text-sm font-medium text-green-700">Подтвержден</span>
                  </div>
                </div>
                <div class="space-y-2">
                  <div class="flex items-center gap-2 text-sm">
                    <span class="text-gray-600">Табельный номер:</span>
                    <span class="font-mono font-semibold text-gray-900" x-text="employee.employeeId"></span>
                  </div>
                  <div class="flex items-center gap-2 text-sm">
                    <span class="text-gray-600">Статус:</span>
                    <span class="text-green-600 font-medium" x-text="employee.isActive ? 'Работает' : 'Не активен'"></span>
                  </div>
                </div>
                <div class="mt-4 p-3 bg-white rounded-lg">
                  <p class="text-sm text-gray-700">✓ Этот сотрудник действительно работает в {{ $settings->legal_name ?? 'ООО ПКО «Адмирал»' }} и имеет право представлять компанию.</p>
                </div>
              </div>
            </div>
            <div class="mt-4">
              <button type="button" x-on:click="reset()" class="w-full py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">Проверить другого сотрудника</button>
            </div>
          </div>

          <div x-show="result === 'notfound'" x-transition class="p-6 bg-red-50 border-2 border-red-200 rounded-lg">
            <div class="flex items-start gap-4">
              <div class="h-12 w-12 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
              </div>
              <div class="flex-1">
                <h3 class="text-lg font-bold font-heading text-gray-900 mb-2">Сотрудник не найден</h3>
                <p class="text-sm text-gray-700 mb-4">В нашей базе нет сотрудника с такими данными. Это может быть признаком мошенничества.</p>
                <div class="p-3 bg-white rounded-lg mb-4">
                  <p class="text-sm text-gray-700 font-medium mb-2">Что делать?</p>
                  <ul class="text-sm text-gray-600 space-y-1 list-disc list-inside">
                    <li>Не сообщайте личные данные</li>
                    <li>Свяжитесь с нами: {{ $settings->phone ?? '8 800 500 29 01' }}</li>
                    <li>Проверьте правильность введенных данных</li>
                  </ul>
                </div>
                <button type="button" x-on:click="reset()" class="w-full py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">Попробовать снова</button>
              </div>
            </div>
          </div>
        </div>

        <div class="p-6 pt-0">
          <div class="p-4 bg-blue-50 rounded-lg">
            <p class="text-sm text-blue-900 font-medium">Важно: Наши сотрудники никогда не попросят вас:</p>
            <ul class="text-sm text-blue-800 mt-2 space-y-1 list-disc list-inside ml-2">
              <li>Перевести деньги на личную карту</li>
              <li>Сообщить CVV код или пароли от банка</li>
              <li>Оплатить несуществующие комиссии</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function employeeChecker() {
    return {
      searchQuery: '',
      isSearching: false,
      error: '',
      result: null,
      employee: null,
      search() {
        this.error = ''
        if (this.searchQuery.trim().length < 2) {
          this.error = 'Введите минимум 2 символа'
          return
        }
        this.isSearching = true
        this.result = null
        fetch(`/api/employees?q=${encodeURIComponent(this.searchQuery)}`)
          .then(r => r.json())
          .then(data => {
            if (data.docs && data.docs.length > 0) {
              const e = data.docs[0]
              this.employee = { fullName: e.fullName, position: e.position, employeeId: e.employeeId, isActive: e.isActive }
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
        this.employee = null
        this.error = ''
      }
    }
  }
</script>
