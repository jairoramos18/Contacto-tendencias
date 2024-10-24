@extends('layouts.applogin')

@section('title', 'Login')

@section('content')
<head>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>


<div class="relative w-full h-screen flex items-center justify-center bg-cover bg-center " style="background-image: url('https://images.pexels.com/photos/1054218/pexels-photo-1054218.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');">
    <div class="absolute inset-0 bg-black opacity-60"></div> 

    <div class="relative w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-white text-2xl font-bold">Iniciar Sesión</h1>
        </div>
        
        <div class="bg-white shadow-lg rounded-lg p-8">
            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                               class="form-input block w-full pr-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                               focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                               placeholder="Correo electrónico" aria-describedby="emailHelp">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        @error('email')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="password" type="password" name="password" required
                               class="form-input block w-full pr-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                               focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                               placeholder="Contraseña" aria-describedby="passwordHelp">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        @error('password')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-between mb-4">
                    <button type="submit" class="w-full bg-purple-700 text-white rounded-md py-2 px-4 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Iniciar Sesión</button>
                    <a href="{{ route('register') }}" class="w-full bg-teal-500 text-white rounded-md py-2 px-4 ml-3 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">Registrarse</a>
                </div>

                <div class="text-center mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-500 hover:text-gray-800" href="{{ route('password.request') }}">
                            {{ __('Olvidaste Tu Contraseña?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
