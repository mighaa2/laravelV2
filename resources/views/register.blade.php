@extends('modele')

@section('titre', 'Inscription')

@section('content')
<div class="min-vh-100 d-flex flex-column justify-content-center align-items-center position-relative text-center" 
    style="background: linear-gradient(to right, #fde2e4, #fae1dd); padding: 15px; overflow: hidden;">

   
    @if(session('etat'))
        <div class="alert alert-success text-center w-75 mb-3 shadow-sm" role="alert">
            {{ session('etat') }}
        </div>
    @endif

    <!-- LOGO -->
    <div class="text-center mb-3">
        <div class="p-2 rounded shadow-lg" style="background: rgba(255, 255, 255, 0.8); display: inline-block;">
            <img src="{{ asset('image.png') }}" alt="Mon Logo" class="img-fluid" style="max-width: 200px;">
        </div>
        <h1 class="fw-bold text-secondary mt-2" 
            style="font-family: 'Dancing Script', cursive; font-size: 2rem; color: #ff5d8f; text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
            ✨ Bienvenue dans notre communauté ! ✨
        </h1>
        <p class="text-muted" 
            style="font-family: 'Quicksand', sans-serif; font-size: 1.1rem; color: #6d6875;">
            Rejoignez-nous et découvrez une expérience unique, pleine de belles rencontres et de moments inoubliables. 💖
        </p>
        <img src="{{ asset('peach.gif') }}" alt="Petit chat mignon" class="mt-2" style="width: 80px; height: auto;">
    </div>

    <!-- FORMULAIRE -->
    <div class="card shadow-lg p-3 border-0 rounded-4 text-center"
        style="background: #fffafa; max-width: 450px; border: 2px solid #ffc0cb;">

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-2">
                <label for="nom" class="form-label text-secondary fw-bold">Nom</label>
                <input type="text" class="form-control rounded-3 border-light shadow-sm" id="nom" name="nom" required placeholder="Votre nom" value="{{ old('nom') }}">
                @error('nom')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="prenom" class="form-label text-secondary fw-bold">Prénom</label>
                <input type="text" class="form-control rounded-3 border-light shadow-sm" id="prenom" name="prenom" required placeholder="Votre prénom" value="{{ old('prenom') }}">
                @error('prenom')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="date_naissance" class="form-label text-secondary fw-bold">Date de naissance</label>
                <input type="date" class="form-control rounded-3 border-light shadow-sm" id="date_naissance" name="date_naissance" required value="{{ old('date_naissance') }}">
                @error('date_naissance')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="email" class="form-label text-secondary fw-bold">Adresse e-mail</label>
                <input type="email" class="form-control rounded-3 border-light shadow-sm" id="email" name="email" required placeholder="Votre email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="password" class="form-label text-secondary fw-bold">Mot de passe</label>
                <input type="password" class="form-control rounded-3 border-light shadow-sm" id="password" name="password" required placeholder="Créez un mot de passe">
                @error('password')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="password_confirmation" class="form-label text-secondary fw-bold">Confirmez votre mot de passe</label>
                <input type="password" class="form-control rounded-3 border-light shadow-sm" id="password_confirmation" name="password_confirmation" required placeholder="Confirmez votre mot de passe">
                @error('password_confirmation')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- BOUTONS -->
            <div class="d-flex flex-column align-items-center gap-2">
                <button type="submit" class="btn btn-lg rounded-pill shadow-sm" 
                    style="background: linear-gradient(45deg, #ff80ab, #ffb3c6); color: white; width: 100%; transition: 0.3s ease-in-out; font-size: 1rem;"
                    onmouseover="this.style.transform='scale(1.05)';" 
                    onmouseout="this.style.transform='scale(1)';">
                    ✨ S'inscrire ✨
                </button>
                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg rounded-pill shadow-sm"
                    style="width: 100%; transition: 0.3s ease-in-out; font-size: 1rem;"
                    onmouseover="this.style.transform='scale(1.05)';" 
                    onmouseout="this.style.transform='scale(1)';">
                    🔑 Déjà un compte ? Connectez-vous
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
