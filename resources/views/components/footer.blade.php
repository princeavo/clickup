<footer class="relative bg-gradient-to-b from-gray-900 via-gray-950 to-black text-gray-300 pt-16 pb-8 px-6 md:px-12">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">

        {{-- Logo + About --}}
        <div>
            <img src="{{ $footer['logo'] }}" alt="Logo" class="w-36 mb-6">
            <p class="text-gray-400 leading-relaxed">
                {{ $footer['about'] }}
            </p>
        </div>

        {{-- Navigation Links --}}
        @foreach ($footer['links'] as $section)
            <div>
                <h3 class="text-lg font-semibold text-white mb-4 relative inline-block">
                    {{ $section['title'] }}
                    <span class="absolute left-0 -bottom-1 w-8 h-0.5 bg-gradient-to-r from-indigo-500 to-purple-500"></span>
                </h3>
                <ul class="space-y-3">
                    @foreach ($section['items'] as $item)
                        <li>
                            <a href="{{ $item['url'] }}"
                               class="transition-all duration-300 hover:text-white hover:pl-2 flex items-center">
                                <span class="w-1.5 h-1.5 bg-indigo-500 rounded-full mr-2 opacity-0 group-hover:opacity-100 transition"></span>
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
                   class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 hover:bg-indigo-600
                          transition-all duration-500 hover:scale-110 hover:shadow-[0_0_15px_rgba(99,102,241,0.5)]">
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
