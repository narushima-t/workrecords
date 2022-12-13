<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;
use App\Models\Day;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class RecordController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }

    public function index(){
        //インスタンスを生成
        $record = new Record();
        $day    = new Day();


        //今日の記録のデータ取得
        //復習として消費したタスクのデータ取得
        $today = date('Y-m-d');
        $id    = Auth::id();
        $days  = Day::with('record')->where('user_id', Auth::id())
                                    ->where('status', 1)
                                    ->whereDate('day', date('Y-m-d'))
                                    ->get();

        //今日新しく学習した内容のデータを取得
        $records = Record::where('user_id', $id)->where('created_at', 'like', '%' . $today . '%')->get();


        //日ごとのタスクを取得
        //今日のタスク取得
        $td_contents  = Day::with('record')->where('user_id', Auth::id())
                                            ->where('status', 0)
                                            ->whereDate('day', date('Y-m-d'))
                                            ->get();
        
        //明日のタスク取得                                    
        $tm_contents  = Day::with('record')->where('user_id', Auth::id())
                                            ->where('status', 0)
                                            ->whereDate('day', date('Y-m-d', strtotime('+1 day')))
                                            ->get();
        
        //明後日のタスク取得                                    
        $itd_contents = Day::with('record')->where('user_id', Auth::id())
                                            ->where('status', 0)
                                            ->whereDate('day', date('Y-m-d', strtotime('+2 day')))
                                            ->get();


        return view('workrecords/index', compact('td_contents', 'tm_contents', 'itd_contents', 'days', 'records'));
    }

    public function add(){
        return view('workrecords/add');
    }
    
    public function create(Request $request){
        
        //インスタンスを生成
        $Record = new Record();

        //画像ファイルの処理
        // アップロードされたファイル名を取得
        $defalt_name = $request->file('img')->getClientOriginalName();
        $file_name   = $request->user_id . '-' . $defalt_name;

        //storage/app/public/imgに取得したファイル名で画像を保存
        $request->file('img')->storeAs('public/img', $file_name); 
        
        //送信されたデータの受取
        $param = [
            'user_id'  => $request->user_id,
            'img'      => $file_name,
            'img_path' => 'storage/img' . '/' . $file_name,
            'tittle'   => $request->tittle,
            'content'  => $request->content,
        ];

        //データベースに保存
        $Record->fill($param)->save();

         //インスタンスを生成
         $Day = new Day();

         //データ取得
         $user_id   = $request->user_id;
         $record_id = Record::where('user_id', $user_id)->latest('id')->first();
         $test_day  = $request->day;
         $interval  = $request->interval;
         $count     = $request->count;
 
         //最初の復習日を算定
         $today          = date('Y-m-d');
         $first_interval = ((strtotime($test_day) - strtotime($today))/86400/6);
         $first_interval = round($first_interval,0);
         $firstday       = date('Y-m-d',strtotime("today + $first_interval day"));
         
         //データベースに保存
         Day::create([
            'record_id' => $record_id['id'],
            'user_id'   => $user_id,
            'day'       => $firstday
         ]);
         
         //2回目以降の復習日を算定
         for ($i=0; $i<$count-1; $i++){
            $reviewday  = 'reviewday' . $i+1;
            $interval   =  $interval * ($i+1);
            $$reviewday =  date('Y-m-d',strtotime("$firstday + $interval day"));
            //データベースに保存
            Day::create([
                'record_id' => $record_id['id'],
                'user_id'   => $user_id,
                'day'       => $$reviewday
            ]);
            }
            
        return redirect('index');
    }

    public function update(Request $request) {

        $record_id = $request->record_id;
        // dd($record_id);

        $task = Day::where('record_id', $record_id)->where('status', 0)->first();
  
        //モデル->カラム名 = 値 で、データを割り当てる
        $task->status = true; //true:完了、false:未完了
  
        //データベースに保存
        $task->save();

      return redirect('index');
    }
}
