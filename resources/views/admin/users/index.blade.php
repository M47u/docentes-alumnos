@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Listado de Usuarios</h2>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Foto</th>
                <th class="py-2">Nombre</th>
                <th class="py-2">Email</th>
                <th class="py-2">Teléfono</th>
                <th class="py-2">Enlace profesional</th>
                <th class="py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td><img src="{{ $user->photo_path }}" alt="Foto" class="w-12 h-12 rounded-full object-cover"></td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="https://wa.me/{{ env('WHATSAPP_PREFIX', '54') }}{{ $user->phone }}" target="_blank" class="text-blue-500">WhatsApp</a></td>
                <td>
                    @if($user->professional_url)
                        <a href="{{ $user->professional_url }}" target="_blank" class="text-blue-500">Red profesional</a>
                    @endif
                </td>
                <td><a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-info">Ver detalle</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
