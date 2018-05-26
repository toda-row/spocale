            @if (count($events) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        参加するイベント 一 覧　（古いものを消して、現在以降のイベント）
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
                                        $attendseventshort = substr("{$attendsevent->event_date}",6,10);
                                    ?>
                                    <div><?=$attendseventshort;?></div>
                                </td>
                                     <!-- 本: 更新 ボタン -->
                                 <td>
                                 <form action="{{ url('events/edit/'.$attendsevent->id)}}" method="POST">
                                     {{csrf_field()}}
                                     <button type="submit" class="btn btn-primary">
                                     <i class="fa fa-close glyphicon glyphicon-refresh"></i><span class="hidden-xs">キャンセル</span></button>
                                 </form>
                                 </td>
                                 
                                <!-- 本: 削除 ボタン -->
                                <td>
                                    <form action="{{ url('events/'.$attendsevent->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-envelope-o glyphicon glyphicon-trash"></i><span class="hidden-xs">問い合わせ</span>
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