@extends('modele')

@section('titre', 'Connexion')

@section('content')
<div class="min-vh-100 d-flex flex-column justify-content-center align-items-center position-relative text-center" 
    style="background: linear-gradient(to right, #fde2e4, #fae1dd); padding: 15px; overflow: hidden;">

    
    <!-- LOGO RECTANGULAIRE CENTRÉ -->
    <div class="text-center mb-3">
        <div class="p-2 rounded shadow-lg" style="background: rgba(255, 255, 255, 0.8); display: inline-block;">
            <img src="{{ asset('image.png') }}" alt="Mon Logo" class="img-fluid" style="max-width: 200px;">
        </div>
        <h1 class="fw-bold text-secondary mt-2" 
            style="font-family: 'Dancing Script', cursive; font-size: 2rem; color: #ff5d8f; text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
            😊 Heureux de te revoir ! 😊
        </h1>
        <p class="text-muted" 
            style="font-family: 'Quicksand', sans-serif; font-size: 1.1rem; color: #6d6875;">
            Connecte-toi pour continuer ton aventure avec nous. 💖
        </p>
        <!-- Ajout du GIF Peach1 (Petit Chat Mignon) -->
        <img src="{{ asset('peach1.gif') }}" alt="Petit chat mignon" class="mt-2" style="width: 80px; height: auto;">
    </div>

    <!-- FORMULAIRE DE CONNEXION -->
    <div class="card shadow-lg p-3 border-0 rounded-4 text-center"
        style="background: #fffafa; max-width: 450px; border: 2px solid #ffc0cb;">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            @error('account')
                <div class="alert alert-danger text-center mb-3 shadow-sm">
                    {{ $message }}
                </div>
            @enderror

            <div class="mb-2">
                <label for="email" class="form-label text-secondary fw-bold">Email</label>
                <input type="email" class="form-control rounded-3 border-light shadow-sm" id="email" name="email" required placeholder="Votre email">
            </div>

            <div class="mb-2">
                <label for="password" class="form-label text-secondary fw-bold">Mot de passe</label>
                <input type="password" class="form-control rounded-3 border-light shadow-sm" id="password" name="password" required placeholder="Votre mot de passe">
            </div>

            <!-- BOUTON DE CONNEXION -->
            <div class="d-flex flex-column align-items-center gap-2">
                <button type="submit" class="btn btn-lg rounded-pill shadow-sm" 
                    style="background: linear-gradient(45deg, #ff80ab, #ffb3c6); color: white; width: 100%; transition: 0.3s ease-in-out; font-size: 1rem;"
                    onmouseover="this.style.transform='scale(1.05)';" 
                    onmouseout="this.style.transform='scale(1)';">
                    🔑 Se connecter
                </button>
                <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg rounded-pill shadow-sm"
                    style="width: 100%; transition: 0.3s ease-in-out; font-size: 1rem;"
                    onmouseover="this.style.transform='scale(1.05)';" 
                    onmouseout="this.style.transform='scale(1)';">
                    ✨ Pas encore inscrit ? Rejoins-nous !
                </a>
                <a href="{{ route('welcome') }}" class="btn btn-outline-primary btn-lg rounded-pill shadow-sm"
                    style="width: 100%; transition: 0.3s ease-in-out; font-size: 1rem;"
                    onmouseover="this.style.transform='scale(1.05)';" 
                    onmouseout="this.style.transform='scale(1)';">
                    ⬅️ Retour
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
