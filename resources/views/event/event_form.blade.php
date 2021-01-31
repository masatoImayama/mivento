@extends('layouts.app')

@section('css')

@endsection

@section('script')
    function page_back() {
        location.href = "{{ route('events', ['hash_key' => $board_hash_key]) }}";
    }
@endsection

@section('content')
<div class="content content-customize">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:#ff0000;">{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <div class="card">
                <form method="POST" action="{{ route('event_confirm') }}">
                        @csrf
                    <div class="card-header">イベント編集</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="event_name" class="col-md-4 col-form-label text-md-right">{{ __('wording.event_name') }}</label>

                            <div class="col-md-6">
                                <input id="event_name" type="text" class="form-control" name="event_name" value="{{ $event['event_name'] ?? old('event_name')}}" required placeholder="{{ __('wording.event_name') }}" />
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="event_name" class="col-md-4 col-form-label text-md-right">{{ __('wording.header_image') }}</label>

                            <div class="col-md-6">
                                <input id="event_name" type="file" class="form-control" name="header_image" value="" required placeholder="{{ __('wording.header_image') }}" />
                            </div>
                        </div> --}}
                        
                        {{-- <div class="form-group row">
                            <label for="event_name" class="col-md-4 col-form-label text-md-right">{{ __('wording.header_image_preview') }}</label>

                            <div class="col-md-6">
                                
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="event_start_datetime" class="col-md-4 col-form-label text-md-right">{{ __('wording.start_datetime') }}</label>

                            <div class="col-md-6">
                                <input id="event_start_datetime" type="text" class="form-control" name="event_start_datetime" value="{{ $event['event_start_datetime'] ?? old('event_start_datetime')}}" required placeholder="{{ __('wording.start_datetime') }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="event_end_datetime" class="col-md-4 col-form-label text-md-right">{{ __('wording.end_datetime') }}</label>

                            <div class="col-md-6">
                                <input id="event_end_datetime" type="text" class="form-control" name="event_end_datetime" value="{{ $event['event_end_datetime'] ?? old('event_end_datetime')}}"  placeholder="{{ __('wording.end_datetime') }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('wording.event_description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" name="description" class="form-control" rows="15">{{ $event['description'] ?? old('description')}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 text-center">
                                <input type="button" class="btn btn-outline-secondary" style="width:100px;" value="{{ __('wording.back') }}" onclick="page_back();" />
                                <input type="submit" name="event_confirm" id="event_confirm" class="btn btn-outline-primary" style="width:100px;" value="{{ __('wording.confirm') }}" />

                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>

                    <input type="hidden" name="board_hash_key" value="{{ $board_hash_key }}">
                    <input type="hidden" name="event_hash_key" value="{{ $event['hash_key'] ?? '' }}">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection