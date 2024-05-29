@extends('layouts.layout_planning')
@section('title', 'Nutrición')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="flex items-center justify-between mb-3">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white"></h5>
            <div class="flex items-center">
                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                    class="ml-2 px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ml-2">
                    <svg class="w-4 h-4 text-white me-2" xmlns="http://www.w3.org/2000/svg" height="24px"
                        viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
                        <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                    </svg>
                    Añadir
                </button>
            </div>
        </div>
        @if ($registers->isEmpty())
            <div class="flex items-center p-4 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">No hay nutrición</span>
                </div>
            </div>
        @else
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-center rtl:text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Dias
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Carbohidratos
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Proteinas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Grasas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Calorías Totales
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registers as $register)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $register->day_type }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $register->carbohydrates }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $register->proteins}}
                            </td>
                            <td class="px-6 py-4">
                                {{ $register->fats }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $register->calories }}
                            </td>
                            <td class="px-6 py-4">
                                <button data-modal-target="modify-nutrition-modal{{$register->id}}"
                                    data-modal-toggle="modify-nutrition-modal{{$register->id}}" type="button"
                                    class="px-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                    Modificar
                                </button>
                                <button data-modal-target="delete-nutrition-modal{{$register->id}}"
                                    data-modal-toggle="delete-nutrition-modal{{$register->id}}" type="button"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    @include('modals.nutrition.add_nutrition')
    @include('modals.nutrition.delete_nutrtition')
    @include('modals.nutrition.modify_nutrition')
@endsection

