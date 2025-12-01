<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibra - Adoção e Parceria Animal</title>
    
    <!-- Tailwind CSS (Via CDN para prototipagem rápida, usar Vite em prod) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Configuração de cores extraídas do PDF -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            light: '#d1fae5', // emerald-100
                            DEFAULT: '#10b981', // emerald-500
                            dark: '#047857', // emerald-700
                        },
                        accent: {
                            DEFAULT: '#f59e0b', // amber-500
                            dark: '#d97706', // amber-600
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js para interatividade leve -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Header -->
    <header class="fixed w-full z-50 bg-white/90 backdrop-blur-md shadow-sm transition-all duration-300">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <div class="w-10 h-10 bg-brand rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg group-hover:scale-105 transition">F</div>
                <span class="text-xl font-bold text-slate-800 tracking-tight">Projeto <span class="text-brand">Fibra</span></span>
            </a>
            
            <nav class="hidden md:flex gap-8 font-medium text-slate-600">
                <a href="#hero" class="hover:text-brand transition">Início</a>
                <a href="#adotar" class="hover:text-brand transition">Quero Adotar</a>
                <a href="#parceiros" class="hover:text-brand transition">Parceiros</a>
            </nav>

            <a href="#adotar" class="bg-brand hover:bg-brand-dark text-white px-6 py-2 rounded-full font-semibold shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
                Apadrinhar
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow pt-20">
        @if(session('success'))
            <div x-data="{ show: true }" x-show="show" class="fixed top-24 right-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-lg z-50 max-w-sm">
                <div class="flex justify-between items-start">
                    <p>{{ session('success') }}</p>
                    <button @click="show = false" class="text-green-700 font-bold ml-4">&times;</button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 py-12 mt-20">
        <div class="container mx-auto px-4 grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-2xl font-bold text-white mb-4">Fibra</h3>
                <p class="text-slate-400">Conectando corações, transformando vidas através da adoção responsável.</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Contato</h4>
                <p>contato@projetofibra.com.br</p>
                <p>(11) 99999-9999</p>
            </div>
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Redes Sociais</h4>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-brand transition">Instagram</a>
                    <a href="#" class="hover:text-brand transition">Facebook</a>
                </div>
            </div>
        </div>
        <div class="border-t border-slate-800 mt-8 pt-8 text-center text-sm text-slate-500">
            &copy; {{ date('Y') }} Projeto Fibra. Todos os direitos reservados.
        </div>
    </footer>

</body>
</html>