@extends('layouts.app')
@section('content')

    <!-- Bootstrap の 定形 コード… -->
    <div class="panel-body">

         <!--バリデーションエラーの 表示 に 使用 -->
        @include('common.errors')
         <!--バリデーションエラーの 表示 に 使用 -->
         <!--本 登 録 フォーム -->
        
            <!-- 現 在 の イベント --> 
        @if (count($events) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    公開イベント
                    <form class=""  action="/search" method="get">
                        <div class="input-group" style="width:300px">
                          <input type="text" name="keyword" class="form-control">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">検索</button>
                          </span>
                        </div>
                    </form>
                </div>
                
                <div class="panel-body">
                    <!-- phpイベント: リスト -->
                    <div class="container-fluid">
                    <div class="row no-gutter">
                    @foreach ($events as $event)
                        <div class="col-lg-3 col-md-3 col-sm-3 work">
                            <a href="{{ url('detail/'.$event->id)}}" class="work-box">
                                <div class="eventpic">
                                    <img src="{{ asset($event->eventpic_filename) }}" alt="filename" />
                                    <div class="topevent-title">
                                        <div>{{ $event->event_name}}</div>
                                    </div>
                                         {{csrf_field()}}
                                            <?php
                                                $short = substr("{$event->event_date}",5,11);
                                            ?>
                                    <p><?=$short;?></p>
                                    <p>{{ $event->event_price}}円/{{ $event->event_area}}/{{ $event->event_type}}</p>
                                </div>
                                <div class="overlay">
                                    <div class="overlay-caption">
                                        <h3>{{ $event->event_name}}</h3>
                                        <p><?=$short;?></p>
                                        <p>{{ $event->event_price}}円/{{ $event->event_area}}</p>
                                        <p>主催者：{{ $event->name}}</p>
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                    {{$events->links()}}
                </div>
                    <!-- phpイベント: リスト -->
                </div>
            </div>
        @endif
            <!-- イベント: 既 に 登 録 されてる リスト -->
    </div>
        <!-- Event: 既 に 登 録 されてる 本 のリスト -->
        
        
@include('footer')     
        
@endsection