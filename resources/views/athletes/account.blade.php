@extends('layouts.layout_users')
@section('title', 'Mi cuenta')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="relative overflow-x-auto  sm:rounded-lg">
            <div class="bg-white border border-4 rounded-lg shadow relative m-10">

                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">Mis datos personales</h3>
                </div>
                <div class="p-6 space-y-6">
                    <form action="{{ route('athlete.update', $user)}}" method="POST">
                        @method('put')
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Nombre</label>
                                <input type="text" name="name" id="name" value="{{ $user->name }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                                <input type="email" name="email" id="email" value="{{ $user->email }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                                <p id="emailStatus" class="mt-2 text-sm font-medium text-red-600 text-green-600"></p>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="height" class="text-sm font-medium text-gray-900 block mb-2">Altura</label>
                                <input type="number" step="0.01" name="height" id="height" value="{{ $user->athlete->height }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="weight" class="text-sm font-medium text-gray-900 block mb-2">Peso corporal inicial</label>
                                <input type="number" step="0.01" name="weight" id="weight" value="{{ $user->athlete->weight }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="gender" class="text-sm font-medium text-gray-900 block mb-2">Sexo</label>
                                <input type="text" name="gender" id="gender" value="{{ $user->athlete->gender }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="objetive" class="text-sm font-medium text-gray-900 block mb-2">Objetivo</label>
                                <input type="text" name="objetive" id="objetive" value="{{ $user->athlete->objetive }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="days_available_week" class="text-sm font-medium text-gray-900 block mb-2">Días disponible a la semana</label>
                                <input type="number" name="days_available_week" id="days_available_week" value="{{ $user->athlete->days_available_week }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="date_birth" class="text-sm font-medium text-gray-900 block mb-2">Fecha de nacimiento:</label>
                                <input type="date" name="date_birth" id="date_birth" value="{{ $user->athlete->date_birth }}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            </div>
                        </div>
                        <div class=" mt-5 p-6 border-t border-gray-200 rounded-b flex justify-center">
                            <button
                                class="text-white bg-gray-800 hover:bg-black focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="submit">Modificar datos</button>
                        </div>
                    </form>
                </div>
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center max-w-md mx-auto mb-5"
                        role="alert">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/js/auth/verifyEmail.js" defer></script>
@endsection
