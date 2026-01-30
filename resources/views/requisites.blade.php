@php
  $s = $settings;
  $phone = $s->phone ?? null;
  $email = $s->email ?? null;
  $address = $s->address ?? null;
  $workSchedule = $s->work_schedule ?? null;
  $orgForm = $s->organizational_legal_form ?? null;
  $fullName = $s->full_company_name ?? null;
  $legalName = $s->legal_name ?? null;
  $director = $s->director_name ?? null;
  $inn = $s->inn ?? null;
  $ogrn = $s->ogrn ?? null;
  $kpp = $s->kpp ?? null;
  $licenseNumber = $s->license_number ?? null;
  $bankName = $s->bank_name ?? null;
  $bik = $s->bik ?? null;
  $checkingAccount = $s->checking_account ?? null;
  $corrAccount = $s->correspondent_account ?? null;
@endphp
<x-layouts.app title="Реквизиты — ПКО Адмирал">
  <div class="min-h-screen bg-white text-slate-900">
    <x-top-bar />
    <x-header />

    <main>
      {{-- Hero — Swiss Legal style --}}
      <section class="border-b border-slate-200 swiss-pattern-dots relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10 z-[1]"></div>
        <div class="absolute top-20 left-0 w-1 h-32 bg-slate-900 opacity-5 z-[1]"></div>
        <div class="absolute bottom-20 right-0 w-1 h-32 bg-slate-900 opacity-5 z-[1]"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 py-20 lg:py-28 relative z-10">
          <div class="max-w-4xl mx-auto text-center">
            <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
              <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
              Официальные данные
            </p>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight tracking-tight font-serif" style="color: #243468;">
              Реквизиты
            </h1>
            <p class="text-xl text-slate-700 max-w-2xl mx-auto font-light">
              Полные реквизиты компании для договоров и платежей
            </p>
          </div>
        </div>
      </section>

      {{-- Контакты --}}
      <section class="py-16 md:py-24 relative bg-white border-b border-slate-200 swiss-pattern-diagonal">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="absolute bottom-0 right-0 w-40 h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="max-w-4xl mx-auto">
            <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
              <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
              Контакты
            </p>
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif mb-8" style="color: #243468;">Контактные данные</h2>
            <div class="border border-slate-200 rounded-none overflow-hidden">
              <dl class="divide-y divide-slate-200">
                @if($phone)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4 bg-stone-50/50 sm:even:bg-white">
                    <dt class="flex-shrink-0 w-full sm:w-40 text-sm font-medium uppercase tracking-wider text-slate-500">Телефон</dt>
                    <dd class="text-slate-900 font-medium"><a href="tel:{{ preg_replace('/\D/', '', $phone) }}" class="hover:opacity-80" style="color: #243468;">{{ $phone }}</a></dd>
                  </div>
                @endif
                @if($email)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4 bg-white sm:even:bg-stone-50/50">
                    <dt class="flex-shrink-0 w-full sm:w-40 text-sm font-medium uppercase tracking-wider text-slate-500">Email</dt>
                    <dd class="text-slate-900 font-medium"><a href="mailto:{{ $email }}" class="hover:opacity-80" style="color: #243468;">{{ $email }}</a></dd>
                  </div>
                @endif
                @if($address)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4 bg-stone-50/50 sm:even:bg-white">
                    <dt class="flex-shrink-0 w-full sm:w-40 text-sm font-medium uppercase tracking-wider text-slate-500">Адрес</dt>
                    <dd class="text-slate-900">{{ $address }}</dd>
                  </div>
                @endif
                @if($workSchedule)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4 bg-white sm:even:bg-stone-50/50">
                    <dt class="flex-shrink-0 w-full sm:w-40 text-sm font-medium uppercase tracking-wider text-slate-500">Режим работы</dt>
                    <dd class="text-slate-900">{{ $workSchedule }}</dd>
                  </div>
                @endif
              </dl>
              @if(!$phone && !$email && !$address && !$workSchedule)
                <p class="px-6 py-8 text-slate-500">Контактные данные заполняются в разделе «Реквизиты» админ-панели.</p>
              @endif
            </div>
          </div>
        </div>
      </section>

      {{-- Юридические данные --}}
      <section class="py-16 md:py-24 relative bg-stone-50 border-b border-slate-200 swiss-pattern-lines">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="max-w-4xl mx-auto">
            <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
              <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
              Юрлицо
            </p>
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif mb-8" style="color: #243468;">Юридические данные</h2>
            <div class="border border-slate-200 rounded-none overflow-hidden bg-white">
              <dl class="divide-y divide-slate-200">
                @if($orgForm)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4">
                    <dt class="flex-shrink-0 w-full sm:w-48 text-sm font-medium uppercase tracking-wider text-slate-500">Организационно-правовая форма</dt>
                    <dd class="text-slate-900">{{ $orgForm }}</dd>
                  </div>
                @endif
                @if($fullName)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4">
                    <dt class="flex-shrink-0 w-full sm:w-48 text-sm font-medium uppercase tracking-wider text-slate-500">Полное наименование</dt>
                    <dd class="text-slate-900">{{ $fullName }}</dd>
                  </div>
                @endif
                @if($legalName)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4">
                    <dt class="flex-shrink-0 w-full sm:w-48 text-sm font-medium uppercase tracking-wider text-slate-500">Краткое наименование</dt>
                    <dd class="text-slate-900 font-medium" style="color: #243468;">{{ $legalName }}</dd>
                  </div>
                @endif
                @if($director)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4">
                    <dt class="flex-shrink-0 w-full sm:w-48 text-sm font-medium uppercase tracking-wider text-slate-500">Генеральный директор</dt>
                    <dd class="text-slate-900">{{ $director }}</dd>
                  </div>
                @endif
                @if($inn)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4">
                    <dt class="flex-shrink-0 w-full sm:w-48 text-sm font-medium uppercase tracking-wider text-slate-500">ИНН</dt>
                    <dd class="text-slate-900 font-mono">{{ $inn }}</dd>
                  </div>
                @endif
                @if($ogrn)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4">
                    <dt class="flex-shrink-0 w-full sm:w-48 text-sm font-medium uppercase tracking-wider text-slate-500">ОГРН</dt>
                    <dd class="text-slate-900 font-mono">{{ $ogrn }}</dd>
                  </div>
                @endif
                @if($kpp)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4">
                    <dt class="flex-shrink-0 w-full sm:w-48 text-sm font-medium uppercase tracking-wider text-slate-500">КПП</dt>
                    <dd class="text-slate-900 font-mono">{{ $kpp }}</dd>
                  </div>
                @endif
              </dl>
              @if(!$orgForm && !$fullName && !$legalName && !$director && !$inn && !$ogrn && !$kpp)
                <p class="px-6 py-8 text-slate-500">Юридические данные заполняются в разделе «Реквизиты» админ-панели.</p>
              @endif
            </div>
          </div>
        </div>
      </section>

      {{-- Банковские реквизиты --}}
      <section class="py-16 md:py-24 relative bg-white border-b border-slate-200 swiss-pattern-diagonal">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="absolute bottom-0 right-0 w-40 h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="max-w-4xl mx-auto">
            <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
              <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
              Банк
            </p>
            <h2 class="text-3xl md:text-4xl font-bold tracking-tight font-serif mb-8" style="color: #243468;">Банковские реквизиты</h2>
            <div class="border border-slate-200 rounded-none overflow-hidden">
              <dl class="divide-y divide-slate-200">
                @if($bankName)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4 bg-stone-50/50 sm:even:bg-white">
                    <dt class="flex-shrink-0 w-full sm:w-48 text-sm font-medium uppercase tracking-wider text-slate-500">Название банка</dt>
                    <dd class="text-slate-900">{{ $bankName }}</dd>
                  </div>
                @endif
                @if($bik)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4 bg-white sm:even:bg-stone-50/50">
                    <dt class="flex-shrink-0 w-full sm:w-48 text-sm font-medium uppercase tracking-wider text-slate-500">БИК</dt>
                    <dd class="text-slate-900 font-mono">{{ $bik }}</dd>
                  </div>
                @endif
                @if($checkingAccount)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4 bg-stone-50/50 sm:even:bg-white">
                    <dt class="flex-shrink-0 w-full sm:w-48 text-sm font-medium uppercase tracking-wider text-slate-500">Расчётный счёт</dt>
                    <dd class="text-slate-900 font-mono break-all">{{ $checkingAccount }}</dd>
                  </div>
                @endif
                @if($corrAccount)
                  <div class="flex flex-col sm:flex-row sm:py-4 py-3 px-6 gap-2 sm:gap-4 bg-white sm:even:bg-stone-50/50">
                    <dt class="flex-shrink-0 w-full sm:w-48 text-sm font-medium uppercase tracking-wider text-slate-500">Корреспондентский счёт</dt>
                    <dd class="text-slate-900 font-mono break-all">{{ $corrAccount }}</dd>
                  </div>
                @endif
              </dl>
              @if(!$bankName && !$bik && !$checkingAccount && !$corrAccount)
                <p class="px-6 py-8 text-slate-500">Банковские реквизиты заполняются в разделе «Реквизиты» админ-панели.</p>
              @endif
            </div>
          </div>
        </div>
      </section>

      {{-- Лицензия — компактно --}}
      <section class="py-10 md:py-12 relative bg-white border-b border-slate-200">
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="max-w-2xl mx-auto">
            <div class="border border-slate-200 rounded-none bg-stone-50/50 p-5 md:p-6">
              <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">Номер лицензии</h3>
              @if($licenseNumber)
                <p class="text-slate-900 mb-2">{{ $licenseNumber }}</p>
              @else
                <p class="text-slate-600 mb-2">Не указан в настройках</p>
              @endif
              <p class="text-xs text-slate-600 leading-relaxed">
                Номер лицензии на основании которой осуществляется деятельность по возврату просроченной задолженности.
              </p>
            </div>
          </div>
        </div>
      </section>

      {{-- CTA --}}
      <section class="py-20 text-slate-900 relative bg-stone-50 border-b border-slate-200 swiss-pattern-lines">
        <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
          <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 tracking-tight font-serif" style="color: #243468;">Остались вопросы?</h2>
            <p class="text-lg text-slate-700 mb-8">Свяжитесь с нами для уточнения реквизитов или условий сотрудничества</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
              <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-6 text-base font-bold text-white rounded-none uppercase tracking-wider transition-opacity hover:opacity-90" style="background-color: #ED3200;">Связаться с нами</a>
              @if($phone)
                <a href="tel:{{ preg_replace('/\D/', '', $phone) }}" class="inline-flex items-center justify-center px-8 py-6 text-base font-bold border-2 border-slate-900 text-slate-900 rounded-none uppercase tracking-wider hover:bg-slate-50 transition-colors">{{ $phone }}</a>
              @endif
            </div>
          </div>
        </div>
      </section>
    </main>

    <x-footer />
  </div>
</x-layouts.app>
