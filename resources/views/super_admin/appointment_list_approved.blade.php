@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Appointment</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Approved Appointment List</li>
    </ol>
   
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Product of Interest</th>
                        <th>Appointment Date & Time</th> 
                        <th>Details</th>     
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Product of Interest</th>
                        <th>Appointment Date & Time</th> 
                        <th>Details</th>
                        
                    </tr>
                </tfoot>
                <tbody>

                    @foreach($usersApprovedAppointmentList as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phn}}</td>
                        <td>{{$row->product}}</td>
                        <td>{{$row->date_time}}</td>
                        <td>{{$row->desc}}</td>
                   </tr>
                @endforeach
               </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <a href="{{ route('generate.approved.appointment.PDF') }}" class="btn btn-warning mb-4">Generate PDF</a>

        </div>
       
      </div>
</div>

@endsection

  