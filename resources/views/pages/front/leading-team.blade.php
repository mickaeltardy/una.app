@extends('templates.front.full_layout')

@section('content')

    {{-- top background img --}}
    {{--@if($background_image)--}}
        {{--<div class="top_background_image row">--}}
            {{--<div class="background_responsive_img fill" data-background-image="{{ ImageManager::imagePath(config('image.news.public_path'), $background_image) }}"></div>--}}
        {{--</div>--}}
    {{--@else--}}
        <div class="no_top_background_image"></div>
    {{--@endif--}}

    <div id="content" class="leading-team row">

        <div class="text-content">
            <div class="container">
                <h1><i class="fa fa-cogs"></i> L'équipe dirigeante du club Université Nantes Aviron (UNA)</h1>
                <hr>

                @foreach(config('user.board') as $id => $board)
                    <div class="team">
                        <div class="title display-table">
                            <div class="picto table-cell {{ $board }}">
                                <div class="table-cell">
                                    <i class="fa fa-cog text-info"></i>
                                </div>
                            </div>
                            <h2 class="table-cell">{{ trans('users.config.board.' . $board) }}</h2>
                        </div>
                        <p class="subtitle quote">
                        @if($id === config('user.board_key.leading_board'))Comprend également le <b>président étudiant</b>
                        @elseif($id === config('user.board_key.executive_committee'))Comprend également les membres du <b>Bureau étudiant</b> et du <b>Bureau</b>
                        @endif</p>
                        @foreach($team as $member)
                            @if($member->board_id === $id)
                                <div class="member">
                                    <a href="{{ $member->imagePath($member->photo, 'photo', 'zoom') }}" title="{{ $member->first_name }} {{ $member->last_name }}" data-lity>
                                        <img width="145" height="160" src="{{ $member->imagePath($member->photo, 'photo', 'picture') }}" alt="{{ $member->last_name }} {{ $member->first_name }}">
                                    </a>
                                    <h4 class="display-table">
                                    <span class="table-cell">
                                        {{ $member->first_name }}<br/>{{ $member->last_name }}
                                    </span>
                                    </h4>
                                    <h5 class="display-table">
                                    <span class="table-cell">
                                        {{ trans('users.config.status.' . config('user.status.' . $member->status_id)) }}
                                    </span>
                                    </h5>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach

                <div class="team">
                    <div class="title display-table">
                        <div class="picto table-cell employee">
                            <div class="table-cell">
                                <i class="fa fa-cog employee"></i>
                            </div>
                        </div>
                        <h2 class="table-cell">Salariés</h2>
                    </div>
                    @foreach($team as $member)
                        @if($member->board_id === config('user.board_key.employee'))
                            <div class="member">
                                <a href="{{ $member->imagePath($member->photo, 'photo', 'zoom') }}" title="{{ $member->first_name }} {{ $member->last_name }}" data-lity>
                                    <img width="145" height="160" src="{{ $member->imagePath($member->photo, 'photo', 'picture') }}" alt="{{ $member->last_name }} {{ $member->first_name }}">
                                </a>
                                <h4 class="display-table">
                                    <span class="table-cell">
                                        {{ $member->first_name }}<br/>{{ $member->last_name }}
                                    </span>
                                </h4>
                                <h5 class="display-table">
                                    <span class="table-cell">
                                        {{ trans('users.config.status.' . config('user.status.' . $member->status_id)) }}
                                    </span>
                                </h5>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection