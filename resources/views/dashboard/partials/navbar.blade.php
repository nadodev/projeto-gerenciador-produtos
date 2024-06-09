<header class="bg-white shadow-md w-full px-4 py-4">
    <div class="flex items-center justify-between container mx-auto">
        <div class="md:hidden">
            <button class="text-gray-500 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <div class="text-2xl font-semibold">Dashboard</div>
        <div class="flex items-center space-x-4">
            <a href="#" class="text-gray-600" id="logout-link">Sair</a>
            <form id="logout-form" action="{{ route('logout') }}" method="post">
                @csrf
            </form>
        </div>
    </div>
</header>
@push('script')
<script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });
</script>
@endpush
