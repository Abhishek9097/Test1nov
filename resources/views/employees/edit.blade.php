<!DOCTYPE html>
<html lang="en-US">
    <head>
        @include('common.header_link')
    </head>
    <body>
        <!-- main slider start here   -->
        @include('common.sidebar')
         <!-- main admin header start here -->
        {{-- @include('common.main_header') --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <center> <strong>{{ $message }}</strong><center>
            </div>
        @endif
        
        <div class="main-panel">
            <div class="content my-0">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Eidt Employees</h4>
                                
                                </div>
                                <form class="form-horizontal" action="{{asset('employees/update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="panel-body">
                                        <input type="hidden" name="id" value="{{$employees->id}}">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-3" for="url">{{__('First Name')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="{{__('First Name')}}" id="url" value="{{$employees->firstName}}" name="firstName" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3" for="url">{{__('Last Name')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="{{__('Last Name')}}" id="url" value="{{$employees->lastName}}" name="lastName" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3" for="url">{{__('Company')}}</label>
                                                <div class="col-sm-9">
                                                    <select class="form-group" name="company_id">
                                                        <option value="{{$employees->company_id}}" class="form-group">{{$employees->company_id}}</option>
                                                        @foreach ($company as $companies)
                                                            <option class="form-group" value="{{$companies->id}}">{{$companies->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
    
                                            <div class="form-group">
                                                <label class="col-sm-3" for="url">{{__('Email')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="{{__('Email')}}" id="url" value="{{$employees->email}}" name="email" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-sm-3" for="url">{{__('Phone')}}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" placeholder="{{__('Phoen')}}" id="url" value="{{$employees->phone}}" name="phone" class="form-control" required>
                                                </div>
                                            </div>
                                            
                                    </div>
                                    <div class="panel-footer text-right">
                                        <button class="btn btn-purple" type="submit">{{__('Save')}}</button>
                                    </div>
                                </form>
                            </div>
        
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- footer js start here -->

        @include('common.footer_link')  
    </body>
</html>
