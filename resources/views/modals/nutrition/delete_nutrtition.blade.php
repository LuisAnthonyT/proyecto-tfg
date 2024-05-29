<!-- Modal component -->
@if (!$registers->isEmpty())
@foreach ($registers as $register)
<div id="delete-nutrition-modal{{$register->id}}" tabindex="-1" aria-hidden="true" role="dialog"
    class="hidden fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
    <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
        <div class="w-full">
            <div class="m-4 my-10 max-w-[400px] mx-auto">
                <div class="flex items-center justify-between mb-3">
                    <h5 class="text-xl font-semibold leading-none text-gray-900 dark:text-white">¿Estas seguro de eliminar
                        este registro?</h5>
                    <div class="flex items-center">
                        <button data-modal-hide="delete-nutrition-modal{{$register->id}}" class="inline-flex items-center text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px" fill="currentColor">
                                <path
                                    d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                            </svg> </button>
                    </div>
                </div>

                <div class="mt-4 flex justify-center">
                    <form action="{{ route('nutrition.destroy', $register)}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="hidden" id="nutritionId" name="nutritionId" value="{{ $register->id }}">
                        <button id="deleteNutrition" type="submit"
                        class="px-5 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ml-2">
                        Estoy seguro
                    </button>
                    <button data-modal-hide="delete-nutrition-modal{{$register->id}}" type="button"
                        class="ml-2 px-5 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-red-600 rounded-lg hover:bg-red-700">
                        Cancelar
                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
