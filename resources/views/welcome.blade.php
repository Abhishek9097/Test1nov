<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="content">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <center><h2 class="mb-4">Test</h2></center>
                <form>
                    <div class="form-group mb-3">
                        <select  id="state-dd" class="form-control">
                            <option value="">Select Country</option>
                            @foreach ($state as $data)
                            <option value="{{$data->id}}">
                                {{$data->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <select id="city-dd" class="form-control">
                        </select>
                    </div>
                    
                </form>

                <a href="{{url('state-record')}}"><button>Show Datatable</button></a>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#state-dd').on('change', function () {
                var idState = this.value;
                alert(idState);
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="">Select City</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                                
                        });
                        $('#city-dd').on('change', function () {
                            var id= $(this).val();
                            alert(id);
                        });    
                        
                    }
                });
            });
            
            
        });

    </script>
</body>

</html>