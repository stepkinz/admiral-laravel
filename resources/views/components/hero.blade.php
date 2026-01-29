{{-- Hero Section — 1:1 из Next.js LandingContent.tsx (модалка открывается по событию open-lead-modal) --}}
<section class="border-b border-slate-200 swiss-pattern-dots relative overflow-hidden">
  {{-- Фоновое изображение с градиентным размытием --}}
  <div class="absolute inset-0" style="background-image: url('{{ asset('images/background-2.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; transform: scale(1.05);"></div>
  <div class="absolute inset-0" style="background-image: url('{{ asset('images/background-2.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; filter: blur(6px); transform: scale(1.05); -webkit-mask-image: radial-gradient(ellipse 80% 70% at center, black 30%, transparent 70%); mask-image: radial-gradient(ellipse 80% 70% at center, black 30%, transparent 70%);"></div>
  {{-- Overlay для читаемости текста --}}
  <div class="absolute inset-0" style="background: radial-gradient(ellipse 80% 70% at center, rgba(255,255,255,0.92) 0%, rgba(255,255,255,0.78) 50%, rgba(255,255,255,0.65) 100%);"></div>
  {{-- Декоративные элементы --}}
  <div class="absolute top-0 left-0 w-full h-1 bg-slate-900 opacity-10 z-[1]"></div>
  <div class="absolute top-20 left-0 w-1 h-32 bg-slate-900 opacity-5 z-[1]"></div>
  <div class="absolute bottom-20 right-0 w-1 h-32 bg-slate-900 opacity-5 z-[1]"></div>
  <div class="absolute top-1/2 right-10 w-60 h-1 bg-slate-900 opacity-5 z-[1]"></div>

  <div class="container mx-auto px-6 lg:px-12 py-20 lg:py-32 relative z-10">
    <div class="max-w-4xl mx-auto text-center">
      <div class="mb-4">
        <p class="text-xs tracking-widest font-medium mb-8 relative uppercase text-slate-500 swiss-decorative-line pl-20">
          <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
          Лицензированная Коллекторская Организация
        </p>
      </div>

      <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 leading-tight tracking-tight font-serif" style="color: #243468;">
        Остановим звонки и рост процентов по закону
      </h1>

      <p class="text-xl lg:text-2xl mb-12 leading-relaxed max-w-3xl mx-auto text-slate-700 font-light">
        Поможем найти выход. Спокойно, по закону и с уважением к вам.
      </p>

      <div class="flex flex-col items-center gap-6 mb-12">
        <button
          type="button"
          @click="$dispatch('open-lead-modal')"
          class="text-white font-bold text-base px-12 py-6 transition-all rounded-none shadow-none uppercase tracking-wider hover:opacity-90 transition-opacity"
          style="background-color: #ED3200;"
        >
          Узнать, как решить мой вопрос
        </button>
        <p class="text-sm text-slate-600 max-w-md">
          Вы получите <strong class="text-slate-900">бесплатный правовой анализ</strong> вашей ситуации. Это ни к чему не обязывает.
        </p>
      </div>

      {{-- Trust Badge --}}
      <div class="mt-16 pt-8 border-t border-slate-200">
        <div class="flex justify-center items-center gap-6">
          <div class="flex -space-x-3">
            @foreach(['а.jpg', 'b.jpg', 'c.jpg', 'd.jpg', 'e.jpg'] as $i => $img)
              <div class="w-12 h-12 border-2 border-white overflow-hidden bg-slate-300 rounded-none">
                <img src="{{ asset('images/' . $img) }}" alt="Avatar" width="48" height="48" class="w-full h-full object-cover" />
              </div>
            @endforeach
          </div>
          <div>
            <div class="flex items-center gap-1 mb-1">
              @for($s = 1; $s <= 5; $s++)
                <svg class="w-4 h-4 fill-amber-400" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                </svg>
              @endfor
            </div>
            <p class="text-xs font-medium uppercase tracking-widest text-slate-700">
              Нам доверяют по всей России
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
