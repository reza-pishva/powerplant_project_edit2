<?php
namespace App\Http\Controllers;
use App\CalendarHelper;
use Carbon\Carbon;
use App\Models\EnteringBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class blockhistoryController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // public function history($id){
    //     $block = Enteringblockhistory::find($id);
    //     return response()->json(['success'=>'hi','result'=>$history]);
    // }

    // public function store(Request $request){  

    //     Enteringblockhistory::create(['requester' => $request->f_name,
    //         'l_name' => $request->l_name,
    //         'national_code' => $request->national_code,
    //         'company_name' => $request->company_name,
    //         'isBlocked' => 0,
    //         'reason' => $request->reason]); 
    //         return response()->json(['success'=>'hi','result'=>$blocks]);
        
    // }
    // public function set_block1($id){
    //     EnteringBlock::where('id_b',$id)->update(['isBlocked'=>1]);
    //     return response()->json(['success'=>'hi','result'=>$id]);
    // }
    // public function set_free($id){
    //     EnteringBlock::where('id_b',$id)->update(['isBlocked'=>0]);
    //     return response()->json(['success'=>'hi','result'=>$id]);
    // }
}
