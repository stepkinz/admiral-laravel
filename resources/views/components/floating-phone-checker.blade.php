<div x-data="{ 
    open: false, 
    searchQuery: '', 
    isSearching: false, 
    error: '', 
    result: null, 
    phone: null,
    normalizePhone(phone) {
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
}" class="fixed bottom-8 right-8 z-40 print:hidden">

    <!-- Trigger Button -->
    <button @click="open = true"
        class="group flex items-center gap-3 bg-white border-2 border-slate-900 px-6 py-4 shadow-[4px_4px_0px_0px_rgba(15,23,42,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(15,23,42,1)] transition-all">
        <div class="relative">
            <span class="absolute -top-1 -right-1 flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
            </span>
            <svg class="w-6 h-6 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
        </div>
        <div class="text-left">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Поступают звонки с угрозами?</p>
            <p class="text-sm font-bold text-slate-900">Проверить номер</p>
        </div>
    </button>

    <!-- Modal Backdrop -->
    <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-50 flex items-center justify-center p-4"
        style="display: none;">

        <!-- Modal Content -->
        <div @click.outside="open = false" x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4"
            class="bg-white w-full max-w-lg shadow-2xl relative border-t-4 border-slate-900 max-h-[90vh] overflow-y-auto">

            <!-- Close Button -->
            <button @click="open = false"
                class="absolute top-4 right-4 text-slate-400 hover:text-slate-900 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="p-8">
                <div class="mb-8 text-center">
                    <h3 class="text-2xl font-bold font-serif mb-2" style="color: #243468;">Проверка номера</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">Если к вам поступают сообщения или звонки с
                        угрозами или оскорблениями от имени ООО "ПКО Адмирал", вы можете проверить официальные номера
                        телефонов, которые зарегистрированы на ООО "ПКО Адмирал" и используются для взаимодействия с
                        должниками по вопросам взыскания просроченной задолженности.</p>
                </div>

                <!-- Initial Search State -->
                <div x-show="!result">
                    <form @submit.prevent="search()" class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Номер
                                телефона</label>
                            <input type="tel" x-model="searchQuery" placeholder="+7 (999) 000-00-00"
                                :disabled="isSearching"
                                class="w-full rounded-none border border-slate-300 px-4 py-3 text-lg focus:ring-2 focus:ring-slate-900 focus:border-slate-900 outline-none transition-all"
                                :class="{ 'border-red-500': error }" />
                            <p x-show="error" x-text="error" class="text-xs text-red-600 mt-2"></p>
                        </div>
                        <button type="submit" :disabled="isSearching"
                            class="w-full py-4 text-base font-bold text-white rounded-none uppercase tracking-wider transition-all hover:opacity-90 disabled:opacity-50 flex items-center justify-center gap-2"
                            style="background-color: #ED3200;">
                            <span x-show="!isSearching">Проверить сейчас</span>
                            <span x-show="isSearching">Поиск...</span>
                        </button>
                    </form>
                </div>

                <!-- Found State -->
                <div x-show="result === 'found'" class="border-2 border-green-200 bg-green-50/50 p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="h-10 w-10 bg-green-100 border-2 border-green-500 flex items-center justify-center text-green-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">Номер найден</h4>
                            <p class="text-xs text-slate-600" x-text="phone?.phone_number"></p>
                        </div>
                    </div>
                    <p class="text-sm text-slate-700 mb-6 font-medium">Этот номер официально зарегистрирован за
                        компанией и безопасен.</p>
                    <button @click="reset()"
                        class="w-full py-3 border-2 border-slate-900 text-slate-900 font-bold uppercase tracking-wider hover:bg-slate-50 transition-colors text-sm">Проверить
                        другой</button>
                </div>

                <!-- Not Found State -->
                <div x-show="result === 'notfound'" class="border-2 border-red-200 bg-red-50/50 p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="h-10 w-10 bg-red-100 border-2 border-red-500 flex items-center justify-center text-red-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900">Номер не найден!</h4>
                            <p class="text-xs text-slate-600">Будьте осторожны</p>
                        </div>
                    </div>
                    <p class="text-sm text-slate-700 mb-6">Этот номер не принадлежит нашей компании. Возможно, это
                        мошенники. Не сообщайте личные данные.</p>
                    <button @click="reset()"
                        class="w-full py-3 border-2 border-slate-900 text-slate-900 font-bold uppercase tracking-wider hover:bg-slate-50 transition-colors text-sm">Проверить
                        другой</button>
                </div>

                <!-- Info Footer -->
                <div class="mt-6 pt-6 border-t border-slate-100 text-center">
                    <p class="text-xs text-slate-500">Официальный сервис проверки ООО ПКО «Адмирал»</p>
                </div>
            </div>
        </div>
    </div>
</div>