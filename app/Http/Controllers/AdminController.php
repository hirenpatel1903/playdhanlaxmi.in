<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\User;
use App\Model\admin;
use Dotenv\Result\Result;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Model\numberdaly;
use DB;
class AdminController extends Controller
{

    protected $admin;
    public function __construct()
    {
         $this->admin = new admin();
    }
    public function Index()
    {
        // echo Auth::user()->id; die;
        if (empty(Auth::user()->id)) {
            return view('admin.login');
        } else {
            return redirect('admin/home');
        }
    }
    //admin Login
    public function adminlogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $user_data = array(
            'email'  => $request->email,
            'password' => $request->password,
        );
        if (!Auth::attempt($user_data)) {
            return redirect()->back()->with('success', 'username and password do not match');
        }
        if (Auth::check()) {
            return redirect('admin/home');
        }
    }

    // deschbord index page
    public function Home()
    {
        return view('admin.deshbord');
    }
    // number system
    public function NumberSystem()
    {
        $table = 'games';
        $table1 = 'timeslote';
        $result['timeslote'] = $this->admin->GetallData($table1);
        $result['game'] = $this->admin->GetallData($table);
        return view('admin.numbersystem',$result);
    }
    // show game
    public function Gametype()
    {
        $table = 'games';
        $result['data'] = $this->admin->GetallData($table);
        $table = 'datetime';
        $result['datetime'] = $this->admin->GetallData($table);
        return view('admin.gametype',$result)->with('i');
    }
    //add game
    public function GameAdd(Request $request)
    {
       date_default_timezone_set('Asia/Kolkata');
        if (empty($request->id)) {
            $validator = Validator::make($request->all(), [
            'game' => 'required',
        ]);
            if ($validator->fails()) {
                return response()->json(['status'=>201,'error'=>$validator->errors()]);
            } else {
                $data = array('name'=>$request->game);
                $table = 'games';
                $result = $this->admin->insertdata($table,$data);
                if ($result==1) {
                    return response()->json(['status'=>200,'success'=>'Record Successfully Add!']);
                } else {
                    return response()->json(['status'=>200,'success'=>'Query Not Run!']);
                }
            }
        } else {
           $table = 'games';
           $data = array('name'=>$request->game);
           $result = $this->admin->UpdateItem($table,$request->id,$data);
            if ($result==1) {
                    return response()->json(['status'=>200,'success'=>'Record Successfully Update!']);
                } else {
                    return response()->json(['status'=>200,'success'=>'Query Not Run!']);
                }

        }
    }

    Public function RemoveItem($id=""){
        $table = 'games';
        $result = $this->admin->RemoveItem($table,$id);
        if($result==1){
            return response()->json(['status'=>200,'success'=>'Record Remove Successfully!']);
          } else {
            return response()->json(['status'=>200,'success'=>'Query Not Run!']);
          }
    }
    // Edite game
    public function EditeItem($id){
        $table = 'games';
        $result = $this->admin->EditeItem($table,$id);
        if(!empty($result)> 0){
            return response()->json(['status'=>200,'data'=>$result]);
        } else {
            return response()->json(['status'=>201,'error'=>"Data Not Found!"]);
        }
    }
    public function EditeDate($id){
        $table = 'datetime';
        $result = $this->admin->EditeItem($table,$id);
        if(!empty($result)> 0){
            return response()->json(['status'=>200,'data'=>$result]);
        } else {
            return response()->json(['status'=>201,'error'=>"Data Not Found!"]);
        }
    }

    public function Datetime(){
        $table = 'datetime';
        $result['data'] = $this->admin->GetallData($table);
        return view('admin.datetime',$result)->with('i');
    }

    public function DatetimeInsert(Request $request){
        $table = 'datetime';
        if (empty($request->id)) {
            $validator = Validator::make($request->all(), [
            'datetime' => 'required',
        ]);
            if ($validator->fails()) {
                return response()->json(['status'=>201,'error'=>$validator->errors()]);
            } else {

                $data = array('datetime'=>$request->datetime);
                $result = $this->admin->insertdata($table, $data);
                if ($result==1) {
                    return response()->json(['status'=>200,'success'=>'Record Successfully Add!']);
                } else {
                    return response()->json(['status'=>200,'success'=>'Query Not Run!']);
                }
            }
        } else {
            $data['datetime'] = $request->datetime;
            $result = $this->admin->UpdateItem($table,$request->id,$data);
            if ($result==1) {
                return response()->json(['status'=>200,'success'=>'Record Successfully Update!']);
            } else {
                return response()->json(['status'=>200,'success'=>'Query Not Run!']);
            }
        }
    }

    //remove date time
    Public function RemoveDatetime($id=""){
        $table = 'dalygame';
        $result = $this->admin->RemoveItem($table,$id);
        if($result==1){
            return response()->json(['status'=>200,'success'=>'Record Remove Successfully!']);
          } else {
            return response()->json(['status'=>200,'success'=>'Query Not Run!']);
          }
    }
    Public function RemoveDate($id=""){
        $table = 'datetime';
        $result = $this->admin->RemoveItem($table,$id);
        if($result==1){
            return response()->json(['status'=>200,'success'=>'Record Remove Successfully!']);
          } else {
            return response()->json(['status'=>200,'success'=>'Query Not Run!']);
          }
    }

    //Edite date time
    public function EditeDatetime($id){
        $table = 'datetime';
        $result = $this->admin->EditeItem($table,$id);
        if(!empty($result)> 0){
            return response()->json(['status'=>200,'data'=>$result]);
        } else {
            return response()->json(['status'=>201,'error'=>"Data Not Found!"]);
        }
    }

    //get no
    public function GetNo(Request $request){
        $digits = 2;
        $power = array_sum($request->info);
        $data = rand(pow($power, $digits-1), pow(10, $digits)-1);
        return response()->json(['status'=>200,'number'=>$data]);
    }

    public function savegame(Request $request){
          $validator = Validator::make($request->all(), [
            'number' => 'required',
            'game' => 'required',
            'datetime' => 'required',
            'amount' => 'required',
          ]);
            if ($validator->fails()) {
                return response()->json(['status'=>201,'error'=>$validator->errors()]);
            } else {
             $table = 'dalygame';
                date_default_timezone_set('Asia/Kolkata');
                $times = date('h:i:A', strtotime($request->datetime));
                $dates = date('Y-M-d', strtotime($request->datetime));
             $data = array('name'=>$request->name,'mobile'=>$request->mobile,'number'=>$request->number,'game'=>$request->game,'datetime'=>$request->datetime,'amount'=>$request->amount,'times'=>$times,'dates'=>$dates);
             $result = $this->admin->insertdata($table,$data);
             if($result==1){
                return response()->json(['status'=>200,'success'=>'Game Successfully! Done']);
             } else {
                return response()->json(['status'=>201,'success'=>'Query Not Run!']);
             }
            }
    }

    public function TudayGameList(){
        $table = 'dalygame';
        $result['dalygame'] = $this->admin->GetallData($table);
        return view('admin.dalygame',$result)->with('i');
    }

    public function dalygameresult(){
    $table = 'games';
    $result['games'] = $this->admin->GetallData($table);
        return view('admin.dalyresult',$result);
    }

    public function addnumber(){

       if (!empty(Session::get('mynumber1')) && !empty(Session::get('mynumber2')) && !empty(Session::get('mynumber3')) && !empty(Session::get('mynumber4'))) {
           date_default_timezone_set("Asia/Kolkata");
           $data = new numberdaly();
           $data->number = Session::get('mynumber1');
           $data->number1 = Session::get('mynumber2');
           $data->number2 = Session::get('mynumber3');
           $data->number3 = Session::get('mynumber4');
           $data->datetime = date("d/m/Y");
           $data->time = date("h:i");
           if ($data->save()) {
               DB::table('dalygame')->where('status', 0)->update(['status'=>'1']);
               // Value::where('project_id', $id)->update(['data'=>$data]);
               //     $numbers = numberdaly::where('status',0)();
               //     $numbers->status = "1";
               //     $numbers->save();
               session()->forget('mynumber1');
               session()->forget('mynumber2');
               session()->forget('mynumber3');
               session()->forget('mynumber4');
               return response()->json(['status'=>200,'success'=>'save Number']);
           } else {
               return response()->json(['status'=>200,'success'=>'Query Not Run!']);
           }
       }
    }

    public function changenumber(Request $request){
        Session::put('mynumber1',$request->game.$request->number);
        return redirect()->back()->with('success', 'Change Number Successfully!');
    }

    public function changenumber1(Request $request){
        Session::put('mynumber2',$request->game.$request->number);
        return redirect()->back()->with('success', 'Change Number Successfully!');
    }

    public function changenumber2(Request $request){
        Session::put('mynumber3',$request->game.$request->number);
        return redirect()->back()->with('success', 'Change Number Successfully!');
    }
    public function changenumber3(Request $request){
        Session::put('mynumber4',$request->game.$request->number);
        return redirect()->back()->with('success', 'Change Number Successfully!');
    }

    public function dalygameresultlist(){
        $table = "numberdaly";
        $result['dalygameresultlist'] = $this->admin->GetallData($table);
        return view('admin.dalygameresultlist',$result)->with('i');
    }
    public function LogOut(){
        Session::flush();
        return redirect()->to('admin');
    }

    public function slote(){
        $table = "timeslote";
        $result['timeslot'] = $this->admin->GetallData($table);
        return view('admin.timeslot',$result)->with('i');
    }

    public function timeslode(Request $request){
        $table = 'timeslote';
        if (empty($request->id)) {
            $validator = Validator::make($request->all(), [
            'times' => 'required',
          ]);
            if ($validator->fails()) {
                return response()->json(['status'=>201,'error'=>$validator->errors()]);
            } else {

                $data['times'] = $request->times;
                $result = $this->admin->insertdata($table, $data);
                if ($result==1) {
                    return response()->json(['status'=>200,'success'=>'Time Slot Successfully! Done']);
                } else {
                    return response()->json(['status'=>201,'success'=>'Query Not Run!']);
                }
            }
           } else {
            $data['times'] = $request->times;
            $result = $this->admin->UpdateItem($table,$request->id,$data);
            if ($result==1) {
                    return response()->json(['status'=>200,'success'=>'Record Successfully Update!']);
                } else {
                    return response()->json(['status'=>200,'success'=>'Query Not Run!']);
                }
        }
    }

    public function Removetimeslode($id=""){
        $table = 'timeslote';
        $result = $this->admin->RemoveItem($table,$id);
        if($result==1){
            return response()->json(['status'=>200,'success'=>'Record Remove Successfully!']);
          } else {
            return response()->json(['status'=>200,'success'=>'Query Not Run!']);
          }
    }

    public function edittimeslote($id=""){
        $table = 'timeslote';
        $result = $this->admin->EditeItem($table,$id);
        if(!empty($result)> 0){
            return response()->json(['status'=>200,'data'=>$result]);
        } else {
            return response()->json(['status'=>201,'error'=>"Data Not Found!"]);
        }
    }

    public function sessionclear(){
        session()->forget('mynumber1');
        session()->forget('mynumber2');
        session()->forget('mynumber3');
        session()->forget('mynumber4');
    }

}
