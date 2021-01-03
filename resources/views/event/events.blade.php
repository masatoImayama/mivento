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

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>イベント名</th>
                                    <th>日程</th>
                                    <th>ステータス</th>
                                    <th>編集</th>
                                    <th>削除</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="{{ route('event.edit', ['hash_key' => 'alsdfkjgqrijadnadvi']) }}">イベント1</a></td>
                                    <td>2021年01月10日</td>
                                    <td>未開催</td>
                                    <td><input type="button" value="編集" /></td>
                                    <td><input type="button" value="削除" /></td>
                                </tr>
                                <tr>
                                    <td><a href="{{ route('event.edit', ['hash_key' => 'nauif678asde8jkas8k']) }}">イベント2</a></td>
                                    <td>2021年01月01日</td>
                                    <td>終了</td>
                                    <td><input type="button" value="編集" /></td>
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