@props(['animal'])

<div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition duration-300 border border-slate-100 group flex flex-col h-full">
    <!-- Área da Imagem -->
    <div class="relative overflow-hidden h-64">
        <img src="{{ $animal->image_path }}" alt="{{ $animal->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold text-slate-700 shadow-sm">
            {{ $animal->gender_label }}
        </div>
    </div>
    
    <!-- Conteúdo do Card -->
    <div class="p-6 flex-1 flex flex-col">
        <div class="flex justify-between items-start mb-2">
            <h3 class="text-xl font-bold text-slate-900">{{ $animal->name }}</h3>
            <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded">{{ $animal->age_text }}</span>
        </div>
        <p class="text-sm text-brand font-medium mb-4">{{ $animal->breed ?? 'SRD' }} • {{ $animal->size }}</p>
        <p class="text-slate-600 text-sm mb-6 flex-grow line-clamp-3">
            {{ $animal->description }}
        </p>
        
        <!-- Botão de Ação -->
        <button onclick="document.getElementById('animal_id_input').value = '{{ $animal->id }}'; window.location.href='#contato'" 
                class="w-full py-3 border-2 border-brand text-brand font-semibold rounded-xl hover:bg-brand hover:text-white transition">
            Tenho Interesse
        </button>
    </div>
</div>