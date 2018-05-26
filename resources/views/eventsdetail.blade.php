@extends('layouts.app')
@section('content')

@include('common.errors')
<div class="container-fluid">
  <div class="row">

    <div class="sidebar col-sm-3 hidden-xs">
            <p>おすすめイベント</p>
            <ul id="list">共通のサイドバー部分</ul>
                <li>バスケ</li>
                <li>ランニング</li>
            @include('side')
    </div>
    <div class="col-sm-9 col-sm-offset-3">
        @include('function')
        <?php
        // $week = [
        //   '日', //0
        //   '月', //1
        //   '火', //2
        //   '水', //3
        //   '木', //4
        //   '金', //5
        //   '土', //6
        // ];
        // $timestamp = "{$event->event_date}";
        // $date = date('w', $timestamp);
        // echo $week[$date] . '曜日';
        
        $short = substr("{$event->event_date}", 0, 16);
        ?>

        <div><?=$short;?> / {{$event->event_type}} / {{ $event->event_area}} / {{ $event->event_price}}円</div>
        <div>{{ $event->event_name}}</div>
        
        @if($event->eventpic_filename)
            <p>
                <img src="{{ asset($event->eventpic_filename) }}" alt="filename" class="img-responsive">
            </p>
        @endif
        
        <div>{{ $event->description}}</div>
        <div>{{ $event->event_adress}}</div>
            <?php
                $address = "{$event->event_adress}"; 
                $address_encode = urlencode($address);
                $zoom = 15;  //ズームレベル
                $gmap_url = "http://maps.google.co.jp/maps?q=".$address_encode."&z=".$zoom;
            ?>
        <p><a href="<?=$gmap_url;?>" target="_blank">マップ表示</a></p>
        
        
        
        <form action="{{ url('attend')}}" method="POST" enctype="multipart/form-data">
      

            <div class="well well-sm">
                <button type="submit" class="btn btn-primary"> 参加する</button>
                <a class="btn btn-link pull-right" >
                <i class="glyphicon glyphicon-backward"></i> Back </a>
            </div>
            <input type="hidden" name="event_id" value="{{$event->id}}" />
            <input type="hidden" name="event_date" value="{{$event->event_date}}" />
             <!--CSRF -->
                {{csrf_field()}}
            <!--/ CSRF -->
        </form>
        </div>
  </div>
</div>

@endsection