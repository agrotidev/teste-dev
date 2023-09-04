@extends('layouts.auth')

@section('title', 'Perfil')

@section('content')

    <form method="post" action="{{ route('register.create') }}">
        @csrf

        <div class="flex-1 mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800" style="max-width: 400px;">

            <div class="flex items-center justify-center p-6 sm:p-12">
                <div class="w-full" >

                    <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                    Cadastro
                    </h1>

                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Escolha um Nome de Usuário</span>
                        <input name="username" value="{{ old('username') }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Seu nome de usuario">
                        @error('username')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Email</span>
                        <input name="email" value="{{ old('email') }}" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Seu email">
                        @error('email')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Senha</span>
                        <input name="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password">
                        @error('password')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Confirma Senha
                        </span>
                        <input name="password_confirmation" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password">
                        @error('password_confirmation')
                            <span class="text-xs text-red-600 dark:text-red-400">{{ $message }}</span>
                        @enderror
                    </label>

                    <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                    Criar Conta
                    </button>

                    <hr class="my-8">

                    <p class="mt-4 flex justify-center">
                        <a class="text-sm font-medium font-bold text-blue dark:text-blue hover:underline" href="{{ route('login') }}">
                            Fazer Login!
                        </a>
                    </p>

                </div>
            </div>

        </div>
    </form>






@endsection
