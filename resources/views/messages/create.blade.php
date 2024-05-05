@extends('layout_users')
@section('title', 'Redactar mensaje')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="relative overflow-x-auto  sm:rounded-lg">
            <div class="bg-white border border-4 rounded-lg shadow relative m-10">

                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">Redactar mensaje</h3>
                </div>
                <div class="p-6 space-y-6">
                    <form action="{{route('messages.store')}}" method="POST">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="receiver_id"
                                class="text-sm font-medium text-gray-900 block mb-2">Correo</label>
                                <select required id="receiver_id" name="receiver_id"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5">
                                    <option disabled selected >Elije el correo de un atleta</option>
                                    @if ($athletes->isEmpty())
                                        <option disabled>No hay atletas</option>
                                    @else
                                        @foreach ($athletes as $athlete )
                                            <option value="{{ $athlete->user->id}}">{{$athlete->user->email}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="subject" class="text-sm font-medium text-gray-900 block mb-2">Asunto</label>
                                <input required type="text" name="subject" id="subject"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <label for="text" class="text-sm font-medium text-gray-900 block mb-2">Mensaje</label>
                                <textarea required
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                    id="text" name="text"></textarea>
                            </div>
                        </div>
                        <div class=" mt-5 p-6 border-t border-gray-200 rounded-b flex justify-center">
                            <button
                                class="text-white bg-gray-800 hover:bg-black focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                type="submit">Enviar</button>
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
