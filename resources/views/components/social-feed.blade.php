@props(['posts'])

<section class="relative py-24 bg-black">
    <div class="max-w-7xl mx-auto px-6">
        @if($posts->isEmpty())
            <div class="text-center py-16">
                <p class="text-gray-400 text-lg">Aucune publication pour le moment.</p>
            </div>
        @else
            <!-- Grille de posts -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $index => $post)
                    <div class="relative group opacity-0 translate-y-10 transition-all duration-700"
                         style="transition-delay: {{ $index * 100 }}ms"
                         x-data
                         x-intersect:enter="$el.classList.remove('opacity-0','translate-y-10'); $el.classList.add('opacity-100','translate-y-0')">
                        
                        <a href="{{ $post->permalink_url ?? $post->share_url }}" 
                           target="_blank"
                           rel="noopener noreferrer"
                           class="block h-full bg-[#111111]/80 backdrop-blur-xl rounded-xl overflow-hidden border-2 border-gray-800
                                  hover:border-orange-500 hover:shadow-xl hover:shadow-orange-500/20
                                  transition-all duration-300">
                            
                            <!-- Image -->
                            @if(($post->has_image ?? false) || ($post->has_media ?? false))
                                <div class="relative h-64 overflow-hidden">
                                    <img src="{{ $post->full_picture ?? $post->main_image }}" 
                                         alt="Post image"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                    
                                    <!-- Platform badge -->
                                    <div class="absolute top-4 left-4">
                                        @if(isset($post->facebook_id))
                                            <span class="px-3 py-1 rounded-full bg-blue-600 text-white text-xs font-bold flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                                </svg>
                                                Facebook
                                            </span>
                                        @else
                                            <span class="px-3 py-1 rounded-full bg-blue-700 text-white text-xs font-bold flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                                </svg>
                                                LinkedIn
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Contenu -->
                            <div class="p-6">
                                <!-- Date -->
                                <div class="flex items-center gap-2 text-sm text-gray-400 mb-4">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>{{ $post->published_at->diffForHumans() }}</span>
                                </div>

                                <!-- Message -->
                                @if($post->message ?? $post->text)
                                    <p class="text-gray-300 leading-relaxed mb-4">
                                        {{ $post->excerpt }}
                                    </p>
                                @endif

                                <!-- Stats -->
                                <div class="flex items-center gap-4 text-sm text-gray-400 pt-4 border-t border-gray-800">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"/>
                                        </svg>
                                        <span>{{ $post->likes_count }}</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
                                        </svg>
                                        <span>{{ $post->comments_count }}</span>
                                    </div>
                                    @if($post->shares_count > 0)
                                        <div class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                                            </svg>
                                            <span>{{ $post->shares_count }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
