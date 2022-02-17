@extends('layouts.app')
                
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
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
                        <th>Employee Name</th>
                        <th>Email</th>
                        <th>Company Name</th>
                        <th>Date & Time</th>     
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Employee Name</th>
                        <th>Email</th>
                        <th>Company Name</th>
                        <th>Date & Time</th> 
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                    @foreach($companyUsers as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->company_email}}</td>
                        <td>{{$row->company_name}}</td>
                        <td>{{$row->created_at}}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary">View</button>
                            <button type="button" class="btn btn-success">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </td>
                   </tr>

                @endforeach
               </tbody>
            </table>
        </div>

        
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <a href="{{ route('generate.PDF') }}" class="btn btn-warning mb-4">Generate PDF</a>
        </div>
       
      </div>
</div>

@endsection
                