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
    <div class="bg-white text-black min-h-screen">
    <nav class="bg-indigo-700 text-white py-2 fixed w-full top-0 z-40">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Iconos de Redes Sociales -->
                <div class="flex space-x-4">
                    <a href="#" target="_blank" class="hover:text-gray-300">
                    <iconify-icon icon="ic:baseline-facebook" width="24" height="24"></iconify-icon>

                    <a href="#" target="_blank" class="hover:text-gray-300">
                    <iconify-icon icon="hugeicons:instagram" width="24" height="24"></iconify-icon>
                    </a>
                    <a href="#" target="_blank" class="hover:text-gray-300">
                    <iconify-icon icon="mingcute:twitter-line" width="24" height="24"></iconify-icon>
                    </a>
                    <a href="#" target="_blank" class="hover:text-gray-300">
                    <iconify-icon icon="bi:youtube" width="24" height="24"></iconify-icon>
                    </a>
                    <a href="#" target="_blank" class="hover:text-gray-300">
                    <iconify-icon icon="mingcute:linkedin-fill" width="24" height="24"></iconify-icon>
                    </a>
                </div>

                <!-- Espacio de Autenticación -->
                @if (Route::has('login'))
                    <nav class="flex space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="flex items-center hover:text-gray-300">
                                <span class="mr-1">🏠</span> 
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="flex items-center hover:text-gray-300">
                                <iconify-icon icon="fluent-emoji:key" width="24" height="24"></iconify-icon>
                                <span class="mr-1"></span> 
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="flex items-center hover:text-gray-300">
                                    <iconify-icon icon="flat-color-icons:contacts" width="24" height="24"></iconify-icon>
                                    <span class="mr-1"></span> 
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </nav>

        <!-- Barra de Navegación Principal -->
        <nav class="bg-indigo-600 text-white py-4 fixed w-full top-10 z-50">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Logotipo y título -->
                <div class="flex items-center">
                    <!-- Logotipo -->
                    <img src="https://assets.stickpng.com/images/61f7cd9467553f0004c53e76.png" alt="Logo" class="h-16 w-16 mr-2">
                    <h1 class="text-3xl font-bold">Travela</h1>
                </div>
                <!-- Menú de navegación -->
                <ul class="flex space-x-4 ml-6">
                    <li><a href="#" class="hover:text-gray-500">Hogar</a></li>
                    <li><a href="#" class="hover:text-gray-500">Acerca de</a></li>
                    <li><a href="#" class="hover:text-gray-500">Servicios</a></li>
                    <li><a href="#" class="hover:text-gray-500">Paquetes</a></li>
                    <li><a href="#" class="hover:text-gray-500">Blog</a></li>
                    <li class="relative">
                        <a href="#" class="hover:text-gray-500">Páginas</a>
                        <!-- Dropdown -->
                        <ul class="absolute left-0 hidden mt-2 bg-white text-black shadow-lg">
                            <li><a href="#" class="block px-4 py-2">Página 1</a></li>
                            <li><a href="#" class="block px-4 py-2">Página 2</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="hover:text-gray-500">Contacto</a></li>
                </ul>
            </div>
        </nav>
        <!-- Sección de imagen de fondo -->
        <section class="bg-cover bg-center h-[600px] text-white flex items-center justify-center mt-[64px]"
            style="background-image: url('https://images.pexels.com/photos/346734/pexels-photo-346734.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');">
            <h2 class="text-6xl font-bold">Contáctenos</h2>
        </section>

        <!-- Contenedor principal -->
        <section class="container mx-auto py-12 px-4 md:px-0">
            <div class="text-center mb-12">
                <h2 class="text-2xl font-semibold text-gray-700">CONTACTENOS</h2>
                <h1 class="text-4xl font-bold text-gray-800 mt-2">Contacto para cualquier consulta</h1>
            </div>
            <div class="flex flex-wrap justify-between w-full">
                <!-- Formulario de contacto, etc. -->
            </div>
        </section>
    </div>
    <!-- Información de contacto -->
    <div class="w-full bg-white rounded-lg shadow-md p-12 mb-8">
        <h3 class="text-3xl font-bold text-gray-800 mb-8 text-center">Información de Contacto</h3>
        <div class="flex flex-col md:flex-row justify-around items-start md:items-center">
            <div class="flex items-center mb-6">
                <iconify-icon icon="mdi:location" width="48" height="48"></iconify-icon>
                <div class="ml-4">
                    <p class="font-semibold text-gray-700 text-xl">Dirección</p>
                    <p class="text-gray-600 text-lg">{{ session('direccion', 'Dirección no ingresada') }}
                    </p>
                </div>
            </div>
            <div class="flex items-center mb-6">
                <iconify-icon icon="mdi:telephone" width="48" height="48"></iconify-icon>
                <div class="ml-4">
                    <p class="font-semibold text-gray-700 text-xl">Celular</p>
                    <p class="text-gray-600 text-lg">{{ session('celular', 'Celular no ingresado') }}</p>
                </div>
            </div>
            <div class="flex items-center mb-6">
                <iconify-icon icon="skill-icons:gmail-light" width="48" height="48"></iconify-icon>
                <div class="ml-4">
                    <p class="font-semibold text-gray-700 text-xl">Email</p>
                    <p class="text-gray-600 text-lg">{{ session('email', 'Email no ingresado') }}</p>
                </div>
            </div>
            <div class="flex items-center mb-6">
                <iconify-icon icon="subway:world" width="48" height="48"></iconify-icon>
                <div class="ml-4">
                    <p class="font-semibold text-gray-700 text-xl">País</p>
                    <p class="text-gray-600 text-lg">{{ session('pais', 'País no ingresado') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario de Contacto -->
    <form action="{{ route('contacto.enviar') }}" method="POST" class="w-full bg-white shadow-md rounded px-12 py-12">
        @csrf
        <h2 class="text-3xl font-bold text-center mb-8">Formulario de Contacto</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <input type="text" name="nombre_usuario" placeholder="Tu nombre"
                class="w-full px-5 py-4 border border-gray-300 rounded focus:outline-none focus:border-blue-500 hover:border-blue-500"
                value="{{ old('nombre_usuario') }}" required>
            <input type="email" name="email" placeholder="Tu correo electrónico"
                class="w-full px-5 py-4 border border-gray-300 rounded focus:outline-none focus:border-blue-500 hover:border-blue-500"
                value="{{ old('email') }}" required>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <input type="text" name="celular" placeholder="Celular"
                class="w-full px-5 py-4 border border-gray-300 rounded focus:outline-none focus:border-blue-500 hover:border-blue-500"
                value="{{ old('celular') }}" required>
            <input type="text" name="direccion" placeholder="Dirección"
                class="w-full px-5 py-4 border border-gray-300 rounded focus:outline-none focus:border-blue-500 hover:border-blue-500"
                value="{{ old('direccion') }}" required>
        </div>
        <div class="mb-6">
            <input type="text" name="pais" placeholder="País"
                class="w-full px-5 py-4 border border-gray-300 rounded focus:outline-none focus:border-blue-500 hover:border-blue-500"
                value="{{ old('pais') }}" required>
        </div>
        <div class="mb-6">
            <input type="text" name="asunto" placeholder="Asunto"
                class="w-full px-5 py-4 border border-gray-300 rounded focus:outline-none focus:border-blue-500 hover:border-blue-500"
                value="{{ old('asunto') }}" required>
        </div>
        <div class="mb-6">
            <textarea name="mensaje" rows="5" placeholder="Mensaje"
                class="w-full px-5 py-4 border border-gray-300 rounded focus:outline-none focus:border-blue-500 hover:border-blue-500"
                required>{{ old('mensaje') }}</textarea>
        </div>
        <div class="text-center">
            <button type="submit"
                class="w-full md:w-auto bg-blue-600 text-white px-8 py-4 rounded hover:bg-blue-700 focus:outline-none transition-all duration-300">Enviar
                mensaje</button>
        </div>
    </form>

    </div>

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
            width="1400" height="800" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <section class="bg-blue-800 py-16 text-white text-center mt-10">
        <h2 class="text-3xl font-bold mb-4">¡Suscríbete a Nuestro Boletín!</h2>
        <p class="mb-6">Mantente al día con nuestras últimas noticias, ofertas exclusivas y consejos de viaje. ¡No te
            pierdas nada!</p>
        <form action="#" class="flex justify-center">
            <input type="email" class="w-1/3 px-4 py-2 text-black rounded-l" placeholder="Tu correo electrónico"
                required>
            <button type="submit" class="bg-blue-600 px-6 py-2 rounded-r hover:bg-blue-700">Suscribirse</button>
        </form>
    </section>

    <footer class="bg-black text-white py-12">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Sección de contacto -->
            <div>
                <h3 class="text-lg font-bold mb-4">Contacto</h3>
                <div class="mb-6">
                    <div class="flex items-center mb-4">
                        <iconify-icon icon="mdi:location" width="48" height="48"></iconify-icon>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-300">Dirección</p>
                            <p class="text-gray-400">{{ session('direccion', 'Dirección no ingresada') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <iconify-icon icon="mdi:telephone" width="48" height="48"></iconify-icon>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-300">Celular</p>
                            <p class="text-gray-400">{{ session('celular', 'Celular no ingresado') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center mb-4">
                        <iconify-icon icon="skill-icons:gmail-light" width="48" height="48"></iconify-icon>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-300">Email</p>
                            <p class="text-gray-400">{{ session('email', 'Email no ingresado') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <iconify-icon icon="subway:world" width="48" height="48"></iconify-icon>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-300">País</p>
                            <p class="text-gray-400">{{ session('pais', 'País no ingresado') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Compañía -->
            <div>
                <h3 class="text-lg font-bold mb-4">Compañía</h3>
                <ul>
                    <li><a href="#" class="hover:text-gray-200">Acerca de</a></li>
                    <li><a href="#" class="hover:text-gray-200">Carreras</a></li>
                    <li><a href="#" class="hover:text-gray-200">Blog</a></li>
                    <li><a href="#" class="hover:text-gray-200">Prensa</a></li>
                </ul>
            </div>
            <!-- Apoyo -->
            <div>
                <h3 class="text-lg font-bold mb-4">Apoyo</h3>
                <ul>
                    <li><a href="#" class="hover:text-gray-200">Contacto</a></li>
                    <li><a href="#" class="hover:text-gray-200">Aviso Legal</a></li>
                    <li><a href="#" class="hover:text-gray-200">Política de privacidad</a></li>
                </ul>
            </div>
        </div>
        <div class="text-center mt-8">
            <p>&copy; 2024 Su Sitio, Todos los derechos reservados.</p>
        </div>
    </footer>

</body>

</html>