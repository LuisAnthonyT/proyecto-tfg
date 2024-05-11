@extends('layouts.layout')

@section('title', 'Login')

@section('content')
    <!-- component -->
    <form action="{{ route('signup') }}" method="post">
        @csrf
        <div class="bg-white lg:w-4/12 md:6/12 w-10/12 m-auto my-10 shadow-md">
            <div class="py-8 px-8 rounded-xl">
                <h1 class="font-medium text-2xl mt-3 text-center">Registrate</h1>
                <form action="" class="mt-6">
                    <div class="my-5 text-sm">
                        <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Nombre</label>
                        <input required type="text" autofocus id="name" name="name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Nombre completo" />
                    </div>
                    <div class="my-5 text-sm">
                        <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Correo electrónico</label>
                        <input required type="text" autofocus id="email" name="email"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Correo electrónico" />
                            <p id="emailStatus" class="mt-2 text-sm font-medium"></p>
                    </div>
                    <div class="my-5 text-sm">
                        <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Especialización</label>
                        <input required type="text" autofocus id="specialization" name="specialization"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Especialización" />
                    </div>
                    <div class="my-5 text-sm">
                        <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Años de experiencia</label>
                        <input required type="number" autofocus id="experiencie" name="experiencie"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Años de experiencia" />
                    </div>
                    <div class="my-5 text-sm">
                        <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Contraseña</label>
                        <input required type="password" id="password" name="password"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Contraseña" />
                    </div>
                    <div class="my-5 text-sm">
                        <label for="password_confirmation" class="text-sm font-medium text-gray-900 block mb-2">Repite la contraseña</label>
                        <input required type="password" id="password_confirmation" name="password_confirmation"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                            placeholder="Repite la contraseña" />
                    </div>
                    <button
                        class="block text-center text-white bg-gray-800 p-3 duration-300 rounded-sm hover:bg-black w-full">Registrarme</button>
                </form>
            </div>
        </div>
    </form>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center max-w-md mx-auto mb-5" role="alert">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
@section('js')
    <script src="/js/auth/verifyEmail.js" defer></script>
@endsection
