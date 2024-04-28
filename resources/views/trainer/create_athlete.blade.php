@extends('layout_users')
@section('title', 'Crear atleta')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="relative overflow-x-auto  sm:rounded-lg">
            <div class="bg-white border border-4 rounded-lg shadow relative m-10">

                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">Crear atleta</h3>
                </div>
                <div class="p-6 space-y-6">
                    <form action="{{ route('create-athlete' , $trainerId) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name" class="text-sm font-medium text-gray-900 block mb-2">Nombre</label>
                                <input required type="text" name="name" id="name" value="{{ old('name')}}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="Ejemplo: Juan Martinez">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                                <input required type="email" name="email" id="email" value="{{ old('email')}}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="Ejemplo: juan@gmail.com">
                                    <p id="emailStatus" class="mt-2 text-sm font-medium"></p>
                                </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="height" class="text-sm font-medium text-gray-900 block mb-2">Altura</label>
                                <input required type="number" step="0.01" name="height" id="height" value="{{ old('height')}}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="Ejemplo: 1,78">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="weight" class="text-sm font-medium text-gray-900 block mb-2">Peso</label>
                                <input required type="number" step="0.01" name="weight" id="weight" value="{{ old('weight')}}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="Ejemplo: 80,2">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="gender" class="text-sm font-medium text-gray-900 block mb-2">Sexo</label>
                                <input required type="text" name="gender" id="gender" value="{{ old('gender')}}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="Ejemplo: hombre">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="objetive" class="text-sm font-medium text-gray-900 block mb-2">Objetivo</label>
                                <input required type="text" name="objetive" id="objetive" value="{{ old('objetive')}}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="Ejemplo: aumentar masa muscular">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="days_available_week"
                                    class="text-sm font-medium text-gray-900 block mb-2">Disponibilidad de dias a la
                                    semana</label>
                                <input required type="number" min="0" name="days_available_week" id="days_available_week" value="{{ old('days_available_week')}}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="Ejemplo: 4">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="date_birth" class="text-sm font-medium text-gray-900 block mb-2">Fecha de
                                    nacimiento</label>
                                <input required type="date" name="date_birth" id="date_birth" value="{{ old('date_birth')}}"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="password"
                                    class="text-sm font-medium text-gray-900 block mb-2">Contraseña
                                </label>
                                <input required type="password" name="password" id="password"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="Contraseña">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="password_confirmation"
                                    class="text-sm font-medium text-gray-900 block mb-2">Repite la contraseña
                                </label>
                                <input required type="password" name="password_confirmation" id="password_confirmation"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    placeholder="Repite la contraseña">
                            </div>
                        </div>
                        <div class=" mt-5 p-6 border-t border-gray-200 rounded-b flex justify-center">
                            <button
                                class="text-white bg-gray-800 hover:bg-black focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="submit">Crear atleta</button>
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
