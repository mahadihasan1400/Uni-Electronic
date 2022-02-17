@extends('layouts.app')

@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">Appointment</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Appointment List</li>
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
                        <th>Date & Time</th>     
                        <th>Status</th>  
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Product of Interest</th>
                        <th>Date & Time</th> 
                        <th>Status</th> 
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                    @foreach($usersAppointment as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phn}}</td>
                        <td>{{$row->product}}</td>
                        <td>{{$row->created_at}}</td>
                        
                        <td>{{$row->appointment_status == 1 ? 'Active':'Inactive'}}</td>
                        <td class="text-center">

                            @if($row->appointment_status == 0)         
                                <a href="{{ route('appointment.approve' ,['id' => $row -> id]) }}" class="btn btn-primary">Approve</a>
                          
                            @endif
                            <a href="{{ route('appointment.delete' ,['id' => $row -> id]) }}" class="btn btn-danger">Cancel</a>                    

                        </td>
                   </tr>

                @endforeach
               </tbody>
            </table>
        </div>

        
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <a href="{{ route('generate.appointment.PDF') }}" class="btn btn-warning mb-4">Generate PDF</a>
        </div>
       
      </div>
</div>


<!-- Modal HTML embedded directly into document -->
<div id="ex1" class="modal">
    <p>Thanks for clicking. That felt good.</p>
    <a href="#" rel="modal:close">Close</a>
  </div>
  
  <!-- Link to open the modal -->
  <p><a href="#ex1" rel="modal:open">Open Modal</a></p>

@endsection

  