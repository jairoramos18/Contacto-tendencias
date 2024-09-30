<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>

</head>

<body class="font-sans antialiased text-black">
    <div class="bg-white text-black">

        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <div class="flex lg:justify-center lg:col-start-2"></div>
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <!-- Contenedor principal -->
                <section class="container mx-auto py-12 px-4 md:px-0">
                    <div class="text-center mb-12">
                        <h2 class="text-2xl font-semibold text-gray-700">CONTACTENOS</h2>
                        <h1 class="text-4xl font-bold text-gray-800 mt-2">Contacto para cualquier consulta</h1>
                    </div>
                    <div class="flex flex-wrap justify-between">

                        <!-- Información de contacto -->
                        <div class="w-full md:w-1/3 bg-white rounded-lg shadow-md p-8 mb-6 md:mb-0">
                            <h3 class="text-lg font-bold text-gray-800 mb-6">Información de Contacto</h3>
                            <div class="mb-6">
                                <div class="flex items-center mb-4">
                                    <iconify-icon icon="mdi:location" width="48" height="48"></iconify-icon>
                                    <div class="ml-4">
                                        <p class="font-semibold text-gray-600">Dirección</p>
                                        <p class="text-gray-500">{{ session('direccion', 'Dirección no ingresada') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-4">
                                    <iconify-icon icon="mdi:telephone" width="48" height="48"></iconify-icon>
                                    <div class="ml-4">
                                        <p class="font-semibold text-gray-600">Celular</p>
                                        <p class="text-gray-500">{{ session('celular', 'Celular no ingresado') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <iconify-icon icon="skill-icons:gmail-light" width="48" height="48"></iconify-icon>
                                    <div class="ml-4">
                                        <p class="font-semibold text-gray-600">Email</p>
                                        <p class="text-gray-500">{{ session('email', 'Email no ingresado') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <iconify-icon icon="subway:world" width="48" height="48"></iconify-icon>
                                <div class="ml-4">
                                    <p class="font-semibold text-gray-600">País</p>
                                    <p class="text-gray-500">{{ session('pais', 'País no ingresado') }}</p>
                                </div>
                            </div>
                        </div>



                        <form action="{{ route('contacto.enviar') }}" method="POST"
                            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                            @csrf
                            <h2 class="text-xl font-bold mb-6">Formulario de Contacto</h2>
                            <div class="flex flex-wrap -mx-4 mb-4">
                                <div class="w-full md:w-1/2 px-4">
                                    <input type="text" name="nombre_usuario" placeholder="Tu nombre"
                                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                        value="{{ old('nombre_usuario') }}" required>
                                </div>
                                <div class="w-full md:w-1/2 px-4">
                                    <input type="email" name="email" placeholder="Tu correo electrónico"
                                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                        value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-4 mb-4">
                                <div class="w-full md:w-1/2 px-4">
                                    <input type="text" name="celular" placeholder="Celular"
                                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                        value="{{ old('celular') }}" required>
                                </div>
                                <div class="w-full md:w-1/2 px-4">
                                    <input type="text" name="direccion" placeholder="Dirección"
                                        class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                        value="{{ old('direccion') }}" required>
                                </div>
                            </div>
                            <div class="w-full px-4 mb-4">
                                <input type="text" name="pais" placeholder="País"
                                    class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                    value="{{ old('pais') }}" required>
                            </div>
                            <div class="w-full px-4 mb-4">
                                <input type="text" name="asunto" placeholder="Asunto"
                                    class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                    value="{{ old('asunto') }}" required>
                            </div>
                            <div class="w-full px-4 mb-4">
                                <textarea name="mensaje" rows="5" placeholder="Mensaje"
                                    class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-blue-500"
                                    required>{{ old('mensaje') }}</textarea>
                            </div>
                            <div class="w-full px-4">
                                <button type="submit"
                                    class="w-full bg-blue-600 text-white px-4 py-3 rounded hover:bg-blue-700 focus:outline-none">Enviar
                                    mensaje</button>
                            </div>
                        </form>
                    </div>
                    @if(session('success'))
                            <div class="mt-4 p-4 bg-green-200 text-green-800 rounded text-center">
                                {{ session('success') }}
                            </div>
                        @endif

            </div>
            </section>

            <div class="flex justify-center items-center p-0 mx-auto mt-8">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15794.70661528596!2d-73.3712401986122!3d8.235233338641356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e677b4094078d71%3A0xef4f6b1cf328750f!2sCajero%20Bancolombia!5e0!3m2!1ses!2sco!4v1727718299984!5m2!1ses!2sco"
                    width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

</body>

</html>