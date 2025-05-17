<nav class="nav-glass py-4 px-8 flex items-center justify-between sticky top-0 z-50">
    <!-- Logo Section - Bigger Logo -->
    <div class="flex items-center">
        <a href="{{ route('home') }}" class="flex items-center overflow-visible">
            <img src="{{ asset('img/LogoD.png') }}" 
                 alt="StreamMuse Logo" 
                 class="h-[120px] w-auto object-contain transform hover:scale-105 transition-transform -my-4">
        </a>
    </div>
 
    <!-- Search Bar with Filters -->
    <div class="flex-1 mx-8 max-w-3xl">
        <form action="{{ route('search') }}" method="GET">
            <div class="flex justify-center mb-2">
                <div class="inline-flex space-x-2 rounded-full bg-gray-800/90 p-1 backdrop-blur-sm border border-gray-700/50">
                    <button type="button" data-type="all" 
                            class="search-filter px-4 py-1 rounded-full text-sm font-medium transition-all duration-300 
                                   {{ request('type') === 'all' ? 'bg-purple-600/90 text-white shadow-lg' : 'bg-transparent text-gray-300 hover:bg-purple-600/50 hover:text-white' }}">
                        All
                    </button>
                    <button type="button" data-type="movie" 
                            class="search-filter px-4 py-1 rounded-full text-sm font-medium transition-all duration-300 
                                   {{ request('type') === 'movie' ? 'bg-purple-600/90 text-white shadow-lg' : 'bg-transparent text-gray-300 hover:bg-purple-600/50 hover:text-white' }}">
                        Movies
                    </button>
                    <button type="button" data-type="series" 
                            class="search-filter px-4 py-1 rounded-full text-sm font-medium transition-all duration-300 
                                   {{ request('type') === 'series' ? 'bg-purple-600/90 text-white shadow-lg' : 'bg-transparent text-gray-300 hover:bg-purple-600/50 hover:text-white' }}">
                        Series
                    </button>
                    <button type="button" data-type="kdrama" 
                            class="search-filter px-4 py-1 rounded-full text-sm font-medium transition-all duration-300 
                                   {{ request('type') === 'kdrama' ? 'bg-purple-600/90 text-white shadow-lg' : 'bg-transparent text-gray-300 hover:bg-purple-600/50 hover:text-white' }}">
                        K-Drama
                    </button>
                    <button type="button" data-type="anime" 
                            class="search-filter px-4 py-1 rounded-full text-sm font-medium transition-all duration-300 
                                   {{ request('type') === 'anime' ? 'bg-purple-600/90 text-white shadow-lg' : 'bg-transparent text-gray-300 hover:bg-purple-600/50 hover:text-white' }}">
                        Anime
                    </button>
                    <input type="hidden" name="type" id="search-type" value="{{ request('type') }}">
                </div>
            </div>
        </form>
    </div>

    <!-- User Actions -->
    <div class="flex items-center space-x-4">
        <a href="{{ route('show_list', Auth::user()->id) }}" 
           class="bg-purple-600/90 hover:bg-purple-700 px-4 py-2 rounded-full text-sm font-medium flex items-center whitespace-nowrap transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
            <i class="fas fa-bookmark mr-2"></i> Watchlist
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" 
                    class="bg-gray-700/90 hover:bg-gray-600 px-4 py-2 rounded-full text-sm font-medium flex items-center whitespace-nowrap transition-all duration-300 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
        </form>

    <form action="{{ route('profile', auth()->id()) }}" method="GET" class="profile-form">
        <button type="submit" class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-indigo-500 flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 group">
            <span class="text-white font-medium text-sm group-hover:scale-110 transition-transform">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </span>
        </button>
    </form>
   </div>
</nav>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize - no filter selected by default
        if(!document.getElementById('search-type').value) {
            document.querySelectorAll('.search-filter').forEach(btn => {
                btn.classList.remove('bg-purple-600/90', 'text-white', 'shadow-lg');
                btn.classList.add('bg-transparent', 'text-gray-300');
            });
        }

        document.querySelectorAll('.search-filter').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active state from all buttons
                document.querySelectorAll('.search-filter').forEach(b => {
                    b.classList.remove('bg-purple-600/90', 'text-white', 'shadow-lg');
                    b.classList.add('bg-transparent', 'text-gray-300');
                });
                
                // Add active state to clicked button
                this.classList.add('bg-purple-600/90', 'text-white', 'shadow-lg');
                this.classList.remove('bg-transparent', 'text-gray-300');
                
                // Update hidden input
                document.getElementById('search-type').value = this.dataset.type;
                
                // Submit form
                this.closest('form').submit();
            });
        });
    });
</script>
@endpush