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
                        主催する予定のイベント一覧　
                        <a href="{{ url('events/old/')}}">過去の主催イベント</a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <!-- テーブルヘッダ -->
                            <thead>
                                <tr>
                                    <th>画像</th>
                                    <th>タイトル</th>
                                    <th>開催日時</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>

                            <!-- テーブル 本体 -->
                            <tbody>
                                @foreach ($events as $event)
                            <tr>
                                <!-- 本 タイトル -->
                                <td class="table-text">
                                    <div>
                                        @if($event->eventpic_filename)
                                            <p>
                                                <img src="{{ asset($event->eventpic_filename) }}" alt="filename" class="img-responsive" length=100 width=100>
                                            </p>
                                        @endif
                                    </div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $event->event_name}}</div>
                                </td>
                                <td class="table-text">
                                    <?php
                                        $sdate = substr("{$event->event_date}",5,5);
                                        $stime = substr("{$event->event_time}",0,5);
                                         $nowdate=date('Y-m-d');
                                    ?>
                                    <div><?=$sdate;?> <?=$stime;?><?=$nowdate;?></div>

                                </td>
                                     <!-- 本: 更新 ボタン -->
                                 <td>
                                 <form action="{{ url('events/edit/'.$event->id)}}" method="POST">
                                     {{csrf_field()}}
                                     <button type="submit" class="btn btn-primary">
                                     <i class="fas fa-sync-alt"></i> <span class="hidden-xs">更新</span> </button>
                                 </form>
                                 </td>
                                 
                                <!-- 本: 削除 ボタン -->
                                <td>
                                    
                                    <form action="{{ url('events/delete/'.$event->id)}}" method="POST" onSubmit="return check()">
                                    {{csrf_field()}}
                                    <!--{{method_field('DELETE')}}-->
                                    <input type="hidden" name="life_flg" id="life_flg" value="0" > 
                                    <button type="submit" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i><span class="hidden-xs">削除</span>
                                    </button>
                                    </form>
                                </td>
                                <!-- 本: 複製 ボタン -->
                                 <td>
                                 <form action="{{ url('events/copy/'.$event->id)}}" method="POST">
                                     {{csrf_field()}}
                                     <button type="submit" class="btn btn-warning">
                                     <i class="far fa-copy"></i><span class="hidden-xs">複製</span>
                                     </button>
                                 </form>
                                 </td>
                                
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    {{$events->links()}}
                                </div>
                            </div>
                    </div>
                </div>
            @endif
            <!-- イベント: 既 に 登 録 されてる リスト -->
            <!--参加するイベント-->
            <?php 
            /* 
            
            */
            ?>
            @include('attends')
    
    </div>
        <!-- Event: 既 に 登 録 されてる 本 のリスト -->
@endsection