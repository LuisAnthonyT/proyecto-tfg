{{-- <header class="bg-gray-800 text-white">
    <div class="container mx-auto flex justify-between items-center py-4">
      <a href="/" class="text-xl font-bold">System Training</a>
      <nav class="flex space-x-4 font-semibold">
        <a href="{{ route('signupForm')}}" class="rounded hover:bg-white hover:text-gray-900 hover:font-medium py-2 px-2 md:mx-2">Regístrate</a>
        <a href="{{ route('loginForm')}}" class="rounded hover:bg-white hover:text-gray-900 hover:font-medium py-2 px-2 md:mx-2">Iniciar sesión</a>
      </nav>
    </div>
  </header> --}}
  <nav class="relative bg-gray-800 text-white">
    <div class="container px-6 py-4 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
            <a href="/" class="text-xl font-bold">System Training</a>

            <!-- Mobile menu button -->
            <div class="flex lg:hidden">
                <button id="btnOpen" type="button" class="text-white dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                    <svg id="iconOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"  d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                    <svg id="iconClose" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div id="menuMobile" class="bg-gray-800 hidden absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out md:mt-0 md:p-0 md:top-0 md:relative md:bg-transparent md:w-auto md:opacity-100 md:translate-x-0 md:flex md:items-center">
            <div class="flex flex-col md:flex-row md:mx-6">
                <a href="{{ route('signupForm')}}" class="rounded hover:bg-white hover:text-gray-900 hover:font-medium py-2 px-2 md:mx-2">Regístrate</a>
                <a href="{{ route('loginForm')}}" class="rounded hover:bg-white hover:text-gray-900 hover:font-medium py-2 px-2 md:mx-2">Iniciar sesión</a>
            </div>
        </div>
    </div>
</nav>
<script>
    let open = false;
    const btnOpen = document.getElementById('btnOpen');
    const menuMobile = document.getElementById('menuMobile');
    const iconOpen = document.getElementById('iconOpen');
    const iconClose = document.getElementById('iconClose');

    btnOpen.addEventListener('click', () => {
        open = !open;
        if (open) {
            menuMobile.classList.remove('hidden');
            iconOpen.classList.add('hidden');
            iconClose.classList.remove('hidden');
        } else {
            menuMobile.classList.add('hidden');
            iconOpen.classList.remove('hidden');
            iconClose.classList.add('hidden');
        }
    });
</script>
