@extends('layouts.app')

@section('css')

@endsection

@section('script')
    function confirm_status_change(hash_key, status) {
        if (confirm({{ __('message.confirm_status_change') }})) {
            document.form.action = "{{ route('board_status_change') }}";

            var input_data = document.createElement('input');
            input_data.type = 'hidden';
            input_data.name = 'hash_key';
            input_data.value = hash_key;
            document.form.appendChild(input_data);

            var input_data = document.createElement('input');
            input_data.type = 'hidden';
            input_data.name = 'status';
            input_data.value = status;
            document.form.appendChild(input_data);
            
            document.form.submit();
        } else {
            return;
        }
    }

    function confirm_delete(hash_key) {
        if (confirm({{ __('message.confirm_delete') }})) {
            document.form.action = "{{ route('board_delete') }}";

            var input_data = document.createElement('input');
            input_data.type = 'hidden';
            input_data.name = 'hash_key';
            input_data.value = hash_key;
            document.form.appendChild(input_data);

            document.form.submit();
        } else {
            return;
        }
    }
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
             
             @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <div class="card">
                <div class="card-header">{{ __('wording.menu_boards') }}</div>

                <div class="card-body">
                    <form method="POST" name="form" action="">
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
                                    <td><a href="{{ route('events', ['hash_key' => $board['hash_key'] ]) }}">{{$board['board_name']}}</a></td>
                                    <td>
                                        {{ __('wording.open') }}
                                        &nbsp;&nbsp;
                                        <input type="submit" name="status_close" value="{{ __('wording.close') }}" onClick="status_change({{$board['hash_key']}}, config('const.status.close'))" />
                                    </td>
                                    <td><input type="submit" name="delete" value="{{ __('wording.delete') }}" onClick="delete({{$board['hash_key']}})" /></td>
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