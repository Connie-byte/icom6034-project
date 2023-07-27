@extends('layout')
@include('common.commoncss')
@include('common.commonjs')
@section('content')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @if(!$flag)
        <div class="row" style="margin-top: 10px;margin-bottom: 10px;" id="weatherDiv">
            <div>
                <h1 style="text-align: center"><button type="button" class="btn btn-primary" name="Weathersearch"  id="Weathersearch">Weather Forecast</button></h1>
                <table class="table table-striped table-bordered" id="weathertable">

                    <tr>
                        <th>datetime</th>
                        <th>city</th>
                        <th>current weather</th>
                        <th>humidity</th>
                        <th>wind</th>
                        <th>temp</th>
                    </tr>
                </table>
            </div>
        </div>
    @endif

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

                </div>
            @endforeach

        </div>
    </div>



@endsection

<script type="text/javascript">

    $(function(){

        $('#search').on('click',function(){
            $searchcategory=$('#searchcategory').val()
            $search=$('#searchContent').val()
            $Partial=true

            $.ajax({
                type : 'get',
                url : '{{URL::to('search')}}',
                data:{'search':$search,'searchcategory':$searchcategory,'Partial':$Partial},
                success:function(data){
                    $('#seach_body').html(data);
                }
            });







        })
        $('#Weathersearch').on('click',function (){
            const settings = {
                async: true,
                crossDomain: true,
                url: 'https://open-weather13.p.rapidapi.com/city/'+$search,
                method: 'GET',
                headers: {
                    'X-RapidAPI-Key': '5981101b95mshb092f84a0d77a4bp1c6dc0jsn54a7b6472226',
                    'X-RapidAPI-Host': 'open-weather13.p.rapidapi.com'
                }

            };
            $.ajax(settings).done(function (response) {
                let html='';
                // let data=response['data'];

                var d = new Date();
                var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
                let city=$search
                let current_weather=response.weather[0].description
                let humidity=response.main.humidity
                let wind=response.wind.speed
                let temp=response.main.temp
                $('#row1').remove()
                html+='<tr id="row1">'+
                    '<td>' + strDate + '</td>' +
                    '<td>' + city + '</td>' +
                    '<td>' + current_weather + '</td>' +
                    '<td>' + humidity + '</td>' +
                    '<td>' + wind + '</td>' +
                    '<td>' + temp + '</td>' +
                    '</tr>';

                $('#weathertable tr').first().after(html);
            });
        })
    })

</script>
