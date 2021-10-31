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
                                    <h4 class="card-title">Eidt Company</h4>
                                
                                </div>
                                <form class="form-horizontal" action="{{asset('company/update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="panel-body">
                                        <input type="hidden" name="id" value="{{$Company->id}}">
                                        <div class="form-group">
                                            <label class="col-sm-3" for="url">{{__('Name')}}</label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="{{__('Name')}}" id="url" name="name" class="form-control" value="{{$Company->name}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3" for="url">{{__('Email')}}</label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="{{__('Email')}}" id="url" name="email" value="{{$Company->email}}" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-sm-3" for="url">{{__('Website')}}</label>
                                            <div class="col-sm-9">
                                                <input type="text" placeholder="{{__('Website')}}" id="url" name="website" value="{{$Company->website}}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3">{{__('Logo')}}</label>
                                            
                                        </div>
                                        
                                        <strong class="text-danger">(200px * 200px)</strong>
                                        
        
                                        <img src="{{asset('../storage/app/public/'.$Company->logo)}}" class="img-responsive" style="width:200px">
                                        <input type="hidden" name="logo" class="form-control" value="{{ $Company->logo }}">
                                        <input type="file" name="logo" class="form-control">
                                            
                                        
                                        
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
