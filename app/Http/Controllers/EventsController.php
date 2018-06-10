<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Member;
use Validator;
use Auth;
use Mail;

use App\Mail\EventsNotification;


class EventsController extends Controller
{

        // protected $eventsnotification;
        //追加
        
                // ログイン処理
        public function __construct(){
            
            // $this->middleware('auth')->except(['index']);
            $this->middleware('auth')->except(['index', 'detail']);
            
            
            // $this-> emails = $eventsnotification;
            //追加
        }
        
                
        
        
        
        // トップ画面 表示
        public function index() {
            $events = Event::orderBy('event_date', 'asc')
                        ->join('users','users.id','=','events.user_id')
                        ->select('events.*', 'users.name')
                        // ->join('events.user_id','=','users','users.id')
                        ->paginate(10);
            //並び替えてすべてのイベントを表示
            
            
            // dd($events);
            
            return view('eventstop', [
                'events' => $events,
            ]);
            
            
            
        }
        
        //新規イベント作画面
        public function eventnew() {
            return view('eventsnew');
        }
        
        //新規イベント作成処理
        public function create(Request $request){
            // dd($request);
            //バリデーション
            $validator = Validator::make($request->all(), [
                'event_name' => 'required |min:3 | max:100',
                'event_price' => 'required | min:1 | max:10',
                'email' => 'required',
                'event_date' => 'required',
                'description' => 'required |min:3 | max:2000',
                ]);
        // dd($validator);
            //バリデーション：エラー
            if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
                }
            // Eloquent モデル 
            $events = new Event;
            $events->user_id = Auth::user()->id; // 追加 のコード
            $events->event_name = $request->event_name;
            $events->event_price = $request->event_price;
            $events->event_type = $request->event_type;
            $events->event_area = $request->event_area;
            $events->event_adress = $request->event_adress;
            $events->email = $request->email;
            $events->event_date = $request->event_date;
            $events->description = $request->description;
  
            
            $file = $request->filename;
            // dd($file);
            //物理保存
            $name = $file->getClientOriginalName();
            $move = $file->move('storage', $name);

            //データベースにパスを保存
            $dataName = 'storage/'.$name;
            $events->eventpic_filename = $dataName;  
            
            $events->save(); 
            // dd($events);
            
            
            return redirect('/events');
        }
        
        //更新処理
        public function update(Request $request) {
            
            // dd($request);
                //バリデーション
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'event_name' => 'required |min:3 | max:100',
                'event_price' => 'required | min:1 | max:10',
                'email' => 'required | max:40',
                'event_date' => 'required |min:3 | max:2000',
                ]);
                
            //バリデーション： エラー
            if ($validator->fails()) {
                return redirect('/')
                ->withInput()
                ->withErrors($validator);
                }
        
            //データ 更新
            // $events = Event::find($request->id); 変更前
            // dd($events);
            $file = $request->filename;
            
            // dd($file);
            //物理保存
            //うまくいかない　画像更新しないとき
             if ($file == null){
                
                $events = Event::where('user_id',Auth::user()->id)->find($request->id);//変更後
                $events->event_name = $request->event_name;
                $events->event_price = $request->event_price;
                $events->email = $request->email;
                $events->event_date = $request->event_date;
                $events->save();
                 
             }else{
                $events = Event::where('user_id',Auth::user()->id)->find($request->id);//変更後
                $events->event_name = $request->event_name;
                $events->event_price = $request->event_price;
                $events->email = $request->email;
                $events->event_date = $request->event_date;
                
                $name = $file->getClientOriginalName();
                $move = $file->move('storage', $name);
                //データベースにパスを保存
                $dataName = 'storage/'.$name;
                $events->eventpic_filename = $dataName;  
                $events->save();
                
             }
             
            return redirect('/events');
        }
        
        // イベント管理画面
        public function store() {
            //全部表示されていたのをユーザーのみに変更
            $events = Event::where('user_id',Auth::user()->id)
            // ;dd($events);
            ->orderBy('event_date', 'desc')
            // ;dd($events);
            ->paginate(5);
            // ;dd($events);
            
            
            // return view('events', [
            //     'events' => $events,
            // ]);
            
            $attendsevents = Member::where('attenduser_id',Auth::user()->id)
                ->join('events','members.event_id', '=', 'events.id')
                ->orderBy('events.event_date', 'desc')
                ->paginate(5);
            // ;dd($attendsevents);
            //取得できているが違う
 
            
            return view('events', [
                'events' => $events,
                'attendsevents' => $attendsevents,
                
            ]);
            
        }
        
         // 更新 画面 
        public function edit(Event $events) {
            //Event $events を　$id にかえても下記があればいける
            // $events = Event::where('user_id',Auth::user()->id)->find($id);
            return view('eventsedit', [
                'event' => $events
            ]); 
        }
        
        // 複製 画面 
        public function copy(Event $events) {
    
            return view('eventscopy', [
                'event' => $events
            ]); 
        }
        
         // 複製 処理 
        public function duplicate(Request $request) {
                // dd($request);
                // dd(\Config::get('mail')); 
            //バリデーション
            $validator = Validator::make($request->all(), [
                'event_name' => 'required |min:3 | max:100',
                'event_price' => 'required | min:1 | max:10',
                'email' => 'required',
                'event_date' => 'required',
                // 'file' => 'required',
                'description' => 'required |min:3 | max:2000',
                ]);
        
            //バリデーション： エラー
            if ($validator->fails()) {
                return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
                }

            // Eloquent モデル 
        
            $events = new Event;
            $events->user_id = Auth::user()->id; // 追加 のコード
            $events->event_name = $request->event_name;
            $events->event_price = $request->event_price;
            $events->event_type = $request->event_type;
            $events->event_area = $request->event_area;
            $events->event_adress = $request->event_adress;
            $events->email = $request->email;
            $events->event_date = $request->event_date;
            $events->description = $request->description;
  
            
            $file = $request->filename;
            dd($file);
            //物理保存
            $name = $file->getClientOriginalName();
            $move = $file->move('storage', $name);

            //データベースにパスを保存
            $dataName = 'storage/'.$name;
            $events->eventpic_filename = $dataName;  
            
            $events->save(); 
            // dd($events);
            return redirect('/events');
            
        }
        
        
        // 詳細 画面 
        public function detail(Event $events) {
            // $events = Event::where('user_id',Auth::user()->id)->find($id);
            return view('eventsdetail', [
                'event' => $events
            ]); 
        }       
        
            // 削除 処 理
        public function destroy(Event $event) {
                $event->delete();
                return redirect('/events');
            }
            
            //検索機能
        public function getSearch(Request $request){
            #キーワード受け取り
              $keyword = $request->input('keyword');
             
              #クエリ生成
              $query = Event::query();
             
              #もしキーワードがあったら
              if(!empty($keyword))
              {
                $query->where('event_name','like','%'.$keyword.'%')->orWhere('description','like','%'.$keyword.'%');
              }
             
              #ページネーション
              $data = $query->orderBy('created_at','desc')->paginate(10);
              return view('eventsearch')->with('data',$data)
              ->with('keyword',$keyword)
              ->with('event','ユーザーリスト');
        }
        
        

}
