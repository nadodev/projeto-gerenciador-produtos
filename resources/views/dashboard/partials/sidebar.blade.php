<div class="hidden w-64 px-2 space-y-6 text-white bg-gray-800 py-7 md:block sidebar">
    <a href="#" class="flex items-center px-4 space-x-2 text-white">
        <span class="text-2xl font-extrabold">Dashboard</span>
    </a>
    <nav>
        <a href="{{ route('dashboard.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('dashboard.index') ? 'bg-zinc-100 text-zinc-500' : '' }}"><i class="ri-home-4-line"></i> Home</a>
        <a href="{{ route('category.create') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('category.create') ? 'bg-zinc-100 text-zinc-500' : '' }}"><i class="ri-add-circle-fill"></i> Cadastrar Categoria</a>
        <a href="{{ route('category.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('category.index') ? 'bg-zinc-100 text-zinc-500' : '' }}"><i class="ri-archive-fill"></i> Listagem de Categoria</a>
        <a href="{{ route('products.create') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('products.create') ? 'bg-zinc-100 text-zinc-500' : '' }}"><i class="ri-add-circle-fill"></i> Cadastrar Produtos</a>
        <a href="{{ route('products.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('products.index') ? 'bg-zinc-100 text-zinc-500' : '' }}"><i class="ri-archive-fill"></i> Listagem de Produtos</a>
        <a href="{{ route('report.ranking') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('report.ranking') ? 'bg-zinc-100 text-zinc-500' : '' }}"><i class="ri-bar-chart-2-fill"></i> Ranking de Saídas</a>
        <a href="{{ route('movements.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('movements.index') ? 'bg-zinc-100 text-zinc-500' : '' }}"><i class="ri-align-item-right-fill"></i> Movimentação</a>
        <a href="{{ route('product-history.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('product-history.index') ? 'bg-zinc-100 text-zinc-500' : '' }}"><i class="ri-git-merge-fill"></i> Histórico</a>
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
