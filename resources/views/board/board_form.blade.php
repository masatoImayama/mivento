@extends('layouts.app')

@section('css')

@endsection

@section('script')
    function page_back() {
        location.href = "{{ route('boards', []) }}";
    }
@endsection

@section('content')
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
                <div class="card-header">{{ __('wording.board') }}{{ __('wording.add') }}</div>

                <form method="POST" name="form" action="{{ route('board_confirm') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="board_name">{{ __('wording.board_name') }}</label>
                            <input type="text" class="form-control" name="board_name" id="board_name" placeholder="{{ __('wording.board_name') }}" value="{{ $board_name ?? old('board_name')}}">
                        </div>
                        <div class="form-group">
                            <label for="board_description">{{ __('wording.board_description') }}</label>
                            <textarea id="board_description" name="description" class="form-control" rows="5">{{ $description ?? old('description')}}</textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 text-center">
                                <input type="button" class="btn btn-outline-secondary" style="width:100px;" value="{{ __('wording.back') }}" onclick="page_back();" />
                                <input type="submit" name="board_confirm" id="board_confirm" class="btn btn-outline-primary" style="width:100px;" value="{{ __('wording.confirm') }}" />
                                <input type="hidden" name="hash_key" value="{{ $hash_key ?? '' }}">
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