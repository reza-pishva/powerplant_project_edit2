<?php
namespace App\Http\Controllers;
use App\CalendarHelper;
use Carbon\Carbon;

use App\Models\EnteringBlock;
use App\Models\Enteringblockhistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnteringBlockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function blocks(){
        $blocks = EnteringBlock::where('id_b','>', 0)->orderBy('id_b', 'DESC')->get();
        return response()->json(['success'=>'hi','result'=>$blocks]);
    }
    public function block($id){
        $block = EnteringBlock::find($id);
        return $block;
    }
    public function remove1($id){
        EnteringBlock::where('id_b', $id)->delete();
        return response()->json(['success'=>'hi','result'=>$id]);
    }
    public function update(Request $request){
        
        // if($n==0){
            $id_b_e=$request->id_b_e;
            EnteringBlock::where('id_b',$id_b_e)->update(['f_name' => $request->f_name_e,
            'l_name' => $request->l_name_e,
            'national_code' => $request->national_code_e,
            'company_name' => $request->company_name_e,
            'reason' => $request->reason_e]);
            $n= EnteringBlock::where('national_code',$request->input('national_code_e'))->get()->count();  
            if($n==1){
               return response()->json(['success'=>'hi','result2'=> $id_b_e]);
            }else{
               return response()->json(['success'=>'hi','result'=>$n]);
            }

    }
    public function store(Request $request){   
       
        $n= EnteringBlock::where('national_code',$request->input('national_code'))->get()->count();  
        if($n==0){
            EnteringBlock::create(['f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'national_code' => $request->national_code,
            'company_name' => $request->company_name,
            'isBlocked' => 0,
            'reason' => $request->reason]); 
            $blocks = EnteringBlock::all();
            return response()->json(['success'=>'hi','result'=>$blocks]);
        }else{
            return response()->json(['success'=>'hi','result'=>$n]);
        }
        
    }
    public function set_block1($id,$reason){

        $user = auth()->user()->id;
        $f_name=auth()->user()->f_name;
        $l_name=auth()->user()->l_name;
        $full_name=$f_name.' '.$l_name;
        $g_y = Carbon::now()->year;
        $g_m = Carbon::now()->month;
        $g_d = Carbon::now()->day;
        $Calendar=new CalendarHelper();
        $date_shamsi_array=$Calendar->gregorian_to_jalali($g_y, $g_m, $g_d);
        $date_shamsi=$date_shamsi_array[0].'/'.$date_shamsi_array[1].'/'.$date_shamsi_array[2];
        $mytime=Carbon::now();

        $values = array('requester' =>$full_name,'date_shamsi' =>$date_shamsi,'reason' => $reason,'time' =>$mytime, 'id_b' => $id);
        DB::table('enteringblockhistories')->insert($values);

        EnteringBlock::where('id_b',$id)->update(['isBlocked'=>1]);
        return response()->json(['success'=>'hi','result'=>$reason]);
    }
    public function set_free($id){

        $user = auth()->user()->id;
        $f_name=auth()->user()->f_name;
        $l_name=auth()->user()->l_name;
        $full_name=$f_name.' '.$l_name;
        $g_y = Carbon::now()->year;
        $g_m = Carbon::now()->month;
        $g_d = Carbon::now()->day;
        $Calendar=new CalendarHelper();
        $date_shamsi_array=$Calendar->gregorian_to_jalali($g_y, $g_m, $g_d);
        $date_shamsi=$date_shamsi_array[0].'/'.$date_shamsi_array[1].'/'.$date_shamsi_array[2];
        $mytime=Carbon::now();

        $values = array('requester' =>$full_name,'date_shamsi' =>$date_shamsi,'reason'=>'مجوز ورود داده شد','time' =>$mytime, 'id_b' => $id);
        DB::table('enteringblockhistories')->insert($values);

        EnteringBlock::where('id_b',$id)->update(['isBlocked'=>0]);
        return response()->json(['success'=>'hi','result'=>$id]);
    }
    public function block_history($id){
        $history = Enteringblockhistory::where('id_b',$id)->get();
        return response()->json(['success'=>'hi','result'=>$history]);
    }
}
