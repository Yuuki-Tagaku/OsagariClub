@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">     
            <!-- @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif -->
            <div class = "container">
                <div class = "d-flex align-items-center justify-content-center" style="height: 100vh;">
                    <div>
                        <p class = "text-center m-1">登録が完了しました！</p>
                        <a href="search" class =" d-flex align-items-center justify-content-center"><button >始める</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection
