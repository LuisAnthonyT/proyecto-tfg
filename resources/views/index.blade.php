@extends('layouts.layout')
@section('content')
    <!-- component -->
    <div class="w-full">
        <div class="flex bg-white" style="height:600px;">
            <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 md:text-4xl">Crea y gestiona <span
                            class="text-indigo-600">planificaciones</span></h2>
                    <p class="mt-6 text-justify text-sm text-gray-600 md:text-base">¡Bienvenido al centro de gestión definitivo para
                        entrenadores! Descubre una plataforma todo en uno diseñada para simplificar tu trabajo diario. Desde
                        seguimiento de entrenamientos y planes de nutrición hasta un completo registro de tus atletas,
                        nuestra herramienta te permite llevar un control eficiente y efectivo de cada aspecto del
                        rendimiento de tus deportistas. Optimiza tu tiempo, maximiza los resultados y lleva tu entrenamiento
                        al siguiente nivel con nuestra solución integral.</p>
                    <div class="flex justify-center lg:justify-start mt-6">
                        <a class="text-white bg-gray-800 hover:bg-black focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            href="{{ route('signup')}}">Empezar</a>
                        <a class="ml-3 text-white bg-indigo-600 hover:bg-indigo-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            href="#">Leer más</a>
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
@endsection
