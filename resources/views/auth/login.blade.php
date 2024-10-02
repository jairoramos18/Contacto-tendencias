@extends('layouts.applogin')

@section('content')
<head>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<div class="relative min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.pexels.com/photos/1054218/pexels-photo-1054218.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');">
    <div class="absolute inset-0 bg-black opacity-60"></div> <!-- Overlay para oscurecer el fondo -->

    <div class="relative w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-white">JAIRO RAMOS</h1>
            <p class="text-lg text-gray-200">Inicia sesión para continuar</p>
        </div>
        
        <div class="bg-white shadow-lg rounded-lg p-8">
            <form class="space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email Input with Icon on the Right -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                               class="form-input block w-full pr-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                               focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                               placeholder="Correo electrónico">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        @error('email')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Password Input with Icon on the Right -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input id="password" type="password" name="password" required
                               class="form-input block w-full pr-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm 
                               focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                               placeholder="Contraseña">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        @error('password')
                            <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between">
                    <button type="submit" class="w-full bg-blue-500 text-white rounded-md py-2 px-4 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">Iniciar Sesión</button>
                    <a href="{{ route('register') }}" class="w-full bg-green-500 text-white rounded-md py-2 px-4 ml-3 hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">Registrarse</a>
                </div>

                <!-- Forgot Password Link -->
                <div class="text-center mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-500 hover:text-gray-800" href="{{ route('password.request') }}">
                            {{ __('Olvidaste tu Contraseña?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
        
        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-sm text-white">© 2024 Jairo Ramos. Todos los derechos reservados.</p>
        </div>
    </div>
</div>
@endsection
