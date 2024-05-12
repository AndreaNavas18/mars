@php
    $user = auth()->user();
    $layouts = [
        'vista.admin' => 'layouts.appA',
        'vista.tendero' => 'layouts.appT',
        'vista.vendedor' => 'layouts.appA',
    ];
@endphp

@foreach ($layouts as $permission => $layout)
    @if ($user->can($permission))
        @extends($layout)
        @section('content')
            <div>
                @include("modules." . explode(".", $permission)[1] . ".dashboard")
            </div>
        @endsection
        @break
    @endif
@endforeach