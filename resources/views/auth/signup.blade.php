@extends('layout')

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
                        <label for="name" class="block text-black">Nombre</label>
                        <input required type="text" autofocus id="name" name="name"
                            class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full"
                            placeholder="Nombre completo" />
                    </div>
                    <div class="my-5 text-sm">
                        <label for="email" class="block text-black">Correo electrónico</label>
                        <input required type="text" autofocus id="email" name="email"
                            class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full"
                            placeholder="Correo electrónico" />
                    </div>
                    <div class="my-5 text-sm">
                        <label for="phone_number" class="block text-black">Número de teléfono</label>
                        <input required type="tel" autofocus id="phone_number" name="phone_number"
                            class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full"
                            placeholder="Número de teléfono" />
                    </div>
                    <div class="my-5 text-sm">
                        <label for="birthdate" class="block text-black">Fecha de nacimiento:</label>
                        <input required type="date" autofocus id="birthdate" name="birthdate"
                            class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full"
                            placeholder="Fecha de nacimiento" />
                    </div>
                    <div class="my-5 text-sm">
                        <label for="password" class="block text-black">Contraseña</label>
                        <input required type="password" id="password" name="password"
                            class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full"
                            placeholder="Contraseña" />
                    </div>
                    <div class="my-5 text-sm">
                        <label for="password2" class="block text-black">Repite la contraseña</label>
                        <input required type="password" id="password2" name="password2"
                            class="rounded-sm px-4 py-3 mt-3 focus:outline-none bg-gray-100 w-full"
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
