<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolos & Beca</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">    
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans bg-[#4d0c0c]">
        <div id="loginScreen" class="min-h-screen flex items-center justify-center bg-[#4d0c0c]">
        <div class="bg-[#f7b7b7] p-8 rounded-2xl shadow-2xl w-full max-w-md">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <!-- <i class="fas fa-graduation-cap text-white text-2xl"></i> -->
                    <img src="{{ asset('imgs/logo.png') }}" style="
                        width:60px; 
                        height:60px; 
                        object-fit:contain;
                        border: 3px solid white; 
                        border-radius:50px; 
                        box-shadow: 0 0 15px white;
                        position: relative;
                    ">
                </div>
                <h1 class="text-2xl font-bold text-[#400d0a] font-['Bree_Serif']">Bolos & Beca</h1>
                <p class="text-[#400d0a] font-['Bree_Serif']">Faça login ou cadastro para continuar</p>
            </div>
            
            {{ $slot }}
        </div>
    </div>
    </body>
</html>