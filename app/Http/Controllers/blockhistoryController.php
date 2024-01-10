<?php
namespace App\Http\Controllers;
use App\CalendarHelper;
use Carbon\Carbon;
use App\Models\EnteringBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class blockhistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function history($id){
        $block = Enteringblockhistory::find($id);
        return response()->json(['success'=>'hi','result'=>$history]);
    }

    public function store(Request $request){  
        // $user = auth()->user()->id;
        // $f_name=auth()->user()->f_name;
        // $l_name=auth()->user()->l_name;
        // $full_name=$f_name.' '.$l_name;
        // $g_y = Carbon::now()->year;
        // $g_m = Carbon::now()->month;
        // $g_d = Carbon::now()->day;
        // $Calendar=new CalendarHelper();
        // $date_shamsi_array=$Calendar->gregorian_to_jalali($g_y, $g_m, $g_d);
        // $date_shamsi=$date_shamsi_array[0].'/'.$date_shamsi_array[1].'/'.$date_shamsi_array[2];
        // $mytime=Carbon::now();
        // $values = array('national_code'=> 0,'date_shamsi'=>$date_shamsi,'time_set' => $mytime,'description' =>$reason,'userblock'=>$full_name,'block'=>"این فرد بلاک شد");
        // DB::table('workflowblocks')->insert($values); 


        Enteringblockhistory::create(['requester' => $request->f_name,
            'l_name' => $request->l_name,
            'national_code' => $request->national_code,
            'company_name' => $request->company_name,
            'isBlocked' => 0,
            'reason' => $request->reason]); 
            return response()->json(['success'=>'hi','result'=>$blocks]);
        
    }
    public function set_block1($id){

        // $user = auth()->user()->id;
        // $f_name=auth()->user()->f_name;
        // $l_name=auth()->user()->l_name;
        // $full_name=$f_name.' '.$l_name;
        // $g_y = Carbon::now()->year;
        // $g_m = Carbon::now()->month;
        // $g_d = Carbon::now()->day;
        // $Calendar=new CalendarHelper();
        // $date_shamsi_array=$Calendar->gregorian_to_jalali($g_y, $g_m, $g_d);
        // $date_shamsi=$date_shamsi_array[0].'/'.$date_shamsi_array[1].'/'.$date_shamsi_array[2];
        // $mytime=Carbon::now();
        // $values = array('national_code'=> 0,'date_shamsi'=>$date_shamsi,'time_set' => $mytime,'description' =>$reason,'userblock'=>$full_name,'block'=>"این فرد بلاک شد");
        // DB::table('workflowblocks')->insert($values);

        EnteringBlock::where('id_b',$id)->update(['isBlocked'=>1]);
        return response()->json(['success'=>'hi','result'=>$id]);
    }
    public function set_free($id){
        EnteringBlock::where('id_b',$id)->update(['isBlocked'=>0]);
        return response()->json(['success'=>'hi','result'=>$id]);
    }
}
