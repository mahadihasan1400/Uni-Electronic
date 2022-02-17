<?php

namespace App\Http\Controllers;

use App\Models\CompanySuperAdmin;
use App\Models\UsersAppointment;
use App\Models\CompanyUsers;
use App\Models\UsersApprovedAppointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SuperAdminController extends Controller
{
    //

    public function superAdminLogin(){

        return view('super_admin.login');
    }

    
    public function approveAppointment($id){

        $usersAppointmentByID = UsersAppointment::find($id);

        return view ('super_admin.approved_appointment',[
                    'appointmentData' => $usersAppointmentByID,
                    'LoggedUserInfo' => CompanySuperAdmin::where('id','=', session('LoggedUser'))
                                        ->first(),

        ]);
    }

    

     
    public function deleteAppointment($id){

        $usersAppointmentByID = UsersAppointment::find($id);
        $usersApprovedAppointment = UsersApprovedAppointment::find($id);

        if($usersApprovedAppointment){
            $usersApprovedAppointment -> delete();
            $usersAppointmentByID->delete();
        }else{
            $usersAppointmentByID->delete();

        }
        return redirect('appointment/list');
    }

    function saveApprovedAppointment(Request $request){ 

       

        $request->validate([
            'date_time'=>'required',
            'desc'=>'required'
            
        ]);
        $usersAppointmentByID = UsersAppointment::find($request -> user_id);
        $usersApprovedAppointment =  new UsersApprovedAppointment();
        
        $usersApprovedAppointment -> user_id = $request -> user_id;
        $usersApprovedAppointment -> date_time = $request -> date_time;
        $usersApprovedAppointment -> desc = $request -> desc;
        $value1 = $usersApprovedAppointment -> save();
        $usersAppointmentByID -> appointment_status = 1;
        $value2 = $usersAppointmentByID -> update();


        if($value1 && $value2){

            Mail::send('emails.appointment_info', ['usersApprovedAppointment' => $usersApprovedAppointment, 'usersAppointmentByID' => $usersAppointmentByID], function ($message) use ($usersAppointmentByID) {
                $message->from('uni.electronic@gmail.com', 'Uni-Electronic');
                $message->to($usersAppointmentByID->email, $usersAppointmentByID->name)->subject('Regarding Appointment Schedule');
            });

            //return "success";

            //Mail::to($request->company_email)->send(new UsersWelcomeMail());
            

            return redirect('approved/appointment/list');


            //return back()->with('success','New User has been successfuly added to database');
         }else{
             //return back()->with('fail','Something went wrong, try again later');
             return "fail";
         }




        

    }

    

    public function superAdminSignin(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
       ]);

       $superAdminInfo = CompanySuperAdmin::where('email','=', $request->email)->first();

      //echo gettype($superAdminInfo->password);
      //var_dump(Hash::check($request->password, $superAdminInfo->password));
      //die();


       if(!$superAdminInfo){
        return back()->with('fail','We do not recognize your email address');
    }else{
        //check password       
    if(Hash::check($request->password, $superAdminInfo->password)){
            $request->session()->put('LoggedUser', $superAdminInfo->id);
           
            return redirect('super/admin/dashboard');

        }else{
            return back()->with('fail','Incorrect password');
        }
    }

       
    }

    public function superAdminDataSave(){

        $superAdminData = CompanySuperAdmin::all();

        if($superAdminData->isEmpty()){
            $name = "martha";
            $email = "test@gmail.com";
            $password = "12345678";
    
            $companySuperAdmin =  new CompanySuperAdmin;
            $companySuperAdmin->name = $name;
            $companySuperAdmin->email = $email;
            $companySuperAdmin->password = Hash::make($password);
    
            $save = $companySuperAdmin->save();
    
            if($save){
               return redirect('super/admin/login');
            }else{
                return "fail";
            }
        }else{
            return redirect('super/admin/login');
        }

 }

        public function logout(){
            if(session()->has('LoggedUser')){
                session()->pull('LoggedUser');
                return redirect('/super/admin/login');
            }
        }

        public function superAdminDashboard(){
            $data = [
                    'LoggedUserInfo' => CompanySuperAdmin::where('id','=', session('LoggedUser'))
                                        ->first(),
                     'companyUsers' => CompanyUsers::all()
                    ];

                   // return $data;

            //var_dump($data);
            return view('super_admin.dashboard', $data);
        }

        

        public function appointmentList(){

            $data = [
                'LoggedUserInfo' => CompanySuperAdmin::where('id','=', session('LoggedUser'))
                                    ->first(),
                 'usersAppointment' => UsersAppointment::all()
                 
                ];
            return view('super_admin.appointment_list', $data);
        }

        public function approveAppointmentList(){

            $data = [
                'LoggedUserInfo' => CompanySuperAdmin::where('id','=', session('LoggedUser'))
                                    ->first(),
                 'usersApprovedAppointmentList' => DB::table('users_approved_appointments')
                                        ->join('users_appointments', 'users_approved_appointments.user_id', '=', 'users_appointments.id')
                                        ->select('users_approved_appointments.*', 'users_appointments.*')
                                        ->get()
     
                 
                ];
            return view('super_admin.appointment_list_approved', $data);


        }
        

}
