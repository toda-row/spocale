@extends('layouts.app')
@section('content')
<div class="panel-body">
        @include('common.errors')
        <form action="{{ url('events/duplicate')}}" method="POST" enctype="multipart/form-data">
            <div class="form-horizontal" >
        <!-- item_name -->
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="event_name">イベント名</label>
                    <input type="text" id="event_name" name="event_name" class="form-control" value="{{$event->event_name}}">
                </div>
                <div class="col-sm-3">
                    <label for="date" class="control-label">★新しい開催日★ </label>
                    <input type="date" id="event_date" name="event_date" class="form-control" value="{{$event->event_date}}">
                </div>
                <div class="col-sm-3">
                    <label for="time" class="control-label">開催時間 </label>
                    <input type="time" id="event_time" name="event_time" class="form-control" value="{{$event->event_time}}">
                </div>
                <div class="col-sm-6">
                    <label for="event_type">イベントタイプ</label>
                    <input type="text" id="event_type" name="event_type" class="form-control" value="{{$event->event_type}}"/>
                </div>
                <div class="col-sm-6">
                    <label for="event_area">開催エリア</label>
                    <input type="text" id="event_area" name="event_area" class="form-control" value="{{$event->event_area}}"/>
                </div>
                <div class="col-sm-6">
                    <label for="event_adress">開催住所</label>
                    <input type="text" id="event_adress" name="event_adress" class="form-control" value="{{$event->event_adress}}"/>
                </div>
                <div class="col-sm-6">
                    <label for="event_price">参加費</label>
                    <input type="text" id="event_price" name="event_price" class="form-control" value="{{$event->event_price}}">
                </div>
                <div class="col-sm-6">
                    <label for="email">email（参加連絡/問い合わせ用）</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{$event->email}}">
                </div>
                <div class="col-sm-6">
                    <label for="file" class="control-label" >写真の変更 </label>
                    <input type="file" name="filename" id="filename" class="form-control"> 
                </div>
                
                <div class="col-sm-6">
                    <label for="description">詳細情報</label>
                    <textarea name="description" id="description" class="form-control" rows="10">{{$event->description}}
                    </textarea>
                </div>
            
                
                <div class="col-sm-6">
                    <div >
                        @if($event->eventpic_filename)
                            <p>
                                <img src="{{ asset($event->eventpic_filename) }}" alt="filename" class="img-responsive">
                            </p>
                        @endif
                    </div>
                </div>
                
                
            </div>
                <input type="hidden" name="life_flg" id="life_flg" value="1" >
                <input type="hidden" name="id" id="id" value="{{$event->event_id}}" > 
            <!-- Save ボタン/ Back ボタン -->
            <div class="well well-sm">
            <button type="submit" class="btn btn-primary">  複製</button>
            <a class="btn btn-link pull-right" >
            <i class="glyphicon glyphicon-backward"></i> 戻る </a>
            </div>
            <!-- Save ボタン/ Back ボタン -->
            <!-- id 値 を 送信 -->
            <input type="hidden" name="id" value="{{$event->id}}" />
            <!--/ id 値 を 送信 -->
            <!-- CSRF -->
                {{csrf_field()}}
            <!--/ CSRF -->
            </div>
        </form>
</div>
        @endsection