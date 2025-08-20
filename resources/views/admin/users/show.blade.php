@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Detalle de Usuario</h2>
    <div class="flex items-center mb-4">
        <img src="{{ $user->photo_path }}" alt="Foto de perfil" class="w-24 h-24 rounded-full object-cover mr-4">
        <div>
            <p class="font-semibold">{{ $user->name }}</p>
            <p>{{ $user->email }}</p>
            <a href="https://wa.me/{{ env('WHATSAPP_PREFIX', '54') }}{{ $user->phone }}" target="_blank" class="text-blue-500">WhatsApp</a>
            <br>
            @if($user->professional_url)
                <a href="{{ $user->professional_url }}" target="_blank" class="text-blue-500">Red profesional</a>
            @endif
        </div>
    </div>
</div>
@endsection
