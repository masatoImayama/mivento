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
                <form method="POST" name="form" action="{{ route('board_regist') }}">
                    @csrf
                    <div class="card-header">{{ __('wording.board') }}{{ __('wording.confirm') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>{{ __('wording.board_name') }}</th>
                                <td>{{$board_name}}</td>
                                <input type="hidden" name="board_name" value="{{$board_name}}" />
                            </tr>
                            <tr>
                                <th>{{ __('wording.board_description') }}</th>
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
                                <input type="submit" name="board_regist" id="board_regist" class="btn btn-outline-primary" style="width:100px;" value="{{ __('wording.regist') }}" />
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