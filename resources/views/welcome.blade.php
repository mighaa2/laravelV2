@extends('modele')

@section('titre', 'Bienvenue')

@section('content')
<div class="min-vh-100 d-flex flex-column justify-content-center align-items-center position-relative text-center" 
    style="background: linear-gradient(to right, #fde2e4, #fae1dd); padding: 15px; overflow: hidden;">

    <!-- Illustrations décoratives -->
    <img src="{{ asset('decor_fleurs_gauche.png') }}" class="position-absolute top-0 start-0" style="width: 120px; opacity: 0.6;">
    <img src="{{ asset('decor_fleurs_droite.png') }}" class="position-absolute bottom-0 end-0" style="width: 120px; opacity: 0.6;">

    @if(session('etat'))
        <div class="alert alert-success text-center w-75 mb-3 shadow-sm" role="alert">
            {{ session('etat') }}
        </div>
    @endif

    <!-- Logo et message d'accueil -->
    <div class="text-center mb-3">
        <div class="p-2 rounded shadow-lg" style="background: rgba(255, 255, 255, 0.8); display: inline-block;">
            <img src="{{ asset('image.png') }}" alt="Mon Logo" class="img-fluid" style="max-width: 200px;">
        </div>
        <h1 class="fw-bold text-secondary mt-2" 
            style="font-family: 'Dancing Script', cursive; font-size: 2rem; color: #ff5d8f; text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
            🎓 Bienvenue à l'Université Paris 8 ! 🎓
        </h1>
        <p class="text-muted mx-auto" style="max-width: 600px; font-family: 'Quicksand', sans-serif; font-size: 1.1rem; color: #6d6875;">
            L'université où se conjuguent excellence et créativité. Rejoignez-nous pour vivre une expérience inoubliable !
        </p>
        <!-- GIF Peach2 -->
        <img src="{{ asset('peach2.gif') }}" alt="Petit chat mignon" class="mt-2" style="width: 80px; height: auto;">
    </div>

    <!-- Boutons -->
    <div class="d-flex flex-column flex-md-row gap-3">
        <form action="{{ route('register') }}">
            <button class="btn btn-lg rounded-pill shadow-sm" 
                    style="background: linear-gradient(45deg, #ff80ab, #ffb3c6); color: white; width: 100%; transition: 0.3s ease-in-out; font-size: 1rem;"
                    onmouseover="this.style.transform='scale(1.05)';" 
                    onmouseout="this.style.transform='scale(1)';">
                Créer un compte
            </button>
        </form>
        <form action="{{ route('login') }}">
            <button class="btn btn-outline-secondary btn-lg rounded-pill shadow-sm"
                    style="width: 100%; transition: 0.3s ease-in-out; font-size: 1rem;"
                    onmouseover="this.style.transform='scale(1.05)';" 
                    onmouseout="this.style.transform='scale(1)';">
                Se connecter
            </button>
        </form>
    </div>
</div>
@endsection
