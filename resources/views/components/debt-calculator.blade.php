{{-- DebtCalculator — полная версия 1:1 из React; заголовок в стиле Swiss Legal. --}}
<section class="py-16 md:py-24 relative bg-white border-b border-slate-200 swiss-pattern-diagonal" x-data="debtCalculator()" x-init="init()">
  <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
  <div class="absolute top-1/2 left-0 w-1 h-40 bg-slate-900 opacity-5"></div>
  <div class="absolute bottom-0 right-0 w-40 h-1 bg-slate-900 opacity-10"></div>
  <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
    <div class="text-center mb-8 relative">
      <div class="absolute left-1/2 top-0 -translate-x-1/2 w-24 h-px bg-slate-900 opacity-10"></div>
      <div class="absolute left-1/2 bottom-0 -translate-x-1/2 w-24 h-px bg-slate-900 opacity-10"></div>
      <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
        Калькулятор
      </p>
      <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif mb-6" style="color: #243468;">
        Комфортные условия погашения долга
      </h2>

      <div class="inline-flex items-center gap-2 bg-slate-100 rounded-xl border border-slate-200 p-1.5 shadow-sm">
        <button
          type="button"
          x-on:click="showComparison = false"
          :class="!showComparison 
            ? 'bg-white text-slate-900 shadow-md border border-slate-200 scale-105' 
            : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50 active:scale-95'"
          class="px-6 py-3 rounded-lg font-semibold transition-all duration-200 ease-out relative flex items-center gap-2 min-w-[140px] justify-center"
        >
          <svg 
            class="w-5 h-5 transition-all duration-200"
            :class="!showComparison ? 'text-slate-900' : 'text-slate-500'"
            fill="none" 
            stroke="currentColor" 
            viewBox="0 0 24 24"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <span>С нами</span>
          <span x-show="!showComparison" class="absolute bottom-0 left-1/2 -translate-x-1/2 w-8 h-0.5 bg-[#243468] rounded-full"></span>
        </button>
        <button
          type="button"
          x-on:click="showComparison = true"
          :class="showComparison 
            ? 'bg-white text-slate-900 shadow-md border border-slate-200 scale-105' 
            : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50 active:scale-95'"
          class="px-6 py-3 rounded-lg font-semibold transition-all duration-200 ease-out relative flex items-center gap-2 min-w-[140px] justify-center"
        >
          <svg 
            class="w-5 h-5 transition-all duration-200"
            :class="showComparison ? 'text-slate-900' : 'text-slate-500'"
            fill="none" 
            stroke="currentColor" 
            viewBox="0 0 24 24"
          >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
          </svg>
          <span>Сравнение</span>
          <span x-show="showComparison" class="absolute bottom-0 left-1/2 -translate-x-1/2 w-8 h-0.5 bg-[#243468] rounded-full"></span>
        </button>
      </div>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
      {{-- Левая колонка — контролы --}}
      <div class="lg:col-span-2 space-y-8">
        {{-- Сумма задолженности --}}
        <div>
          <div class="flex items-center gap-2 mb-3">
            <label class="text-base font-medium text-gray-900">Сумма задолженности</label>
            <div class="relative">
              <button
                type="button"
                class="text-gray-400 hover:text-gray-600"
                x-on:mouseenter="showDebtTooltip = true"
                x-on:mouseleave="showDebtTooltip = false"
              >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              </button>
              <div
                x-show="showDebtTooltip"
                x-transition
                class="absolute left-0 top-6 z-10 w-64 p-3 bg-gray-900 text-white text-xs rounded-lg shadow-lg"
              >
                Актуальный размер задолженности можно узнать при звонке в наш колл-центр, на Госуслугах или при проверке кредитной истории.
              </div>
            </div>
          </div>
          <div class="relative mb-4">
            <input
              type="range"
              min="0"
              max="3000000"
              step="1000"
              x-model.number="debtAmount"
              class="debt-slider w-full appearance-none cursor-pointer"
              :style="'background: linear-gradient(to right, rgba(237, 50, 0, 0.25) 0%, rgba(237, 50, 0, 0.25) ' + (debtAmount / 3000000 * 100) + '%, #f1f5f9 ' + (debtAmount / 3000000 * 100) + '%, #f1f5f9 100%)'"
            />
            <div class="flex justify-between text-xs text-gray-500 mt-2">
              <span>0 ₽</span>
              <span>3 000 000 ₽</span>
            </div>
          </div>
          <div class="flex items-center justify-center gap-3">
            <input
              type="text"
              :value="formatNumber(debtAmount)"
              x-on:input="handleDebtAmountInput($event.target.value)"
              x-on:blur="formatDebtAmount()"
              class="w-40 px-3 py-2 text-center text-xl font-bold border-2 border-gray-300 rounded-lg focus:border-[#ed3200] focus:outline-none"
            />
            <span class="text-xl text-gray-600">₽</span>
          </div>
          <div class="mt-4 flex flex-wrap gap-2 justify-center">
            <template x-for="preset in presets" :key="preset.value">
              <button
                type="button"
                x-on:click="debtAmount = preset.value"
                class="px-3 py-1.5 text-sm bg-gray-100 hover:bg-[#ed3200] hover:text-white rounded-full transition-colors"
                x-text="preset.label"
              ></button>
            </template>
          </div>
        </div>

        {{-- Срок погашения --}}
        <div>
          <div class="flex items-center gap-2 mb-3">
            <label class="text-base font-medium text-gray-900">Срок погашения в месяцах</label>
          </div>
          <div class="relative mb-4">
            <input
              type="range"
              :min="minMonths"
              max="12"
              step="1"
              x-model.number="months"
              class="months-slider w-full appearance-none cursor-pointer"
              :style="'background: linear-gradient(to right, rgba(237, 50, 0, 0.25) 0%, rgba(237, 50, 0, 0.25) ' + (12 === minMonths ? 100 : ((months - minMonths) / (12 - minMonths) * 100)) + '%, #f1f5f9 ' + (12 === minMonths ? 100 : ((months - minMonths) / (12 - minMonths) * 100)) + '%, #f1f5f9 100%)'"
            />
            <div class="flex justify-between text-xs text-gray-500 mt-2">
              <span x-text="minMonths"></span>
              <span>12</span>
            </div>
          </div>
          <div class="mt-4 text-center">
            <span class="text-2xl font-bold text-gray-900" x-text="months"></span>
          </div>
          <p x-show="minMonths > 1" x-transition class="text-xs text-amber-600 text-center mt-2">
            ⚠️ При таких условиях минимальный срок — <span x-text="minMonths"></span> мес.
          </p>
        </div>

        {{-- Размер списания --}}
        <div>
          <div class="flex items-center gap-2 mb-3">
            <label class="text-base font-medium text-gray-900">Размер списания:</label>
            <div class="relative">
              <button
                type="button"
                class="text-gray-400 hover:text-gray-600"
                x-on:mouseenter="showDiscountTooltip = true"
                x-on:mouseleave="showDiscountTooltip = false"
              >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              </button>
              <div
                x-show="showDiscountTooltip"
                x-transition
                class="absolute left-0 top-6 z-10 w-64 p-3 bg-gray-900 text-white text-xs rounded-lg shadow-lg"
              >
                Компания ПКО Адмирал предоставляет индивидуальные условия погашения. Также для многих клиентов доступны акции прощения.
              </div>
            </div>
          </div>
          <div class="flex gap-3">
            <template x-for="pct in [10, 25, 50]" :key="pct">
              <button
                type="button"
                x-on:click="discountPercent = pct"
                :class="discountPercent === pct ? 'bg-[#8B2D1C] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'"
                class="flex-1 py-3 px-4 rounded-lg font-medium transition-colors"
                x-text="pct + '%'"
              ></button>
            </template>
          </div>
          <p class="text-sm text-gray-600 mt-3">
            Чем больше сумма списания, тем более короткий срок погашения требуется. Если условия не подходят, то стоит связаться со специалистом ПКО Адмирал для обсуждения индивидуальных.
          </p>
        </div>

        {{-- Сумма списания --}}
        <template x-if="!showComparison">
          <div class="bg-white border border-slate-200 p-6 rounded-xl shadow-sm">
            <h3 class="text-xl font-bold text-slate-900 mb-3 font-serif" style="color: #243468;">Сумма списания:</h3>
            <p class="text-sm text-slate-600 mb-4">Сколько получится списать?</p>
            <div class="space-y-2">
              <p class="text-3xl font-bold text-slate-900 mb-1">
                <span x-text="formatCurrency(discount)"></span> <span class="text-xl text-slate-600 font-normal">рублей</span>
              </p>
              <p class="text-sm text-slate-600 leading-relaxed">
                при заключении и соблюдении платежного соглашения.
              </p>
            </div>
          </div>
        </template>
      </div>

      {{-- Правая колонка — результаты --}}
      <div class="space-y-6">
        <template x-if="showComparison">
          <div class="space-y-6">
            <div class="grid grid-cols-2 gap-4">
              <div class="bg-red-50 border-2 border-red-200 p-4 rounded-xl">
                <h4 class="text-sm font-bold text-red-900 mb-3 text-center">❌ Без нашей помощи</h4>
                <div class="space-y-2 text-sm">
                  <div class="bg-white rounded p-2">
                    <p class="text-xs text-gray-600">Сумма долга:</p>
                    <p class="font-bold text-red-700" x-text="formatNumber(debtAmount) + ' ₽'"></p>
                  </div>
                  <div class="bg-white rounded p-2">
                    <p class="text-xs text-gray-600">+ Проценты (30%):</p>
                    <p class="font-bold text-red-700" x-text="'+' + formatNumber(withoutUsInterest) + ' ₽'"></p>
                  </div>
                  <div class="bg-white rounded p-2">
                    <p class="text-xs text-gray-600">+ Исп. сбор (7%):</p>
                    <p class="font-bold text-red-700" x-text="'+' + formatNumber(withoutUsFine) + ' ₽'"></p>
                  </div>
                  <div class="bg-red-600 text-white rounded p-2">
                    <p class="text-xs opacity-90">Итого к оплате:</p>
                    <p class="font-bold text-lg" x-text="formatNumber(withoutUsTotal) + ' ₽'"></p>
                  </div>
                  <div class="bg-white rounded p-2">
                    <p class="text-xs text-gray-600">Платеж/мес:</p>
                    <p class="font-bold text-red-700" x-text="formatNumber(withoutUsMonthlyPayment) + ' ₽'"></p>
                  </div>
                </div>
              </div>
              <div class="bg-green-50 border-2 border-green-200 p-4 rounded-xl">
                <h4 class="text-sm font-bold text-green-900 mb-3 text-center">✅ С ПКО Адмирал</h4>
                <div class="space-y-2 text-sm">
                  <div class="bg-white rounded p-2">
                    <p class="text-xs text-gray-600">Сумма долга:</p>
                    <p class="font-bold text-green-700" x-text="formatNumber(debtAmount) + ' ₽'"></p>
                  </div>
                  <div class="bg-white rounded p-2">
                    <p class="text-xs text-gray-600">Списание (<span x-text="discountPercent"></span>%):</p>
                    <p class="font-bold text-green-700" x-text="'-' + formatNumber(discount) + ' ₽'"></p>
                  </div>
                  <div class="bg-white rounded p-2">
                    <p class="text-xs text-gray-600">Проценты:</p>
                    <p class="font-bold text-green-700">0 ₽</p>
                  </div>
                  <div class="bg-green-600 text-white rounded p-2">
                    <p class="text-xs opacity-90">Итого к оплате:</p>
                    <p class="font-bold text-lg" x-text="formatNumber(finalAmount) + ' ₽'"></p>
                  </div>
                  <div class="bg-white rounded p-2">
                    <p class="text-xs text-gray-600">Платеж/мес:</p>
                    <p class="font-bold text-green-700" x-text="formatNumber(monthlyPayment) + ' ₽'"></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-xl text-center">
              <p class="text-sm opacity-90 mb-2">🎉 Ваша выгода с нами:</p>
              <p class="text-4xl font-bold mb-2" x-text="formatNumber(withoutUsDifference) + ' ₽'"></p>
              <p class="text-sm opacity-90">Это то, что вы НЕ переплатите, обратившись к нам</p>
            </div>
            <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
              <h4 class="font-bold text-gray-900 mb-3 text-center">Откуда такая разница?</h4>
              <div class="space-y-2 text-sm">
                <div class="flex justify-between items-center">
                  <span class="text-gray-700">Вы не платите проценты:</span>
                  <span class="font-bold text-green-600" x-text="'+' + formatNumber(withoutUsInterest) + ' ₽'"></span>
                </div>
                <div class="flex justify-between items-center">
                  <span class="text-gray-700">Нет исполнительского сбора:</span>
                  <span class="font-bold text-green-600" x-text="'+' + formatNumber(withoutUsFine) + ' ₽'"></span>
                </div>
                <div class="flex justify-between items-center">
                  <span class="text-gray-700">Списание долга:</span>
                  <span class="font-bold text-green-600" x-text="'+' + formatNumber(discount) + ' ₽'"></span>
                </div>
                <div class="pt-2 border-t flex justify-between items-center">
                  <span class="font-bold text-gray-900">Итого экономия:</span>
                  <span class="font-bold text-xl text-green-600" x-text="formatNumber(withoutUsDifference) + ' ₽'"></span>
                </div>
              </div>
            </div>
          </div>
        </template>

        <template x-if="!showComparison">
          <div class="space-y-6">
            <div class="bg-gradient-to-br from-green-500 via-green-600 to-green-700 text-white p-6 rounded-xl shadow-xl relative overflow-hidden">
              {{-- Декоративный элемент --}}
              <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
              <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/5 rounded-full -ml-12 -mb-12"></div>
              
              <div class="relative z-10">
                <div class="flex items-start justify-between mb-4">
                  <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center border-2 border-white/30">
                      <span class="text-3xl font-bold text-white">₽</span>
                    </div>
                    <div>
                      <h3 class="text-xl font-bold font-serif">Ваша экономия</h3>
                      <p class="text-xs opacity-90 mt-0.5">Реальная выгода с ПКО Адмирал</p>
                    </div>
                  </div>
                  <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2 border-2 border-white/30">
                    <p class="text-2xl font-bold" x-text="savingsPercent + '%'"></p>
                    <p class="text-[10px] opacity-75 uppercase tracking-wider">экономия</p>
                  </div>
                </div>

                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-5 mb-4 border-2 border-white/30">
                  <p class="text-xs opacity-90 mb-2 uppercase tracking-wider">Вы экономите:</p>
                  <p class="text-4xl md:text-5xl font-bold mb-3 leading-none" x-text="formatNumber(discount) + ' ₽'"></p>
                  <div class="flex items-center gap-2 text-xs opacity-90">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Гарантированная сумма списания</span>
                  </div>
                </div>

                <div class="grid grid-cols-2 gap-3 mb-4">
                  <div class="bg-white/15 backdrop-blur-sm rounded-lg p-3 border border-white/20">
                    <p class="text-[10px] opacity-75 uppercase tracking-wider mb-1.5">Было</p>
                    <p class="text-lg font-bold" x-text="formatNumber(debtAmount) + ' ₽'"></p>
                  </div>
                  <div class="bg-white/25 backdrop-blur-sm rounded-lg p-3 border-2 border-white/40 relative">
                    <div class="absolute -top-2 -right-2 bg-white text-green-600 rounded-full w-6 h-6 flex items-center justify-center text-xs font-bold">✓</div>
                    <p class="text-[10px] opacity-75 uppercase tracking-wider mb-1.5">Стало</p>
                    <p class="text-lg font-bold" x-text="formatNumber(finalAmount) + ' ₽'"></p>
                  </div>
                </div>

                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 border border-white/20">
                  <div class="flex items-center gap-2 text-xs">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="opacity-90">Это реальная экономия, которую вы получите при заключении соглашения</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gradient-to-br from-slate-50 to-white border-2 border-slate-200 p-6 rounded-xl shadow-lg">
              <div class="flex items-start gap-3 mb-4">
                <div class="flex-shrink-0 w-10 h-10 bg-[#243468] rounded-lg flex items-center justify-center">
                  <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                <div class="flex-1">
                  <h3 class="text-xl font-bold text-slate-900 mb-1 font-serif" style="color: #243468;">Срок погашения</h3>
                  <p class="text-sm text-slate-600">Сколько времени потребуется для погашения?</p>
                </div>
              </div>
              
              <div class="bg-white border border-slate-200 rounded-lg p-4 mb-4">
                <p class="text-2xl font-bold text-slate-900 mb-2">
                  <span x-text="months"></span> <span x-text="months === 1 ? 'месяц' : (months < 5 ? 'месяца' : 'месяцев')"></span>
                </p>
                <p class="text-sm text-slate-600 mb-3">
                  при регулярном внесении платежей по <span class="font-bold text-slate-900" x-text="formatNumber(monthlyPayment)"></span> рублей
                </p>
                <div class="pt-3 border-t border-slate-100">
                  <p class="text-xs text-slate-500 mb-1">Последний платеж:</p>
                  <p class="text-lg font-semibold text-slate-900" x-text="formatCurrency(lastPayment) + ' рублей'"></p>
                </div>
              </div>

              <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-4">
                <div class="flex items-start gap-3">
                  <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                  <div>
                    <p class="text-sm font-semibold text-green-900 mb-1">Без скрытых процентов</p>
                    <p class="text-xs text-green-700 leading-relaxed">ПКО Адмирал не начисляет проценты на остаток задолженности. Вы платите только сумму списания.</p>
                  </div>
                </div>
              </div>

              <div class="space-y-2">
                <p class="text-xs font-medium text-slate-700 mb-2">Путь к свободе от долгов:</p>
                <div class="h-3 bg-slate-100 rounded-full overflow-hidden">
                  <div
                    class="h-full bg-gradient-to-r from-[#243468] to-slate-600 rounded-full transition-all duration-500 flex items-center justify-end pr-2"
                    :style="'width: ' + (1 / months * 100) + '%'"
                  >
                    <span class="text-[10px] font-bold text-white" x-text="Math.round((1 / months * 100)) + '%'"></span>
                  </div>
                </div>
                <p class="text-xs text-slate-600">
                  Осталось <span class="font-semibold text-slate-900" x-text="months - 1"></span> платежей после первого
                </p>
              </div>
            </div>
            <button
              type="button"
              x-on:click="$dispatch('open-lead-modal')"
              class="w-full text-lg py-6 bg-primary hover:bg-primary/90 text-white font-bold rounded-lg shadow-lg transition-colors"
            >
              Получить такие условия
            </button>
          </div>
        </template>
      </div>
    </div>

    {{-- Сравнение альтернатив --}}
    <div class="mt-12 max-w-5xl mx-auto">
      <div class="bg-stone-50 border border-slate-200 rounded-xl p-6 md:p-8">
        <h3 class="text-2xl font-bold text-slate-900 mb-6 text-center font-serif" style="color: #243468;">
          Если не воспользоваться нашими услугами
        </h3>
        <div class="grid md:grid-cols-3 gap-4 text-center">
          <div class="bg-white border border-slate-200 rounded-lg p-4 shadow-sm">
            <div class="text-3xl font-bold text-slate-700 mb-2" x-text="'+' + formatNumber(debtAmount * 0.3) + '₽'"></div>
            <p class="text-sm text-slate-600">Рост процентов и штрафов за <span x-text="months"></span> мес.</p>
          </div>
          <div class="bg-white border border-slate-200 rounded-lg p-4 shadow-sm">
            <div class="text-3xl font-bold text-slate-700 mb-2">+7%</div>
            <p class="text-sm text-slate-600">Исполнительский сбор ФССП</p>
          </div>
          <div class="bg-white border border-slate-200 rounded-lg p-4 shadow-sm">
            <div class="text-3xl font-bold text-slate-700 mb-2">Ограничения</div>
            <p class="text-sm text-slate-600">Арест счетов, запрет на выезд</p>
          </div>
        </div>
        <div class="mt-6 text-center">
          <p class="text-lg font-bold text-slate-900 mb-2">
            Итого переплата: до <span x-text="formatNumber(debtAmount * 0.37) + ' ₽'"></span>
          </p>
          <p class="text-sm text-slate-600">
            Вместо экономии в <span class="font-semibold text-slate-900" x-text="formatNumber(discount) + ' ₽'"></span> с нами
          </p>
        </div>
      </div>
    </div>

    <p class="text-sm text-gray-500 text-center mt-8 max-w-4xl mx-auto">
      Не оферта. ПКО Адмирал предлагает индивидуальные условия погашения задолженности с учётом обстоятельств и возможностей клиента.
    </p>
  </div>
