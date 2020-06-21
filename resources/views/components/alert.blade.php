<div>
    {{-- {{ $slot }} --}}
    @if(session('message'))
        {{-- {{ session()->forget('message') }} --}}
        <nav>
            <div class="nav-wrapper teal">
            <div class="col s12 center">
                {{ session('message') }}
            </div>
            </div>
        </nav>
    @elseif(session()->has('error'))
        <nav>
            <div class="nav-wrapper">
            <div class="col s12 center">
                {{ session('error') }}
            </div>
            </div>
        </nav>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>