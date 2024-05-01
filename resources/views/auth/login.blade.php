@extends('layout')

@section('title', 'Iniciar sesión')

@section('content')
    <div class="">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <!-- component -->
            <div class="bg-white lg:w-4/12 md:6/12 w-10/12 m-auto my-10 shadow-md">
                <div class="py-8 px-8 rounded-xl">
                    <h1 class="font-medium text-2xl mt-3 text-center">Iniciar sesión</h1>
                    <form action="" class="mt-6">
                        <div class="my-5 text-sm">
                            <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Correo electrónico</label>
                            <input required type="text" autofocus id="email" name="email"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Correo electrónico" />
                        </div>
                        <div class="my-5 text-sm">
                            <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Contraseña</label>
                            <input required type="password" id="password" name="password"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Contraseña" />
                            <div class="flex justify-end mt-2 text-xs text-gray-600">
                                <a href="#">¿Has olvidado la contraseña?</a>
                            </div>
                        </div>

                        <button
                            class="block text-center text-white bg-gray-800 p-3 border-t duration-300 rounded-sm hover:bg-black w-full">Iniciar
                            sesión</button>
                    </form>

                    {{-- <div class="grid md:grid-cols-2 gap-2 mt-7">
                <div>
                    <button
                    class="text-center w-full text-white bg-blue-900 p-3 duration-300 rounded-sm hover:bg-blue-700">Facebook</button>
                </div>
                <div>
                    <button
                    class="text-center w-full text-white bg-blue-400 p-3 duration-300 rounded-sm hover:bg-blue-500">Twitter</button>
                </div>
            </div> --}}

                    <p class="mt-12 text-xs text-center font-light text-gray-400">¿No tienes cuenta? <a
                            href="{{ route('signupForm') }}" class="text-black font-medium"> Crear cuenta</a></p>
                </div>
            </div>
        </form>
    </div>
@endsection
