@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">イベント一覧</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection