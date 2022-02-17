<?php

namespace App\Http\Controllers;
use App\Models\CompanySuperAdmin;
use App\Models\CompanyUsers;
use App\Models\User;
use App\Models\UsersAppointment;
use App\Models\UsersApprovedAppointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;


use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {
    
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'LoggedUserInfo' => CompanySuperAdmin::where('id','=', session('LoggedUser'))
                                        ->first(),
            'date' => Carbon::now(),
            'companyUsers' => CompanyUsers::all()
        ];
          
        $pdf = PDF::loadView('PDF.myPDF', $data);
    
        return $pdf->download('uni-electronic.pdf');
    }


    public function generateAppointmentPDF()
    {
    
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'LoggedUserInfo' => CompanySuperAdmin::where('id','=', session('LoggedUser'))
                                        ->first(),
            'date' => Carbon::now(),
            'usersAppointment' => UsersAppointment::all()
        ];
          
        $pdf = PDF::loadView('PDF.appointment', $data);
    
        return $pdf->download('uni-electronic.pdf');
    }

    

    
    public function generateApprovedAppointmentPDF()
    {
    
        $data = [
            'title' => 'Welcome to UNIELECTRONIC',
            'LoggedUserInfo' => CompanySuperAdmin::where('id','=', session('LoggedUser'))
                                        ->first(),
            'date' => Carbon::now(),
            'usersApprovedAppointment' => DB::table('users_approved_appointments')
                                            ->join('users_appointments', 'users_approved_appointments.user_id', '=', 'users_appointments.id')
                                            ->select('users_approved_appointments.*', 'users_appointments.*')
                                            ->get()
        ];
          
        $pdf = PDF::loadView('PDF.approved_appointment', $data);
    
        return $pdf->download('uni-electronic.pdf');
    }

    


}
