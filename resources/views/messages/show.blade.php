@extends('layouts.layout_users')
@section('title', 'Mensaje')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="px-8 py-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-light text-gray-600 dark:text-gray-400">{{ $message->created_at}}</span>
                    <a href="{{ route('messages.index')}}" class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-300 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500" tabindex="0" role="button">Volver</a>
                </div>

                <div class="mt-2">
                    <span class="text-xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200" tabindex="0" role="link">{{ $message->subject}}</span>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">{{ $message->text }}</p>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline" tabindex="0" role="link">Responder</a>

                    <div class="flex items-center">
                        {{-- <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block" src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=40&q=80" alt="avatar"> --}}
                        <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200" tabindex="0" role="link">{{ $message->sender->name}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
