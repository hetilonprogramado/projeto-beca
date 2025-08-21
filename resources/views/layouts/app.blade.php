<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Acadêmico</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">    
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 font-sans">
        <!-- Sistema Principal -->
    <div id="mainSystem">
        <!-- Sidebar -->        
        @livewire('layout.sidebar')
        <!-- Conteúdo Principal -->
        <div class="ml-64 min-h-screen bg-gray-50">
            <!-- Header -->
            @livewire('layout.navigation')

            <!-- Dashboard -->
            {{ $slot }}
        </div>
    </div>
    </body>
</html>
