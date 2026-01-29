<x-layouts.app title="Адмирал — Помощь должникам">
  <div class="min-h-screen bg-gradient-to-b from-blue-50 to-white" x-data="{ showModal: false }" @open-lead-modal.window="showModal = true">
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
