@extends('modele')

@section('titre', 'Accueil')

@section('content')
<div class="min-vh-100 d-flex flex-column justify-content-center align-items-center"
     style="background: linear-gradient(to right, #fde2e4, #fae1dd); padding: 15px;">
    <div class="card shadow-lg p-4 w-100"
         style="max-width: 400px; border: none; border-radius: 12px; background: #fffafa; position: relative;">
         
        <!-- GIF décoratif en haut -->
        <div class="d-flex justify-content-center mb-3">
            <img src="{{ asset('peach3.gif') }}" alt="Animation Peach" style="width: 80px; height: auto;">
        </div>
        
        <h1 class="text-center h3 fw-bold mb-4"
            style="font-family: 'Dancing Script', cursive; color: #ff5d8f;">
            Oh hey, on attendait que toi !
        </h1>
        
        <p class="text-center text-muted mb-4"
           style="font-family: 'Quicksand', sans-serif;">
            Vous vous êtes connecté avec succès.
        </p>
        
        <form action="{{ route('logout') }}" method="POST" class="d-flex justify-content-center">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-lg px-5 shadow-sm"
                    style="transition: transform 0.3s ease-in-out;"
                    onmouseover="this.style.transform='scale(1.05)';"
                    onmouseout="this.style.transform='scale(1)';">
                Se déconnecter
            </button>
        </form>
    </div>
</div>
@endsection
