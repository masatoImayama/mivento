@extends('layouts.app')

@section('css')

@endsection

@section('script')
    function event_status_change(hash_key, status) {

        if (confirm("{{ __('messages.confirm_status_change') }}")) {
            document.form.action = "{{ route('event_status_change') }}";

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

    function event_delete(hash_key) {

        if (confirm("{{ __('messages.confirm_delete') }}")) {
            document.form.action = "{{ route('event_delete') }}";

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

    function event_add() {
        location.href = "{{ route('event_form', ['board_hash_key' => $board['hash_key']]) }}";
    }

    function event_edit(hash_key) {
        location.href = "{{ route('event_form', ['board_hash_key' => $board['hash_key']]) }}/" + hash_key ;
    }
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
                        <div class="form-group row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 text-right">
                                <input type="button" class="btn btn-outline-primary" style="width:100px;" value="{{ __('wording.add') }}" onclick="event_add();" />
                            </div>
                        </div>

                        @if (count($board['events']) > 0) 
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('wording.event_name') }}</th>
                                    <th>{{ __('wording.schedule') }}</th>
                                    <th>{{ __('wording.status') }}</th>
                                    <th>{{ __('wording.edit') }}</th>
                                    <th>{{ __('wording.delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($board['events'] as $event)
                                <tr>
                                    <td><a href="{{ route('event_form', ['board_hash_key' => $board['hash_key'], 'event_hash_key' => $event['hash_key']]) }}">{{$event['event_name']}}</a></td>
                                    <td>{{$event['event_start_datetime']}}～{{$event['event_end_datetime']}}</td>
                                    <td>
                                        @if($event['status'] === config('const.status.open'))
                                            {{ __('wording.open') }}
                                            &nbsp;&nbsp;
                                            <input type="button" name="status_close" value="{{ __('wording.close') }}" onclick="event_status_change('{{{ $event['hash_key'] }}}', {{{ config('const.status.close') }}});" />
                                        @else
                                            {{ __('wording.close') }}
                                            <input type="button" name="status_open" value="{{ __('wording.open') }}" onclick="event_status_change('{{{ $event['hash_key'] }}}', {{{ config('const.status.open') }}});" />
                                        @endif
                                    </td>

                                    <td><input type="button" name="edit" value="{{ __('wording.edit') }}" onclick="event_edit('{{{ $event['hash_key'] }}}');" /></td>
                                    <td><input type="button" name="delete" value="{{ __('wording.delete') }}" onclick="event_delete('{{{ $event['hash_key'] }}}');" /></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif

                        <input type="hidden" name="board_hash_key" value="{{ $board['hash_key'] }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection