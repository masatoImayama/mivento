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
                                <tr>
                                    <td><a href="{{ route('events', ['id_board' => 1]) }}">テストボード1</a></td>
                                    <td>公開中</td>
                                    <td><input type="button" value="削除" /></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('events', ['id_board' => 2]) }}">テストボード2</a></td>
                                    <td>非公開</td>
                                    <td><input type="button" value="削除" /></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('events', ['id_board' => 3]) }}">テストボード3</a></td>
                                    <td>公開中</td>
                                    <td><input type="button" value="削除" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection