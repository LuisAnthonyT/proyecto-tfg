@extends('layout')

@section('title', 'Login')

@section('content')
    <!-- component -->
    <div class="bg-white lg:w-4/12 md:6/12 w-10/12 m-auto my-10 shadow-md">
        <div class="py-8 px-8 rounded-xl">
            <h1 class="font-medium text-2xl mt-3 text-center">Registrate</h1>
            <form action="" class="mt-6">
                <div class="my-5 text-sm">
                    <label for="name" class="block text-black">Nombre</label>
                    <input type="text" autofocus id="name"
                        class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Nombre completo" />
                </div>
                <div class="my-5 text-sm">
                    <label for="email" class="block text-black">Correo electrónico</label>
                    <input type="text" autofocus id="email"
                        class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Correo electrónico" />
                </div>
                <div class="my-5 text-sm">
                    <label for="password" class="block text-black">Contraseña</label>
                    <input type="password" id="password"
                        class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Contraseña" />
                </div>
                <div class="my-5 text-sm">
                    <label for="password2" class="block text-black">Repite la contraseña</label>
                    <input type="password" id="password2"
                        class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full" placeholder="Contraseña" />
                </div>

                <button
                    class="block text-center text-white bg-gray-800 p-3 duration-300 rounded-sm hover:bg-black w-full">Registrarme</button>
            </form>
        </div>
    </div>
@endsection
