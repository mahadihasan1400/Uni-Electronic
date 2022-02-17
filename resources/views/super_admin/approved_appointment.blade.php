@extends('layouts.app')

@section('content')

<div class="container">
                        <div class="row justify-content-center" style="margin-top: 100px; margin-left: 0px; margin-right: 0px; margin-bottom: 0px;">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Appointment Approvel</h3></div>
                                    <div class="card-body">

                                        <form method="post" action = {{ route('approved.appointment.save') }}>


                                            {{-- @if(Session::get('success'))
                                                <div class="alert alert-success">
                                                    {{ Session::get('success') }}
                                                </div>
                                         @endif
                                            @if(Session::get('fail'))
                                                <div class="alert alert-danger">
                                                    {{ Session::get('fail') }}
                                                </div>
                                            @endif --}}
                                            
                                            @csrf
                                     
                                             <div class="form-floating mb-3">
                                                <input class="form-control"  name="date_time" type="datetime-local" value="{{ old('date_time') }}" />
                                                <label for="name">Date & Time</label>
                                                <span class="text-danger">@error('date_time'){{ $message }} @enderror</span>
                            <input type="hidden" name="user_id" value="{{ $appointmentData->id }}">
                                            </div>
                                            
                                            

                                            <div class="form-floating mb-3">
                                                <textarea name = "desc" class="form-control" rows = "5" cols = "20" value="{{ old('date_time') }}"> </textarea>
                                                
                                                <label for="desc">Information</label>
                                                <span class="text-danger">@error('desc'){{ $message }} @enderror</span>
                    
                                            </div>
           
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                                                
                                                <button class="btn btn-primary"  type="submit">submit</button>
                                            </div>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

  