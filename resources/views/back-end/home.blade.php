@extends('back-end.master')

@section('title')
  <title>Ami Coding Pari Na</title>
@endsection

@section('css')
  
  <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection


@section('bread_crumb')
	<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0  text-center">Khoj The Search</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Khoj The Search</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
@endsection


@section('content')

        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
                <div class="card-body">
                 <form id="post-form" method="post">
                     
                     <div class="row">
                        <div class="col-md-12">
                           <div class="alert alert-success d-none" id="msg_div">
                                   <span id="res_message"></span>
                              </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Input Values<span class="text-danger">*</span></label>
                              <input type="text" name="input_values" placeholder="Enter Input Values" class="form-control">
                              <span class="text-danger p-1">{{ $errors->first('input_values') }}</span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Search Values<span class="text-danger">*</span></label>
                              <input type="text" name="search_values" placeholder="Enter Search Values" class="form-control">
                              
                              <span class="badge badge-danger">{{ $errors->first('search_values') }}</span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <button type="submit" id="send_form" class="btn btn-block btn-success">Submit</button>
                        </div>   
                     </div>
                  </form>
                  
                </div>
            </div>
            
        </div>
      </div>

@endsection

@section('scripts')
<!-- jquery validation cdn -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
   if ($("#post-form").length > 0) {
    //input_values validation which includes only number separated with comma
    $.validator.addMethod("regex", function(value, element) {
            return this.optional(element) || /^[0-9,]+$/i.test(value);
        }, "Number is invalid: Please enter a number with comma whitespace not allowed.");

    $("#post-form").validate({
     // other validation rules for the input fields 
    rules: {
      input_values: {
        required: true,
        regex: "Required number"
      },
      search_values: {
        required: true,
        digits: true
      }
    },
    //this message will appear when validation error occurs
    messages: {
      input_values: {
        required: "Please Enter Input Values",
      },
      search_values: {
        required: "Please Enter Search Values",
      },
    },
    submitHandler: function(form) {
      // this set up is for handling csrf token
      $.ajaxSetup({
            headers: {'X-CSRF-Token': '{{ csrf_token() }}'}
        });

        var adminUrl = '{{ url('khojthesearch') }}';
      //get all input fields value from the form
        function getInputs() {
            var input_values = $('input[name="input_values"]').val()
            var search_values = $('input[name="search_values"]').val()
            return {input_values: input_values, search_values: search_values}
        }
      // sending the request to the route then call the controller for further action
            $.ajax({
                method: 'POST',
                url: adminUrl + '/find',
                data: getInputs(),
                dataType: 'JSON',
                success: function () {
                


                },
                // give feedback when error occurs
               error: function (error) {
                    console.log(error);
                }
            })

      }
  })
}
</script>

@endsection