<header class="bg-white shadow-sm py-2 px-4 sm:px-6 lg:px-8 flex justify-between items-center relative">
    <div class="max-w-[130px]">
        <a href="/">
            <img src="/img/logo.png" alt="logo parrot skies" />
        </a>
    </div>
    <nav class="md:flex space-x-4 hidden">
        <a href="/categories" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">All
            Categories</a>
        <a href="/posts" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">All Posts</a>
    </nav>
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-button" class="md:hidden bg-blue-500 text-white p-2 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
    </button>
</header>

<div id="mobile-menu" class="hidden md:hidden bg-white shadow-sm py-2 px-4 space-y-2 absolute w-full top-20">
    <a href="/categories" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">All
        Categories</a>
    <a href="/posts" class="block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">All Posts</a>
</div>

<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>