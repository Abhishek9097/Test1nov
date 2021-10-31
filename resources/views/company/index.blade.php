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
                                    <h4 class="card-title">Company List</h4>
                                    
                                
                                </div>
                                <a href="{{route('company.create')}}"><button class="btn btn-small btn-info" style="margin-left: 18px;">Add Company</button></a>
                                <div class="user_registerlist">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-12 offset-lg-1 offset-md-1" style="margin-left: 0%">
                                                <div class="table-responsive">
                                                    <table id="userList" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No.</th>
                                                                <th>Name</th>
                                                                <th>Email</th>
                                                                <th>Logo</th>
                                                                <th>Website</th>
                                                                
                                                                <th>Action</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $count = 1; ?>
                                                            @foreach($CompanyList as $value)
                                                            <tr>
                                                                <th>{{$count}}</th>
                                                                <th>{{$value->name}}</th>
                                                                <th>{{$value->email}}</th>
                                                                <th><img src="{{'../storage/app/public/'.$value->logo}}" height="100px;"></th>
                                                                <th>{{$value->website}}</th>
                                                                <th><a href="{{ URL::to('company/' . $value->id . '/edit') }}"><button class="btn btn-small btn-info">Edit</button></a><a href="{{asset('company/delete/'.$value->id)}}"><button class="btn btn-warning">Delete</button></a></th>
                                                            </tr>
                                                            <?php $count++; ?>
                                                            @endforeach
                                                        </tbody>
                                                        
                                                </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
