@extends('layouts.app')

@section('css')

@endsection

@section('content')
<div class="content content-customize">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">イベント編集</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="event_name" class="col-md-4 col-form-label text-md-right">{{ __('wording.event_name') }}</label>

                            <div class="col-md-6">
                                <input id="event_name" type="text" class="form-control" name="event_name" value="" required placeholder="{{ __('wording.event_name') }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="event_name" class="col-md-4 col-form-label text-md-right">{{ __('wording.header_image') }}</label>

                            <div class="col-md-6">
                                <input id="event_name" type="file" class="form-control" name="header_image" value="" required placeholder="{{ __('wording.header_image') }}" />
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="event_name" class="col-md-4 col-form-label text-md-right">{{ __('wording.header_image_preview') }}</label>

                            <div class="col-md-6">
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="schedule" class="col-md-4 col-form-label text-md-right">{{ __('wording.schedule') }}</label>

                            <div class="col-md-6">
                                <input id="schedule" type="text" class="form-control" name="schedule" value="" required placeholder="{{ __('wording.schedule') }}" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="overview" class="col-md-4 col-form-label text-md-right">{{ __('wording.overview') }}</label>

                            <div class="col-md-6">
                                <textarea id="overview" rows="15" style="width:100%">
                                </textarea>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="card-footer">
                    <div class="form-group row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 text-center">
                            <input type="button" class="btn btn-outline-secondary" style="width:100px;" value="{{ __('wording.back') }}" />
                            <input type="button" class="btn btn-outline-primary" style="width:100px;" value="{{ __('wording.regist') }}" />
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection