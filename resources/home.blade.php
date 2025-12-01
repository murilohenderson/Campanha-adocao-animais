@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section id="hero" class="relative py-20 lg:py-32 bg-gradient-to-br from-emerald-50 to-white overflow-hidden">
    <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center gap-12">
        <div class="lg:w-1/2 space-y-6 z-10">
            <span class="inline-block py-1 px-3 rounded-full bg-brand-light text-brand-dark text-sm font-semibold tracking-wide uppercase mb-2">
                Adoção Responsável
            </span>
            <h1 class="text-4xl lg:text-6xl font-bold text-slate-900 leading-tight">
                Encontre seu novo <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand to-teal-500">melhor amigo</span>
            </h1>
            <p class="text-lg text-slate-600 leading-relaxed max-w-lg">
                O Projeto Fibra conecta animais resgatados a lares cheios de amor. Adote, apadrinhe ou seja um parceiro dessa causa.
            </p>
            <div class="flex gap-4 pt-4">
                <a href="#adotar" class="px-8 py-3 bg-brand hover:bg-brand-dark text-white rounded-xl font-semibold shadow-lg shadow-emerald-200 transition">
                    Ver Animais
                </a>
                <a href="#como-funciona" class="px-8 py-3 bg-white border border-slate-200 hover:border-brand text-slate-700 hover:text-brand rounded-xl font-semibold transition">
                    Como funciona
                </a>
            </div>
        </div>
        
        <!-- Imagem decorativa -->
        <div class="lg:w-1/2 relative">
            <div class="absolute inset-0 bg-brand rounded-full filter blur-3xl opacity-20 transform translate-y-10"></div>
            <img src="https://images.unsplash.com/photo-1450778869180-41d0601e046e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                 alt="Cão feliz" 
                 class="relative rounded-3xl shadow-2xl transform rotate-2 hover:rotate-0 transition duration-500 object-cover h-[400px] w-full">
        </div>
    </div>
</section>

<!-- Stats Section (Extra) -->
<section class="py-10 bg-white border-b border-slate-100">
    <div class="container mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div>
            <div class="text-3xl font-bold text-brand">150+</div>
            <div class="text-slate-500 text-sm">Animais Adotados</div>
        </div>
        <div>
            <div class="text-3xl font-bold text-brand">50+</div>
            <div class="text-slate-500 text-sm">Parceiros</div>
        </div>
        <div>
            <div class="text-3xl font-bold text-brand">100%</div>
            <div class="text-slate-500 text-sm">Sem Fins Lucrativos</div>
        </div>
        <div>
            <div class="text-3xl font-bold text-brand">24h</div>
            <div class="text-slate-500 text-sm">Suporte Veterinário</div>
        </div>
    </div>
</section>

<!-- Animals Grid -->
<section id="adotar" class="py-20 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Amigos Disponíveis</h2>
            <p class="text-slate-600 max-w-2xl mx-auto">
                Estes são alguns dos animais que estão aguardando um lar. Cada cartão representa uma vida pronta para ser transformada.
            </p>
        </div>

        @if($animals->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($animals as $animal)
                <!-- Chamando o componente que acabamos de criar -->
                <x-animal-card :animal="$animal" />
            @endforeach
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-xl shadow-sm">
                <p class="text-slate-500 text-lg">Nenhum animal disponível para adoção no momento.</p>
            </div>
        @endif
    </div>
</section>

<!-- Contact/Interest Form -->
<section id="contato" class="py-20 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-emerald-900 rounded-3xl p-8 md:p-12 shadow-2xl text-center md:text-left flex flex-col md:flex-row items-center gap-12">
            <div class="md:w-1/2 text-white">
                <h2 class="text-3xl font-bold mb-4">Pronto para adotar?</h2>
                <p class="text-emerald-100 mb-6">
                    Preencha o formulário e nossa equipe entrará em contato para agendar uma entrevista e visita.
                </p>
                <ul class="space-y-3 text-sm text-emerald-200">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Adoção responsável garantida
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Acompanhamento pós-adoção
                    </li>
                </ul>
            </div>

            <form action="{{ route('interest.store') }}" method="POST" class="md:w-1/2 bg-white p-6 rounded-2xl shadow-lg w-full">
                @csrf
                <input type="hidden" name="animal_id" id="animal_id_input" value="{{ $animals->first()->id ?? '' }}">
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Seu Nome</label>
                        <input type="text" name="name" required class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:border-brand focus:ring-1 focus:ring-brand outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">WhatsApp</label>
                        <input type="tel" name="phone" required class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:border-brand focus:ring-1 focus:ring-brand outline-none transition">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Mensagem (Opcional)</label>
                        <textarea name="message" rows="3" class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:border-brand focus:ring-1 focus:ring-brand outline-none transition"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-accent hover:bg-accent-dark text-white font-bold py-3 rounded-lg transition shadow-md">
                        Enviar Interesse
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection