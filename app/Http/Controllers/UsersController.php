<?php

namespace App\Http\Controllers;

use App\Mail\UsersWelcomeMail;
use Illuminate\Http\Request;
use App\Models\CompanyUsers;
use App\Models\UsersAppointment;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function login(){
        return view('users.login');
    }

    

    public function usersAppointment(){
        return view('users.appointment');
    }

    function saveAppointment(Request $request){


        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phn'=>'required',
            'product'=>'required',
           
            
        ]);

       

       

        $usersAppointment = new UsersAppointment;

        $usersAppointment->name = $request->name;
        $usersAppointment->email = $request->email;
        $usersAppointment->phn = $request->phn;
        $usersAppointment->product = $request->product;
        


        $save = $usersAppointment->save();

        if($save){

            Mail::send('emails.appointment', ['appointmentData' => $usersAppointment], function ($message) use ($usersAppointment) {
                $message->from('uni.electronic@gmail.com', 'Uni-Electronic');
                $message->to($usersAppointment->email, $usersAppointment->name)->subject('Regarding Appointment');
            });

            return "Appoint Request Submited Successfully";

            //Mail::to($request->company_email)->send(new UsersWelcomeMail());
            

            


            //return back()->with('success','New User has been successfuly added to database');
         }else{
             //return back()->with('fail','Something went wrong, try again later');
             return "fail";
         }

       
    }








    


     function save(Request $request){


        $request->validate([
            'company_name'=>'required',
            'name'=>'required',
            'company_email'=>'required|email|unique:company_users'
            
        ]);

        $spokeLink = "https://hubs.mozilla.com/mtqxfJG/quiet-spry-convention";

        $companyUsers = new CompanyUsers;

        $companyUsers->company_name = $request->company_name;
        $companyUsers->name = $request->name;
        $companyUsers->company_email = $request->company_email;


        $save = $companyUsers->save();

        if($save){

            Mail::send('emails.userwelcome', ['user' => $companyUsers, 'spokeLink' => $spokeLink], function ($message) use ($companyUsers) {
                $message->from('uni.electronic@gmail.com', 'Uni-Electronic');
                $message->to($companyUsers->company_email, $companyUsers->company_name)->subject('Welcome to digital trade fair');
            });

            //return "success";

            //Mail::to($request->company_email)->send(new UsersWelcomeMail());
            

            return redirect()->to($spokeLink);


            //return back()->with('success','New User has been successfuly added to database');
         }else{
             //return back()->with('fail','Something went wrong, try again later');
             return "fail";
         }

       
    }

    
}
