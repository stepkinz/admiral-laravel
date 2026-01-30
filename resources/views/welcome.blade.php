<x-layouts.app title="Адмирал — Помощь должникам">
  @php
    $openLeadModalOnLoad = $errors->has('phone') || $errors->has('name') || $errors->has('personal_data_consent');
  @endphp
  <div class="min-h-screen bg-gradient-to-b from-blue-50 to-white" x-data="{ showModal: {{ $openLeadModalOnLoad ? 'true' : 'false' }} }" @open-lead-modal.window="showModal = true">
    <x-top-bar />
    <x-header />

    <main class="min-h-screen">
      <x-hero />
      <x-empathy />
      <x-trust />
      <x-how-we-help />
      <x-step-by-step />
      <x-case-studies />
      <x-team-section />
      <x-debt-calculator />
      <x-reviews :reviews="$reviews" />
      <x-faq :faqs="$faqs" />
      <x-final-cta />
      @if(isset($settings) && filled($settings->seo_text))
      <section class="container mx-auto px-4 py-8 max-w-site text-slate-600 text-sm prose prose-slate max-w-none" aria-label="Дополнительная информация для поисковых систем">
        <div class="border-t border-slate-200 pt-6">
          {!! $settings->seo_text !!}
        </div>
      </section>
      @endif
    </main>

    <x-footer />

    {{-- Одна модалка заявки на всю страницу (как в Next.js Dialog) --}}
    <x-lead-modal />

    @if(session('lead_success'))
      <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 5000)"
        x-transition
        class="fixed bottom-5 right-5 bg-green-500 text-white p-4 rounded-xl shadow-lg z-50"
      >
        Заявка отправлена. Мы свяжемся с вами в ближайшее время.
      </div>
    @endif
  </div>
</x-layouts.app>
