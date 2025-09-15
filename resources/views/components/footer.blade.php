<footer class="relative bg-gradient-to-b from-[#0a0a0a] via-[#111111] to-black text-gray-300 pt-16 pb-8 px-6 md:px-12 font-[Sora]">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">

        {{-- Logo + About --}}
        <div>
            <img src="{{ $footer['logo'] }}" alt="Logo" class="w-40 mb-6">
            <p class="text-gray-400 leading-relaxed">
                {{ $footer['about'] }}
            </p>
        </div>

        {{-- Navigation Links --}}
        @foreach ($footer['links'] as $section)
            <div>
                <h3 class="text-lg font-bold text-white mb-4 relative inline-block">
                    {{ $section['title'] }}
                    <span class="absolute left-0 -bottom-1 w-10 h-0.5 bg-gradient-to-r from-[#ffb845] to-[#ff8c00] rounded-full"></span>
                </h3>
                <ul class="space-y-3">
                    @foreach ($section['items'] as $item)
                        <li>
                            <a href="{{ $item['url'] }}"
                               class="flex items-center text-gray-400 transition-all duration-300 hover:text-white hover:translate-x-2">
                                <span class="w-1.5 h-1.5 bg-gradient-to-r from-[#ffb845] to-[#ff8c00] rounded-full mr-2"></span>
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach

    </div>

    {{-- Socials + Copyright --}}
    <div class="mt-12 border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-6">

        {{-- Social Icons --}}
        <div class="flex space-x-6">
            @foreach ($footer['socials'] as $social)
                <a href="{{ $social['url'] }}" target="_blank"
                   class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-800
                          hover:bg-gradient-to-r hover:from-[#ffb845] hover:to-[#ff8c00]
                          transition-all duration-500 hover:scale-110 hover:shadow-[0_0_20px_rgba(255,140,0,0.6)]">
                    @if ($social['icon'] === 'facebook')
                        <x-icons.facebook class="w-5 h-5 text-white" />
                    @elseif ($social['icon'] === 'twitter')
                        <x-icons.twitter class="w-5 h-5 text-white" />
                    @elseif ($social['icon'] === 'linkedin')
                        <x-icons.linkedin class="w-5 h-5 text-white" />
                    @elseif ($social['icon'] === 'tiktok')
                        <x-icons.tiktok class="w-5 h-5 text-white" />
                    @endif
                </a>
            @endforeach
        </div>

        {{-- Copyright --}}
        <p class="text-sm text-gray-500">
            {{ $footer['copyright'] }}
        </p>
    </div>
</footer>
