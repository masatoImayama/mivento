@extends('layouts.app')

@section('css')

@endsection

@section('script')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
             
            <div class="card">
                <form method="POST" name="form" action="{{ route('event_regist') }}">
                    @csrf
                    <div class="card-header">{{ __('wording.event') }}{{ __('wording.confirm') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>{{ __('wording.event_name') }}</th>
                                <td>{{$event_name}}</td>
                                <input type="hidden" name="event_name" value="{{$event_name}}" />
                            </tr>
                            <tr>
                                <th>{{ __('wording.start_datetime') }}</th>
                                <td>{{$event_start_datetime}}</td>
                                <input type="hidden" name="event_start_datetime" value="{{$event_start_datetime}}" />
                            </tr>
                            <tr>
                                <th>{{ __('wording.end_datetime') }}</th>
                                <td>{{$event_end_datetime}}</td>
                                <input type="hidden" name="event_end_datetime" value="{{$event_end_datetime}}" />
                            </tr>
                            <tr>
                                <th>{{ __('wording.event_description') }}</th>
                                <td>{!! nl2br(e($description)) !!}</td>
                                <input type="hidden" name="description" value="{{$description}}" />
                            </tr>
                        </table>
                    </div>

                    <div class="card-footer">
                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 text-center">
                                <input type="submit" name="back" class="btn btn-outline-secondary" style="width:100px;" value="{{ __('wording.back') }}" />
                                <input type="submit" name="event_regist" id="event_regist" class="btn btn-outline-primary" style="width:100px;" value="{{ __('wording.regist') }}" />
                                <input type="hidden" name="board_hash_key" value="{{ $board_hash_key }}">
                                <input type="hidden" name="event_hash_key" value="{{ $event_hash_key ?? '' }}">
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection