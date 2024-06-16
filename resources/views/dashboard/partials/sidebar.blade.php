<div class="hidden w-64 px-2 space-y-6 text-white bg-gray-800 py-7 md:block sidebar">
    <a href="#" class="flex items-center px-4 space-x-2 text-white">
        <span class="text-2xl font-extrabold">Dashboard</span>
    </a>
    <nav>
        <a href="{{ route('dashboard.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('dashboard.index') ? 'bg-zinc-100 text-zinc-500' : '' }}"><i class="ri-home-4-line"></i> Home</a>
        <a href="{{ route('admin.project.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.product.index') ? 'bg-zinc-100 text-zinc-500' : '' }}"><i class="ri-add-circle-fill"></i>Projetos</a>
        <a href="{{ route('admin.client.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.client.index') ? 'bg-zinc-100 text-zinc-500' : '' }}"><i class="ri-add-circle-fill"></i>Clientes</a>
    </nav>

</div>
@push('script')
<script>
    const sidebar = document.querySelector('.sidebar');
    const main = document.querySelector('.main');
    const menuButton = document.querySelector('header button');

    menuButton.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
        main.classList.toggle('overflow-hidden');
    });
</script>
@endpush
