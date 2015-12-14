@extends('templates.back.full_layout')

@section('content')

    <div id="content" class="slide edit">

        <div class="text-content">

            <div class="col-sm-12">

                {{-- Title--}}
                <h2>
                    <i class="fa fa-user"></i>
                    @if(isset($slide) && !(\Sentinel::getUser()->id === $slide->id))
                        {{ trans('home.page.title.slide.edit') }}
                    @else
                        {{ trans('home.page.title.slide.create') }}
                    @endif
                </h2>

                <hr>

                <form role="form" method="POST" action="@if(isset($slide)){{ route('slides.update') }} @else{{ route('slides.store') }} @endif" enctype="multipart/form-data">

                    {{-- crsf token --}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    {{-- add update inputs if we are in update mode --}}
                    @if(isset($slide))
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_id" value="{{ $slide->id }}">
                    @endif

                    {{-- personal data --}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ trans('home.page.title.slide.data') }}</h3>
                        </div>
                        <div class="panel-body">

                            {{-- title --}}
                            <label for="input_title" class="required">{{ trans('home.page.label.slide.title') }}</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" for="input_title"><i class="fa fa-user"></i></span>
                                    <input id="input_title" class="form-control capitalize-first-letter" type="text" name="title" value="{{ old('title') ? old('title') : (isset($slide) && $slide->title ? $slide->title : null) }}" placeholder="{{ trans('home.page.label.slide.title') }}">
                                </div>
                            </div>

                            {{-- quote --}}
                            <label for="input_quote" class="required">{{ trans('home.page.label.slide.quote') }}</label>
                            <div class="form-group textarea">
                                <div class="input-group">
                                    <span class="input-group-addon" for="input_quote"><i class="fa fa-user"></i></span>
                                        <textarea name="quote" id="input_quote" class="form-control capitalize-first-letter" placeholder="{{ trans('home.page.label.slide.quote') }}" >{{ old('quote') ? old('quote') : (isset($slide) && $slide->quote ? $slide->quote : null) }}</textarea>
                                </div>
                            </div>

                            {{-- picto --}}
                            <label for="input_picto">{{ trans('home.page.label.slide.picto') }}</label>
                            @if(isset($slide) && $slide->picto)
                                <div class="form-group image">
                                    <a class="img-thumbnail bg-dark" href="{{ route('image', ['filename' => $slide->picto, 'storage_path' => $slide->storagePath(), 'size' => 'picto']) }}" data-lity>
                                        <img width="40" height="40" src="{{ route('image', ['filename' => $slide->picto, 'storage_path' => $slide->storagePath(), 'size' => 'admin']) }}" alt="">
                                    </a>
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file">
                                            <i class="fa fa-picture-o"></i> {{ trans('global.action.browse') }} <input type="file" name="picto">
                                        </span>
                                    </span>
                                    <input id="input_background_image" type="text" class="form-control" readonly="">
                                </div>
                                <p class="help-block quote"><i class="fa fa-info-circle"></i> {{ trans('home.page.info.slide.picto') }}</p>
                            </div>

                            {{-- background image --}}
                            <label for="input_background_image">{{ trans('home.page.label.slide.background_image') }}</label>
                            @if(isset($slide) && $slide->background_image)
                                <div class="form-group image">
                                    <a class="img-thumbnail" href="{{ route('image', ['filename' => $slide->background_image, 'storage_path' => $slide->storagePath(), 'size' => '767']) }}" data-lity>
                                        <img src="{{ route('image', ['filename' => $slide->background_image, 'storage_path' => $slide->storagePath(), 'size' => 'admin']) }}" alt="{{ $slide->first_name }} {{ $slide->last_name }}">
                                    </a>
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-primary btn-file">
                                            <i class="fa fa-picture-o"></i> {{ trans('global.action.browse') }} <input type="file" name="background_image">
                                        </span>
                                    </span>
                                    <input id="input_background_image" type="text" class="form-control" readonly="">
                                </div>
                                <p class="help-block quote"><i class="fa fa-info-circle"></i> {{ trans('home.page.info.slide.background_image') }}</p>
                            </div>

                            {{-- position --}}
                            <label for="input_position">{{ trans('home.page.label.slide.position') }}</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon" for="input_position"><i class="fa fa-sort-numeric-asc"></i></span>
                                    <input id="input_position" class="form-control" type="number" name="position" value="{{  isset($slide) && $slide->position ? $slide->position : null }}" placeholder="{{ trans('home.page.label.slide.position') }}" disabled>
                                </div>
                            </div>

                            {{-- previous slide --}}
                            <label for="input_previous_slide" class="required">{{ trans('home.page.label.slide.previous_slide') }}</label>
                            <div class="form-group">
                                <select class="form-control" name="previous_slide_id" id="input_previous_slide">
                                    <option value="" disabled selected>{{ trans('permissions.page.label.placeholder') }}</option>
                                    @foreach($slide_list as $s)
                                        <option value="{{ $s->id }}"
                                                @if(old('previous_slide_id') == $s->id)selected
                                                @elseif(isset($previous_slide) && $previous_slide->id === $s->id)selected
                                                @elseif($s->id === 0)selected
                                                @endif>
                                            @if(!isset($s->position))
                                                X - {{ $s->title }}
                                            @else
                                                {{ $s->position }} - {{ $s->title }}
                                            @endif
                                        </option>
                                    @endforeach
                                </select>
                                <p class="help-block quote"><i class="fa fa-info-circle"></i> {{ trans('home.page.info.slide.previous_slide') }}</p>
                            </div>

                        </div>
                    </div>

                    {{-- submit login --}}
                    @if(isset($slide))
                        <button class="btn btn-primary spin-on-click" type="submit">
                            <i class="fa fa-pencil-square"></i> {{ trans('home.page.action.slide.update') }}
                        </button>
                        <a href="{{ route('home.edit') }}" class="btn btn-default spin-on-click" title="{{ trans('global.action.back') }}">
                            <i class="fa fa-undo"></i> {{ trans('global.action.back') }}
                        </a>
                    @else
                        <button class="btn btn-success spin-on-click" type="submit">
                            <i class="fa fa-plus-circle"></i> {{ trans('home.page.action.slide.create') }}
                        </button>
                        <a href="{{ route('home.edit') }}" class="btn btn-default spin-on-click" title="{{ trans('global.action.cancel') }}">
                            <i class="fa fa-ban"></i> {{ trans('global.action.cancel') }}
                        </a>
                    @endif
                </form>

            </div>
        </div>
    </div>

@endsection