@extends('layouts.layout')
@section('content')
    {{-- SECTION 1 --}}
    <section>
        <div class="w-full">
            <div class="flex bg-white" style="height:550px;">
                <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 md:text-4xl">Crea y gestiona <span
                                class="text-indigo-600">planificaciones</span></h2>
                        <p class="mt-6 text-justify text-sm text-gray-900 md:text-base">¡Bienvenido al centro de gestión
                            definitivo para
                            entrenadores! Descubre una plataforma todo en uno diseñada para simplificar tu trabajo diario.
                            Desde
                            seguimiento de entrenamientos y planes de nutrición hasta un completo registro de tus atletas.
                        </p>
                        <div class="flex justify-center lg:justify-start mt-6">
                            <a class="text-white bg-gray-800 hover:bg-black focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                href="{{ route('signup') }}">Empezar</a>
                            <a class="ml-3 text-white bg-indigo-600 hover:bg-indigo-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                href="#herramientas">Leer más</a>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
                    <div class="h-full object-cover"
                        style="background-image: url(https://i.etsystatic.com/25154806/r/il/616279/3482872021/il_570xN.3482872021_cckw.jpg)">
                        <div class="h-full bg-black opacity-25"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 2 --}}

    <section id="herramientas" class="py-12">
        <div class="container px-6 mx-auto">
            <h1 class="text-2xl font-semibold text-center text-gray-800 capitalize lg:text-3xl dark:text-white">
                Explora nuestras <br><span class="text-indigo-600">Herramientas</span>
            </h1>

            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-16 md:grid-cols-2 xl:grid-cols-3">
                <div class="flex flex-col items-center p-6 space-y-3 text-center bg-gray-100 rounded-xl dark:bg-gray-800">
                    <span class="inline-block p-3 text-indigo-600 bg-blue-100 rounded-full dark:text-white dark:bg-blue-500">
                        <svg class="flex-shrink-0 w-6 h-6 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor">
                            <path
                                d="m826-585-56-56 30-31-128-128-31 30-57-57 30-31q23-23 57-22.5t57 23.5l129 129q23 23 23 56.5T857-615l-31 30ZM346-104q-23 23-56.5 23T233-104L104-233q-23-23-23-56.5t23-56.5l30-30 57 57-31 30 129 129 30-31 57 57-30 30Zm397-336 57-57-303-303-57 57 303 303ZM463-160l57-58-302-302-58 57 303 303Zm-6-234 110-109-64-64-109 110 63 63Zm63 290q-23 23-57 23t-57-23L104-406q-23-23-23-57t23-57l57-57q23-23 56.5-23t56.5 23l63 63 110-110-63-62q-23-23-23-57t23-57l57-57q23-23 56.5-23t56.5 23l303 303q23 23 23 56.5T857-441l-57 57q-23 23-57 23t-57-23l-62-63-110 110 63 63q23 23 23 56.5T577-161l-57 57Z" />
                        </svg>
                    </span>
                    <h1 class="text-xl font-semibold text-gray-700 capitalize dark:text-white">Entrenamiento</h1>
                    <p class="text-gray-500 dark:text-gray-300">
                        Puedes crear una organización de entrenamiento, permitiendo crear diferentes sesiones para una mayor claridad.
                    </p>
                </div>

                <div class="flex flex-col items-center p-6 space-y-3 text-center bg-gray-100 rounded-xl dark:bg-gray-800">
                    <span class="inline-block p-3 text-indigo-600 bg-blue-100 rounded-full dark:text-white dark:bg-blue-500">
                        <svg class="flex-shrink-0 w-6 h-6 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor">
                            <path
                                d="M480-120q-117 0-198.5-81.5T200-400q0-94 55.5-168.5T401-669q-20-5-39-14.5T328-708q-33-33-42.5-78.5T281-879q47-5 92.5 4.5T452-832q23 23 33.5 52t13.5 61q13-31 31.5-58.5T572-828q11-11 28-11t28 11q11 11 11 28t-11 28q-22 22-39 48.5T564-667q88 28 142 101.5T760-400q0 117-81.5 198.5T480-120Zm0-80q83 0 141.5-58.5T680-400q0-83-58.5-141.5T480-600q-83 0-141.5 58.5T280-400q0 83 58.5 141.5T480-200Zm0-200Z" />
                        </svg>
                    </span>
                    <h1 class="text-xl font-semibold text-gray-700 capitalize dark:text-white">Nutrición</h1>
                    <p class="text-gray-500 dark:text-gray-300">
                        Puedes crear registros nutricionales teniendo en cuenta los macronutrientes esenciales y calorías totales.
                    </p>
                </div>

                <div class="flex flex-col items-center p-6 space-y-3 text-center bg-gray-100 rounded-xl dark:bg-gray-800">
                    <span class="inline-block p-3 text-indigo-600 bg-blue-100 rounded-full dark:text-white dark:bg-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </span>
                    <h1 class="text-xl font-semibold text-gray-700 capitalize dark:text-white">Registro</h1>
                    <p class="text-gray-500 dark:text-gray-300">
                        Puedes visualizar la evolución del peso corporal de cada uno de sus atletas.
                    </p>
                </div>
            </div>
        </div>
    </section>


    {{-- SECTION 3 --}}
    <section class="bg-gray-100 ">
        <div class="container px-4 py-16 mx-auto lg:flex lg:items-center lg:justify-between">
            <h2 class="text-2xl font-semibold tracking-tight text-gray-800 xl:text-3xl dark:text-white">
                Únete a nosotros y disfrute de todas las ventajas de nuestra plataforma
            </h2>

            <div class="mt-8 lg:mt-0">
                <div class="flex flex-col space-y-3 sm:space-y-0 sm:flex-row sm:-mx-2">

                    <a href="{{ route('signupForm')}}" class="px-6 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-300 transform bg-indigo-600 rounded-lg focus:ring focus:ring-blue-300 focus:ring-opacity-80 fo sm:mx-2 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                        Empezar
                    </a>
                </div>

                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300">El registro es totamente gratuito, aprovecha la oportunidad!</p>
            </div>
        </div>
    </section>
@endsection
