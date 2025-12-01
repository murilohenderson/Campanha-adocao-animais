<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Http\Requests\StoreInterestRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdoptionController extends Controller
{
    /**
     * Exibe a página inicial com a lista de animais disponíveis.
     */
    public function index(): View
    {
        // Busca apenas animais não adotados, ordenados pelos mais recentes
        $animals = Animal::where('is_adopted', false)
                         ->latest()
                         ->get();

        return view('home', compact('animals'));
    }

    /**
     * Processa o formulário de interesse (simulação de envio).
     */
    public function storeInterest(StoreInterestRequest $request): RedirectResponse
    {
        // Aqui você implementaria o envio de e-mail ou salvamento no banco
        // Ex: Mail::to('admin@fibra.com')->send(new InterestMail($request->validated()));

        return back()->with('success', 'Seu interesse foi registrado! Entraremos em contato em breve.');
    }
}