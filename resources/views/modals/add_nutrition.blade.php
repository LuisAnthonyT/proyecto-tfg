<!-- Modal component -->
<div id="popup-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
    <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
        <div class="w-full">
            <div class="m-4 my-10 max-w-[400px] mx-auto">
                <div class="flex items-center justify-between mb-3">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Macronutrientes
                        y calorías</h5>
                    <div class="flex items-center">
                        <button data-modal-hide="popup-modal" class="inline-flex items-center text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px" fill="currentColor">
                                <path
                                    d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                            </svg> </button>
                    </div>
                </div>
                <form method="POST">
                    @csrf
                    <div class="grid grid-cols-6 gap-2">
                        <input type="hidden" name="trainer_id" id="trainer_id" value="{{ $athlete->trainer_id}}">
                        <input type="hidden" name="athlete_id" id="athlete_id" value="{{ $athlete->id}}">
                        <div class=" my-2 col-span-3 sm:col-span-3">
                            <label for="day_type" class="text-sm font-medium text-gray-900 block mb-2">Tipo
                                de días</label>
                            <input required type="text" autofocus id="day_type" name="day_type"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Entrenamiento / descanso " />
                        </div>
                        <div class="my-2 col-span-3 sm:col-span-3">
                            <label for="carbohydrates"
                                class="text-sm font-medium text-gray-900 block mb-2">Carbohidratos</label>
                            <input required type="number" autofocus id="carbohydrates" name="carbohydrates"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Carbohidratos" />
                        </div>
                        <div class="my-2 col-span-3 sm:col-span-3">
                            <label for="proteins" class="text-sm font-medium text-gray-900 block mb-2">Proteínas</label>
                            <input required type="number" autofocus id="proteins" name="proteins"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Proteínas" />
                        </div>
                        <div class="my-2 col-span-3 sm:col-span-3">
                            <label for="fats" class="text-sm font-medium text-gray-900 block mb-2">Grasas</label>
                            <input required type="number" autofocus id="fats" name="fats"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Grasas" />
                        </div>
                        <div class="my-2 col-span-3 sm:col-span-3">
                            <label for="calories" class="text-sm font-medium text-gray-900 block mb-2">Calorías
                                totales</label>
                            <input required type="number" autofocus id="calories" name="calories"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Calorías totales" />
                        </div>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <button id="addNutrition" type="button"
                            class="px-5 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ml-2">
                            Añadir
                        </button>
                        <button data-modal-hide="popup-modal" type="button"
                            class="ml-2 px-5 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-red-600 rounded-lg hover:bg-red-700">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
