@extends('layout')
@include('common.commoncss')
@include('common.commonjs')
@section('content')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        {{--   first row --}}
    <div class="d-flex" style="justify-content: space-between;margin-top:10px;">
        <div class="logo" style="font-weight: bolder;color:blue;">Triphub</div>
        <div>
            @guest

                @if(Illuminate\Support\Facades\Route::has('login'))
                    <div class="d-flex" style="flex-direction: row">
                        <div style="margin-right:20px;"><a class="btn btn-primary" href="{{ route('ideas.create')}}">Create ideas</a></div>
                        <div style="margin-right:20px;"><a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a></div>
                        @if(Illuminate\Support\Facades\Route::has('register'))
                            <div style="margin-right:20px;"><a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a></div>
                        @endif
                    </div>


                @endif

            @else
                <div class="d-flex" style="flex-direction: row;">
                    <div style="margin-right:20px;">
                        <a class="btn btn-primary" href="{{ route('ideas.create')}}">Create ideas</a>
                    </div>
                    <div>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('ideas.mylist', ['user' => Auth::user()]) }}">
                                        {{ __('my idea list') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

            @endguest
{{--            <a class="btn btn-primary" href="{{ route('ideas.create')}}">Create ideas</a>--}}
{{--            <a class="btn btn-primary" href="{{ route('register')}}">register</a>--}}
{{--            <a class="btn btn-primary" href="{{ route('login') }}">login</a>--}}
        </div>

    </div>
{{--        second row  for search--}}
    <div class="row">
        <div style="flex-grow: 1;">
            <div style="display: flex;flex-direction: column;">
                <aside class="d-flex" style="flex-direction: row;justify-content: space-between;">
                    <div class="form-group">
                        <select id="searchcategory"   style="height: 80%;">
                            <option value="destination">Destination</option>
                            <option value="tags">Tags</option>
                        </select>
                        <input type="text" id="searchContent"  name="searchContent"   style="height: 80%;"></input>
                        <div class="form-check form-check-inline" style="margin-left: 10px">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="partial">
                            <label class="form-check-label" for="inlineCheckbox1">Partial Math</label>
                        </div>
                        <button type="button" class="btn btn-primary" name="search"  id="search">Find ideas!</button>
                    </div>

                </aside>



            </div>

        </div>
    </div>
{{--    third row for loop ideas--}}
    <div class="row">
        <div id="seach_body">
            @foreach($ideas as $idea)
                <div  class="mb-5 mt-3 d-flex" style="flex-direction: row;">
                    <div class="idea_image"><img src="/img/caption.jpg" alt="" height="400" width="500" style="border-radius: 10px;"></div>
                    <div class="d-flex" style="flex-direction: column;margin-left: 10px;">
                        <div class="ideas_id"><h3>{{$idea->ideaId}}</h3></div>
                        <div class="title"><h4><a href="{{ route('ideas.show',$idea->ideaId)}}">{{$idea->title}}</a></h4></div>
                        <div class="destination d-flex" style="flex-direction: row;align-items: center;font-weight: bolder;font-size:18px;">
                            <img src="/img/location.svg" alt="" height="16" width="16">{{$idea->destination}}
                        </div>
                        <div class="tags">

                            {{$idea->tags}}
                        </div>
                        <div class="content" style="margin:20px;">{{$idea->content}}</div>
                        <div class="ideas_date d-flex" style="flex-direction: column;margin-top: 10px;justify-content: space-between;">
                            <div class="start_date"><svg viewBox="0 0 24 24" width="20px" height="20px" class="d Vb UmNoP">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.713 3.982a9.994 9.994 0 00-4.734 8.502c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.522-4.477-10-10-10v1.5a8.5 8.5 0 11-5.266 1.828v-1.83z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M6.323 4.935h-3.55v-1.5h5.05v5.05h-1.5v-3.55zM11.333 13.034v-5.36h1.5v5.457c0 .312-.116.612-.326.842l-2.765 3.033-1.109-1.01 2.7-2.962z"></path></svg>
                                start date:{{date('Y-m-d', strtotime($idea->startDate))}}

                            </div>
                            <div class="end_date">
                                <svg viewBox="0 0 24 24" width="20px" height="20px" class="d Vb UmNoP"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.713 3.982a9.994 9.994 0 00-4.734 8.502c0 5.523 4.477 10 10 10s10-4.477 10-10c0-5.522-4.477-10-10-10v1.5a8.5 8.5 0 11-5.266 1.828v-1.83z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M6.323 4.935h-3.55v-1.5h5.05v5.05h-1.5v-3.55zM11.333 13.034v-5.36h1.5v5.457c0 .312-.116.612-.326.842l-2.765 3.033-1.109-1.01 2.7-2.962z"></path></svg>
                                end date:{{date('Y-m-d', strtotime($idea->endDate))}}
                            </div>
                        </div>
                    </div>
{{--                    <div>title:<a href="{{ route('ideas.show',$idea->ideaId)}}"></a></div>--}}
{{--                    <div>destination:</div>--}}
{{--                    <div>startDate:{{$idea->startDate}}</div>--}}
{{--                    <div>endDate:{{$idea->endDate}}</div>--}}
{{--                    <div>tags:{{$idea->tags}}</div>--}}
                </div>
            @endforeach
            {{$ideas->links()}}
        </div>
    </div>


@endsection
