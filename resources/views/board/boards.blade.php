@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">ボード一覧</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('wording.board_name') }}</th>
                                    <th>{{ __('wording.status') }}</th>
                                    <th>{{ __('wording.delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($boards as $board)
                                <tr>
                                    <td><a href="{{ route('events', ['hash_key' => $board['hash_code'] ]) }}">{{$board['board_name']}}</a></td>
                                    <td>公開中</td>
                                    <td><input type="button" value="削除" /></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection