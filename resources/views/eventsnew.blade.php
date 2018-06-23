@extends('layouts.app')
@section('content')
    <div class="panel-body">
        <!-- バリデーションエラーの 表示 に 使用 -->
        @include('common.errors')
        <!-- バリデーションエラーの 表示 に 使用 -->
        <form action="{{ url('events/eventadd')}}" method="POST" enctype="multipart/form-data">
            <div class="form-horizontal" >
            {{csrf_field()}}
             <!--本 のタイトル -->
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="event" class="control-label">イベント名</label>
                            <input type="text" name="event_name" id="event-name" class="form-control" value="皇居ランニング">
                        </div>
                        <div class="col-sm-3">
                            <label for="date" class="control-label">開催日 </label>
                            <?php
                                $date = date('Y-m-d');
                                // ->modify('+7 days') ->format('Y-m-d\TH:i')
                            ?>
                            <input type="date" name="event_date" id="event-date" class="form-control" value="<?= $date?>"> 
                            
                        </div>
                        <div class="col-sm-3">
                            <label for="time" class="control-label">開催時間 </label>
                            <?php
                                $time = date('H:i');
                                // ->modify('+7 days')->format('Y-m-d\TH:i') 
                            ?>
                            <input type="time" name="event_time" id="event-time" class="form-control" value="<?= $time ?>"> 
                            
                        </div>
                        <div class="col-sm-6">
                            <label for="event" class="control-label">イベントタイプ</label>
                            <input type="text" name="event_type" id="event-type" class="form-control" value="ランニング">
                        </div>
                        <div class="col-sm-6">
                            <label for="area" class="control-label">開催エリア</label>
                            <input type="text" name="event_area" id="event-area" class="form-control" value="千代田区">
                        </div>  
                        <div class="col-sm-6">
                            <label for="adress" class="control-label">開催住所</label>
                            <input type="text" name="event_adress" id="event-adress" class="form-control" value="千代田区1-2-3">
                        </div>                         
                        <div class="col-sm-6">
                            <label for="price" class="control-label">参加費 </label>
                            <input type="text" name="event_price" id="event-price" class="form-control" value="1000"> 
                        </div>
                        <div class="col-sm-6">
                            <label for="email" class="control-label">メール </label>
                            <input type="text" name="email" id="email" class="form-control" value="test@test.jp"> 
                        </div>
                        <!--画像追加-->
                        <div class="col-sm-6">
                           <label for="file" class="control-label" >写真 </label>
                            <input type="file" name="filename" id="filename" class="form-control"> 
                        </div>
                        
                        <div class="col-sm-6">
                            <label for="description" class="control-label">詳細 </label>
                            <textarea name="description" id="description" class="form-control" rows="5">
詳細情報はここにコピペ
改行
                                
                            </textarea>
                        </div>
                        
                        
                    </div>

                    <input type="hidden" name="life_flg" id="life_flg" value="1" > 
            <!-- Save ボタン/ Back ボタン -->
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary"> 
                    <i class="fa fa-plus glyphicon glyphicon-plus"></i> Save 
                    </button>
                    
                    <button class="btn btn-link pull-right" href="{{ url('/events') }}">
                    <i class="fa fa-arrow-left glyphicon glyphicon-backward"></i> Back 
                    </button>
                </div>
            <!-- Save ボタン/ Back ボタン -->
                
            </div>
            </form>
             <!--現 在 の イベント -->

             <!--イベント: 既 に 登 録 されてる リスト -->
    </div>
        <!-- Event: 既 に 登 録 されてる 本 のリスト -->
    
@endsection