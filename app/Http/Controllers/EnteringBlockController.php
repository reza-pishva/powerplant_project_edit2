<?php
namespace App\Http\Controllers;
use App\Models\EnteringBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnteringBlockController extends Controller
{
    public function blocks(){
        $blocks = EnteringBlock::all();
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
    public function set_block1($id){
        EnteringBlock::where('id_b',$id)->update(['isBlocked'=>1]);
        return response()->json(['success'=>'hi','result'=>$id]);
    }
    public function set_free($id){
        EnteringBlock::where('id_b',$id)->update(['isBlocked'=>0]);
        return response()->json(['success'=>'hi','result'=>$id]);
    }
}
