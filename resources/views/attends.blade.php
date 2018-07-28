            @if (count($events) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        参加する予定イベント 一 覧
                        <a href="{{ url('events/oldattendsevent/')}}">過去の参加イベント</a>
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
                                </tr>
                            </thead>

                            <!-- テーブル 本体 -->
                            
                            <tbody>
                                @foreach ($attendsevents as $attendsevent)
                            <tr>
                                <td class="table-text">
                                    <div>
                                        @if($attendsevent->eventpic_filename)
                                            <p>
                                                <img src="{{ asset($attendsevent->eventpic_filename) }}" alt="filename" class="img-responsive" length=100 width=100>
                                            </p>
                                        @endif
                                    </div>
                                </td>
                                <!-- 本 タイトル -->
                                <td class="table-text">
                                    <div>{{ $attendsevent->event_name}}</div>
                                </td>
                                <td class="table-text">
                                    <?php
                                        $attenddate = substr("{$attendsevent->event_date}",5,5);
                                        $attendtime = substr("{$attendsevent->event_time}",0,5);
                                    ?>
                                    <div><?=$attenddate;?> <?=$attendtime;?></div>
                                    
                                </td>
                                     <!-- イベントキャンセルボタン -->
                                 <td>
                                 <form action="{{ url('/events/attend/delete/'.$attendsevent->id)}}" method="POST">
                                     {{csrf_field()}}
                                     <button type="submit" class="btn btn-primary">
                                     <i class="far fa-times-circle"></i><span class="hidden-xs">キャンセル</span></button>
                                 </form>
                                 </td>
                                 
                                <!-- 主催者問い合わせ ボタン -->
                                <td>
                                    <form action="{{ url('events/'.$attendsevent->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    
                                    <button type="submit" class="btn btn-danger">
                                        <i class="far fa-envelope"></i><span class="hidden-xs">問い合わせ</span>
                                    </button>
                                    </form>
                                </td>

                                
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    {{$attendsevents->links()}}
                                </div>
                            </div>
                    </div>
                </div>
            @endif