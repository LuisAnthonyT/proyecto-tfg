<!-- Modal component -->
<div id="add-session" tabindex="-1" aria-hidden="true"
    class="hidden fixed left-0 top-0 flex h-full w-full items-center justify-center bg-black bg-opacity-50 py-10">
    <div class="max-h-full w-full max-w-xl overflow-y-auto sm:rounded-2xl bg-white">
        <div class="w-full">
            <div class="m-4 my-10 max-w-[400px] mx-auto">
                <div class="flex items-center justify-between mb-3">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Añadir ejercicio</h5>
                    <div class="flex items-center">
                        <button data-modal-hide="add-session" class="inline-flex items-center text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px" fill="currentColor">
                                <path
                                    d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                            </svg> </button>
                    </div>
                </div>
                <form action="{{ route('session.store')}}" method="POST">
                    @csrf
                    <div class="grid grid-cols-3 gap-2">
                        <input type="hidden" name="workout_id" value="{{ $workout->id}}">
                        <div class="my-2 col-span-6 sm:col-span-6">
                            <label for="exercise"
                            class="text-sm font-medium text-gray-900 block mb-2">Elije un ejercicio</label>
                            <select required  id="exercise" name="exercise"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5">
                                @if (isset($exercises))
                                @if ($exercises->isEmpty())
                                <option disabled>No hay ejercicios</option>
                                @else
                                <option disabled selected >Elije un ejercicio</option>
                                        @foreach ($exercises as $exercise )
                                            <option value="{{ $exercise->name}}">{{$exercise->name}}</option>
                                        @endforeach
                                    @endif
                                @endif
                            </select>
                        </div>
                        <div class=" my-2 col-span-6 sm:col-span-6">
                            <label for="rest" class="text-sm font-medium text-gray-900 block mb-2">Descanso</label>
                            <input required type="text" autofocus id="rest" name="rest"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Descanso"/>
                        </div>
                        <div class=" my-2 col-span-6 sm:col-span-6">
                            <label for="sets" class="text-sm font-medium text-gray-900 block mb-2">Series</label>
                            <input required type="text" autofocus id="sets" name="sets"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Series"/>
                        </div>
                        <div class=" my-2 col-span-6 sm:col-span-6">
                            <label for="reps" class="text-sm font-medium text-gray-900 block mb-2">Repeticiones</label>
                            <input required type="text" autofocus id="reps" name="reps"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Repeticiones"/>
                        </div>
                        <div class=" my-2 col-span-6 sm:col-span-6">
                            <label for="rir" class="text-sm font-medium text-gray-900 block mb-2">RIR</label>
                            <input required type="text" autofocus id="rir" name="rir"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Repeticiones en reserva"/>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-center">
                        <button id="addsession" type="submit"
                            class="px-5 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ml-2">
                            Añadir
                        </button>
                        <button data-modal-hide="add-session" type="button"
                            class="ml-2 px-5 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-red-600 rounded-lg hover:bg-red-700">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
