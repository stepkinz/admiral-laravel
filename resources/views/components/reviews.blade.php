@props(['reviews'])

{{-- Reviews Section — 1:1 из Next.js LandingContent + ReviewCard --}}
<section class="py-20 relative bg-white border-b border-slate-200 swiss-pattern-dots">
  <div class="absolute top-0 left-1/3 w-px h-full bg-slate-900 opacity-5"></div>
  <div class="absolute top-0 right-1/3 w-px h-full bg-slate-900 opacity-5"></div>
  <div class="absolute top-1/4 left-0 w-32 h-px bg-slate-900 opacity-10"></div>
  <div class="absolute bottom-1/4 right-0 w-32 h-px bg-slate-900 opacity-10"></div>
  <div class="container mx-auto px-4 relative z-10">
    <div class="text-center mb-16 relative">
      <div class="absolute left-1/2 top-0 -translate-x-1/2 w-24 h-px bg-slate-900 opacity-10"></div>
      <div class="absolute left-1/2 bottom-0 -translate-x-1/2 w-24 h-px bg-slate-900 opacity-10"></div>
      <p class="text-xs tracking-widest font-medium mb-6 relative uppercase text-slate-500 pl-20">
        <span class="absolute left-0 top-1/2 -translate-y-1/2 w-16 h-px bg-slate-900 opacity-20"></span>
        Отзывы клиентов
      </p>
      <h2 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight font-serif" style="color: #243468;">Отзывы наших клиентов</h2>
      <p class="text-base max-w-2xl mx-auto text-slate-700 font-light">Реальные истории людей, которым мы помогли решить проблему с долгами</p>
    </div>

    @if($reviews->isEmpty())
      <div class="text-center py-12 px-4 text-slate-500 max-w-6xl mx-auto">Отзывов пока нет</div>
    @else
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-0 max-w-6xl mx-auto border border-slate-200 rounded-none">
        @foreach($reviews as $index => $review)
          <div class="h-full border-r border-b border-slate-200 {{ $index === 0 || $index === 1 ? 'md:border-b' : '' }} {{ $index === 0 ? 'lg:border-b' : '' }} {{ $index === 1 ? 'lg:border-b lg:border-r' : '' }} {{ $index === 2 ? 'lg:border-b lg:border-r-0' : '' }} last:border-r-0 bg-white">
            <div class="p-8 h-full flex flex-col">
              <div class="flex items-start gap-4 mb-4">
                @php $reviewDate = $review->review_date ?? $review->created_at ?? null; @endphp
                <div class="flex-shrink-0 h-12 w-12 rounded-full overflow-hidden border border-slate-200 bg-slate-100 flex items-center justify-center">
                  @php $photoUrl = $review->photo_url ?? null; @endphp
                  @if($photoUrl)
                    <img src="{{ $photoUrl }}" alt="{{ $review->author }}" class="h-full w-full object-cover" loading="lazy" onerror="this.style.display='none'; this.nextElementSibling?.classList.remove('hidden');" />
                    <span class="hidden text-lg font-bold text-slate-900" style="color: #243468;">{{ Str::limit($review->author ?? '', 1, '') }}</span>
                  @else
                    <span class="text-lg font-bold text-slate-900" style="color: #243468;">{{ Str::limit($review->author ?? '', 1, '') }}</span>
                  @endif
                </div>
                <div class="flex-1">
                  <h4 class="font-bold text-base uppercase tracking-wider text-slate-900 mb-1">{{ $review->author }}</h4>
                  <div class="flex items-center gap-2">
                    <div class="flex gap-0.5">
                      @for($s = 1; $s <= 5; $s++)
                        <svg class="h-4 w-4 {{ $s <= ($review->rating ?? 5) ? 'fill-amber-400 text-amber-400' : 'fill-slate-200 text-slate-200' }}" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" /></svg>
                      @endfor
                    </div>
                    @if($reviewDate)<span class="text-xs text-slate-500">{{ $reviewDate->format('d.m.Y') }}</span>@endif
                  </div>
                </div>
              </div>
              <p class="text-sm text-slate-700 leading-relaxed">{{ $review->text }}</p>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>