</section>

<style>
  /* Стили для ползунков калькулятора */
  .debt-slider,
  .months-slider {
    height: 8px;
    background: #f1f5f9;
    border-radius: 12px;
    outline: none;
    transition: all 0.2s ease;
  }

  /* Стили для трека (дорожки) ползунка */
  .debt-slider::-webkit-slider-runnable-track,
  .months-slider::-webkit-slider-runnable-track {
    height: 8px;
    border-radius: 12px;
    background: transparent;
  }

  .debt-slider::-moz-range-track,
  .months-slider::-moz-range-track {
    height: 8px;
    border-radius: 12px;
    background: transparent;
  }

  /* Стили для бегунка (thumb) */
  .debt-slider::-webkit-slider-thumb,
  .months-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: linear-gradient(135deg, #243468 0%, #1e2a52 100%);
    cursor: pointer;
    border: 3px solid #ffffff;
    box-shadow: 0 2px 8px rgba(36, 52, 104, 0.25), 0 0 0 0 rgba(237, 50, 0, 0);
    transition: all 0.2s ease;
    margin-top: -8px;
  }

  .debt-slider::-moz-range-thumb,
  .months-slider::-moz-range-thumb {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background: linear-gradient(135deg, #243468 0%, #1e2a52 100%);
    cursor: pointer;
    border: 3px solid #ffffff;
    box-shadow: 0 2px 8px rgba(36, 52, 104, 0.25);
    transition: all 0.2s ease;
  }

  /* Hover эффект для бегунка */
  .debt-slider:hover::-webkit-slider-thumb,
  .months-slider:hover::-webkit-slider-thumb {
    box-shadow: 0 4px 12px rgba(36, 52, 104, 0.35), 0 0 0 4px rgba(237, 50, 0, 0.1);
    transform: scale(1.1);
  }

  .debt-slider:hover::-moz-range-thumb,
  .months-slider:hover::-moz-range-thumb {
    box-shadow: 0 4px 12px rgba(36, 52, 104, 0.35), 0 0 0 4px rgba(237, 50, 0, 0.1);
    transform: scale(1.1);
  }

  /* Активное состояние (при перетаскивании) */
  .debt-slider:active::-webkit-slider-thumb,
  .months-slider:active::-webkit-slider-thumb {
    box-shadow: 0 2px 6px rgba(36, 52, 104, 0.4), 0 0 0 6px rgba(237, 50, 0, 0.15);
    transform: scale(1.15);
  }

  .debt-slider:active::-moz-range-thumb,
  .months-slider:active::-moz-range-thumb {
    box-shadow: 0 2px 6px rgba(36, 52, 104, 0.4), 0 0 0 6px rgba(237, 50, 0, 0.15);
    transform: scale(1.15);
  }

  /* Фокус состояние для доступности */
  .debt-slider:focus-visible::-webkit-slider-thumb,
  .months-slider:focus-visible::-webkit-slider-thumb {
    outline: 2px solid #243468;
    outline-offset: 2px;
  }

  .debt-slider:focus-visible::-moz-range-thumb,
  .months-slider:focus-visible::-moz-range-thumb {
    outline: 2px solid #243468;
    outline-offset: 2px;
  }

  /* Для Firefox - убираем стандартные стили */
  .debt-slider::-moz-focus-outer,
  .months-slider::-moz-focus-outer {
    border: 0;
  }
</style>

<script>
  function debtCalculator() {
    return {
      debtAmount: 74529,
      months: 12,
      discountPercent: 10,
      showDebtTooltip: false,
      showDiscountTooltip: false,
      showComparison: false,
      presets: [
        { label: '30 000 ₽', value: 30000 },
        { label: '100 000 ₽', value: 100000 },
        { label: '500 000 ₽', value: 500000 },
        { label: '1 000 000 ₽', value: 1000000 },
      ],
      get minMonths() {
        const d = this.debtAmount, p = this.discountPercent
        if (d > 500000 && p === 50) return 6
        if (d > 1000000 && p >= 25) return 8
        return 1
      },
      get maxDiscount() {
        if (this.debtAmount < 50000) return 70
        if (this.debtAmount < 100000) return 50
        if (this.debtAmount < 500000) return 35
        return 25
      },
      get discount() { return (this.debtAmount * this.discountPercent) / 100 },
      get finalAmount() { return this.debtAmount - this.discount },
      get monthlyPayment() { return this.finalAmount / this.months },
      get lastPayment() { return this.finalAmount - this.monthlyPayment * (this.months - 1) },
      get savingsPercent() { return Math.round((this.discount / this.debtAmount) * 100) },
      get withoutUsInterest() { return this.debtAmount * 0.3 },
      get withoutUsFine() { return this.debtAmount * 0.07 },
      get withoutUsTotal() { return this.debtAmount + this.withoutUsInterest + this.withoutUsFine },
      get withoutUsMonthlyPayment() { return this.withoutUsTotal / this.months },
      get withoutUsDifference() { return this.withoutUsTotal - this.finalAmount },
      formatNumber(num) {
        return new Intl.NumberFormat('ru-RU').format(Math.round(num))
      },
      formatCurrency(amount) {
        return new Intl.NumberFormat('ru-RU', { minimumFractionDigits: 1, maximumFractionDigits: 1 }).format(amount)
      },
      handleDebtAmountInput(value) {
        // Убираем все нецифровые символы (включая пробелы)
        const numericValue = value.replace(/\s/g, '').replace(/\D/g, '')
        if (numericValue === '') {
          this.debtAmount = 0
          return
        }
        const num = parseInt(numericValue, 10)
        if (!isNaN(num)) {
          if (num < 0) {
            this.debtAmount = 0
          } else if (num > 3000000) {
            this.debtAmount = 3000000
          } else {
            this.debtAmount = num
          }
        }
      },
      formatDebtAmount() {
        // При потере фокуса гарантируем корректные границы
        if (this.debtAmount < 0) this.debtAmount = 0
        if (this.debtAmount > 3000000) this.debtAmount = 3000000
      },
      init() {
        if (typeof localStorage !== 'undefined') {
          const savedDebt = localStorage.getItem('calculator_debtAmount')
          const savedMonths = localStorage.getItem('calculator_months')
          const savedDiscount = localStorage.getItem('calculator_discountPercent')
          if (savedDebt != null) this.debtAmount = Number(savedDebt)
          if (savedMonths != null) this.months = Number(savedMonths)
          if (savedDiscount != null) this.discountPercent = Number(savedDiscount)
        }
        this.$watch('debtAmount', v => { if (typeof localStorage !== 'undefined') localStorage.setItem('calculator_debtAmount', String(v)) })
        this.$watch('months', v => { if (typeof localStorage !== 'undefined') localStorage.setItem('calculator_months', String(v)) })
        this.$watch('discountPercent', v => { if (typeof localStorage !== 'undefined') localStorage.setItem('calculator_discountPercent', String(v)) })
        this.$watch('minMonths', () => { if (this.months < this.minMonths) this.months = this.minMonths })
      }
    }
  }
</script>
