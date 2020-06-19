@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- @include('layouts.flash') --}}
                    {{-- <x-alert/> --}}
                    <x-alert>
                        <p>Response from image Upload goes here</p>
                    </x-alert>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="card">
        <div class="card-header">Upload File</div>
            <div class="card-body">
                <form action="/upload" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="image" id="">
                    <input type="submit" value="submit">
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection
