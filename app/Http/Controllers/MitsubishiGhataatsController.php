<?php
namespace App\Http\Controllers;



use App\Mitsubishi_ghataat;
use App\Mitsubishi_group_name;
use App\Mitsubishi_savabegh;
use App\Mitsubishi_type_ghataat;
use App\Querytext;
use App\User;
use App\CalendarHelper;
use Carbon\Carbon;
use App\Form;
use App\Goodstype;
use App\Grouprole;
use App\Groupuser;
use App\Request_level;
use App\Role;
use App\User_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MitsubishiGhataatsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public  function store(Request $request){
        $atp= new Mitsubishi_ghataat();
        $atp->ID_G=$request->input('ID_G');
        $atp->REAL_SOURE=$request->input('REAL_SOURE');
        $atp->SERIYAL_NUMBER=$request->input('SERIYAL_NUMBER');
        $atp->MAKER=$request->input('MAKER');
        $atp->SERIAL_NUMBER2=$request->input('SERIAL_NUMBER2');
        $atp->save();
        $n= Mitsubishi_ghataat::where('SERIYAL_NUMBER',$request->input('SERIYAL_NUMBER'))->get()->count();
        if($n>1){
            $ID_E= Mitsubishi_ghataat::where('ID_E','>',0)->orderBy('ID_E', 'desc')->first()->ID_E;
            Mitsubishi_ghataat::where('ID_E', $ID_E)->delete();
            return response()->json(['message'=> 'hi','repeat'=>1]);
        }
        return response()->json(['message'=> 'hi','ID_G'=>$request->input('ID_G'),'repeat'=>0]);
    }
    public function total()
    {
        $ID_TGS = DB::table('mitsubishi_type_ghataats')->where('ID_TG','>',0)->get()->toArray();
        $data3 = DB::table('users')->where('id','>',0)->get()->toArray();
        $data = DB::table('mitsubishi_ghataats')->where('ID_E','>',0)->orderBy('ID_E', 'DESC')->get()->toArray();
        return response()->json(['results'=> $data,'ID_TGS'=>$ID_TGS,'ID_USERS'=>$data3]);//,'ID_USERS'=>$ID_USERS
    }
    public function total_today()
    {
        $id_user = auth()->user()->id;
        $g_y = Carbon::now()->year;
        $g_m = Carbon::now()->month;
        $g_d = Carbon::now()->day;
        $Calendar=new CalendarHelper();
        $date_shamsi_array=$Calendar->gregorian_to_jalali($g_y, $g_m, $g_d);
        if($date_shamsi_array[1]<10){
            $date_shamsi_array[1]='0'.$date_shamsi_array[1];
        }
        if($date_shamsi_array[2]<10){
            $date_shamsi_array[2]='0'.$date_shamsi_array[2];
        }
        $current_date_shamsi=$date_shamsi_array[0].$date_shamsi_array[1].$date_shamsi_array[2];
        $ID_TGS = DB::table('mitsubishi_type_ghataats')->where('ID_TG','>',0)->get()->toArray();
        $data3 = DB::table('users')->where('id','>',0)->get()->toArray();
        $data = DB::table('mitsubishi_group_names')->where('ID_G','>',0)->where('ID_USER',$id_user)->where('DATE_SHAMSI','>=',$current_date_shamsi)->orderBy('ID_G', 'DESC')->get()->toArray();
        return response()->json(['results'=> $data,'ID_TGS'=>$ID_TGS,'ID_USERS'=>$data3,'current_date_shamsi'=>$g_d]);//->where('DATE_BEGIN1',$current_date_shamsi)
    }
    public function onlyone()
    {
        $id_user = auth()->user()->id;
        $ID_TGS = DB::table('mitsubishi_type_ghataats')->where('ID_TG','>',0)->get()->toArray();
        $ID_T= Mitsubishi_group_name::where('id_user',$id_user)->orderBy('ID_G', 'desc')->first()->ID_G;
        $data3 = DB::table('users')->where('id','>',0)->get()->toArray();
        $data = DB::table('mitsubishi_group_names')->where('ID_T',$ID_T)->get()->toArray();
        return response()->json(['results'=> $data,'ID_TGS'=>$ID_TGS,'ID_USERS'=>$data3]);
    }
    public function onlyone2($id)
    {
        $id_user = auth()->user()->id;
        $ID_TGS = DB::table('mitsubishi_type_ghataats')->where('ID_TG','>',0)->get()->toArray();
        $data3 = DB::table('users')->where('id','>',0)->get()->toArray();
        $data = DB::table('mitsubishi_group_names')->where('ID_G',$id)->get()->toArray();
        return response()->json(['results'=> $data,'ID_TGS'=>$ID_TGS,'ID_USERS'=>$data3]);//,'ID_USERS'=>$ID_USERS
    }
    public function delete($id){
        $n= Mitsubishi_savabegh::where('ID_E', $id)->get()->count();
        if($n==0){
            Mitsubishi_ghataat::where('ID_E', $id)->delete();
            return response()->json(['success'=>'hi','n'=>1]);
        }else{
            return response()->json(['success'=>'hi','n'=>0]);
        }
    }
    public function edit(Request $request)
    {
        $ID_E_EDIT=$request->input('ID_E_EDIT2');
        $ID_G_EDIT=$request->input('ID_G_EDIT');
        $SERIYAL_NUMBER_EDIT=$request->input('SERIYAL_NUMBER_EDIT');
        $SERIAL_NUMBER2_EDIT=$request->input('SERIAL_NUMBER2_EDIT');
        $MAKER_EDIT=$request->input('MAKER_EDIT');
        $REAL_SOURE_EDIT=$request->input('REAL_SOURE_EDIT');
        $n= Mitsubishi_ghataat::where('SERIYAL_NUMBER',$SERIYAL_NUMBER_EDIT)->where('ID_E','!=',$ID_E_EDIT)->get()->count();
        if($n>=1){
            return response()->json(['message'=> 'hi','repeat'=>1]);
        }
        Mitsubishi_ghataat::where('ID_E', $ID_E_EDIT)->update([
            'SERIYAL_NUMBER'=>$SERIYAL_NUMBER_EDIT,
            'SERIAL_NUMBER2'=>$SERIAL_NUMBER2_EDIT,
            'MAKER'=>$MAKER_EDIT,
            'REAL_SOURE'=>$REAL_SOURE_EDIT]);
        return response()->json(['success'=>'the information has successfuly saved','ID_G'=>$ID_G_EDIT,'repeat'=>0]);
    }
    public function edit2(Request $request)
    {
        $ID_G_EDIT=$request->input('ID_G_EDIT');
        if($request->input('MAKER_EDIT')!=0 and $request->input('REAL_SOURE_EDIT')!=0){
            $MAKER_EDIT=$request->input('MAKER_EDIT');
            $REAL_SOURE_EDIT=$request->input('REAL_SOURE_EDIT');
            Mitsubishi_ghataat::where('ID_G', $ID_G_EDIT)->update([
                'MAKER'=>$MAKER_EDIT,
                'REAL_SOURE'=>$REAL_SOURE_EDIT]);
        }
        if($request->input('MAKER_EDIT')!=0 and $request->input('REAL_SOURE_EDIT')==0){
            $MAKER_EDIT=$request->input('MAKER_EDIT');
            Mitsubishi_ghataat::where('ID_G', $ID_G_EDIT)->update([
                'MAKER'=>$MAKER_EDIT]);
        }
        if($request->input('MAKER_EDIT')==0 and $request->input('REAL_SOURE_EDIT')!=0){
            $REAL_SOURE_EDIT=$request->input('REAL_SOURE_EDIT');
            Mitsubishi_ghataat::where('ID_G', $ID_G_EDIT)->update([
                'REAL_SOURE'=>$REAL_SOURE_EDIT]);
        }


        return response()->json(['success'=>'the information has successfuly saved','ID_G'=>$ID_G_EDIT]);
    }
    public function convert($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $num = range(0, 9);
        $englishNumbersOnly = str_replace($persian, $num, $string);
        return $englishNumbersOnly;
    }
    public function gh_gr($id)
    {
        Mitsubishi_ghataat::where('ID_E', '>', 0)->update(['FLAG'=>0]);
        $bazsazi=array();
        $karkard=array();
        $n=0;
        $max_karkard=0;
        $data2 = DB::table('mitsubishi_sazandehs')->where('ID_S','>',0)->get()->toArray();
        $datas = DB::table('mitsubishi_ghataats')->where('ID_G',$id)->orderBy('ID_E', 'DESC')->get()->toArray();

        foreach($datas as $data){
            if(Mitsubishi_savabegh::where('ID_E', $data->ID_E)->exists()){
                $n= Mitsubishi_savabegh::where('ID_E', $data->ID_E)->where('SAV_TYPE','B')->get()->count();
                array_push($bazsazi,$n);
            }else{
                array_push($bazsazi,0);
            }
        }
        foreach($datas as $data){
            if(DB::table('mitsubishi_savabeghs')->where('ID_E', $data->ID_E)->exists()){
                $ID_MAX=DB::table('mitsubishi_savabeghs')->where('ID_E', $data->ID_E)->max('ID_S');
                $KARKARD_MAX=DB::table('mitsubishi_savabeghs')->where('ID_S', $ID_MAX)->first()->TIME_WORK;
                array_push($karkard,$KARKARD_MAX);
            }else{
                array_push($karkard,"ثبت نشده");
            }

        }
        return response()->json(['results'=> $datas,'SAZS'=> $data2,'baz'=>$bazsazi,'kar'=>$karkard]);
    }

    public function gh_ie($id)
    {
        Mitsubishi_ghataat::where('ID_E', '>', 0)->update(['FLAG'=>0]);
        $bazsazi=array();
        $karkard=array();
        $n=0;
        $max_karkard=0;
        $data2 = DB::table('mitsubishi_sazandehs')->where('ID_S','>',0)->get()->toArray();
        


        $ID_E = DB::table('mitsubishi_ghataats')->where('SERIYAL_NUMBER',$id)->first()->ID_E;
        $ID_G = DB::table('mitsubishi_ghataats')->where('SERIYAL_NUMBER',$id)->first()->ID_G;
        $GROUP_CODE = DB::table('mitsubishi_group_names')->where('ID_G',$ID_G)->first()->GROUP_CODE;
        // return response()->json(['results'=> $ID_E]);


        $datas = DB::table('mitsubishi_ghataats')->where('ID_E',$ID_E)->get()->toArray();
        
        foreach($datas as $data){
            if(Mitsubishi_savabegh::where('ID_E', $data->ID_E)->exists()){
                $n= Mitsubishi_savabegh::where('ID_E', $data->ID_E)->where('SAV_TYPE','B')->get()->count();
                array_push($bazsazi,$n);
            }else{
                array_push($bazsazi,0);
            }
        }
        foreach($datas as $data){
            if(DB::table('mitsubishi_savabeghs')->where('ID_E', $data->ID_E)->exists()){
                $ID_MAX=DB::table('mitsubishi_savabeghs')->where('ID_E', $data->ID_E)->max('ID_S');
                $KARKARD_MAX=DB::table('mitsubishi_savabeghs')->where('ID_S', $ID_MAX)->first()->TIME_WORK;
                array_push($karkard,$KARKARD_MAX);
            }else{
                array_push($karkard,"ثبت نشده");
            }

        }
        return response()->json(['results'=> $datas,'SAZS'=> $data2,'baz'=>$bazsazi,'kar'=>$karkard,'group_code'=>$GROUP_CODE]);




    }


    public function gh_gr1($id)
    {
        $bazsazi=array();
        $karkard=array();
        $n=0;
        $max_karkard=0;
        $data2 = DB::table('mitsubishi_sazandehs')->where('ID_S','>',0)->get()->toArray();
        $datas = DB::table('mitsubishi_ghataats')->where('ID_G',$id)->get()->toArray();
        return response()->json(['results'=> $datas,'SAZS'=> $data2,'baz'=>$bazsazi,'kar'=>$karkard]);
    }
    public function gh_gr2($group2,$ghataats)
    {
        
        $ghataats=explode(',', $ghataats);
        foreach($ghataats as $ghataat){
            Mitsubishi_ghataat::where('ID_E', $ghataat)->update(['ID_G'=>$group2,'FLAG'=>1]);
        }
        $data = DB::table('mitsubishi_ghataats')->where('ID_G',$group2)->orderBy('ID_E', 'DESC')->get()->toArray();
        return response()->json(['results'=>$data,'group'=> $group2]);
    }
    public function gh_gr3($group1,$ghataats)
    {
        
        $ghataats=explode(',', $ghataats);
        foreach($ghataats as $ghataat){
            Mitsubishi_ghataat::where('ID_E', $ghataat)->update(['ID_G'=>$group1,'FLAG'=>1]);
        }
        $data = DB::table('mitsubishi_ghataats')->where('ID_G',$group1)->orderBy('ID_E', 'DESC')->get()->toArray();
        return response()->json(['results'=>$data,'group'=> $group1]);
    }

}