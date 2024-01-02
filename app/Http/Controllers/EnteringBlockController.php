<?php
namespace App\Http\Controllers;
use App\Models\EnteringBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnteringBlockController extends Controller
{
    public function blocks(){
        $blocks = EnteringBlock::all();
        return $blocks;
    }
    public function block($id){
        $block = EnteringBlock::find($id);
        return $block;
    }
    public function remove($id){
        $result = EnteringBlock::find($id)->delete();     
    }
    public function update(Request $request,$id){
        $block = EnteringBlock::find($id);
        $block->update(['f_name' => $request->f_name,
        'l_name' => $request->l_name,
        'national_code' => $request->national_code,
        'company_name' => $request->company_name,
        'isBlocked' => $request->isBlocked,
        'reason' => $request->reason]);
         return $block;  
    }
    public function store(Request $request){        
        EnteringBlock::create(['f_name' => $request->f_name,
                          'l_name' => $request->l_name,
                          'national_code' => $request->national_code,
                          'company_name' => $request->company_name,
                          'isBlocked' => 0,
                          'reason' => $request->reason]); 
                          $blocks = EnteringBlock::all();
                          return response()->json(['success'=>'hi','result'=>$blocks]);
    }
    public function set_block($id){
        $block = EnteringBlock::find($id);
        $block->update(['isBlocked' => 1]);
         return $block;  
    }
    public function set_free($id){
        $block = EnteringBlock::find($id);
        $block->update(['isBlocked' => 0]);
         return $block;  
    }
}
