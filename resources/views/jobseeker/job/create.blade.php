
@extends('layouts.app-jobseeker')
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Form</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Basic</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        January 2018
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Export List</a>
                        <a class="dropdown-item" href="#">Policies</a>
                        <a class="dropdown-item" href="#">View Assets</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Default Basic Forms Start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Apply Job</h4>
                {{-- <p class="mb-30">All bootstrap element classies</p> --}}
            </div>
            {{-- <div class="pull-right">
                <a href="#basic-form1" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
            </div> --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form id="job" action="{{route('jobseeker.application')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$id}}"/>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label"> Headline</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" type="text" name="heading" placeholder="Heading" required/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Cover Letter</label>
                <div class="col-sm-12 col-md-10">
                    
                    <textarea  class="form-control" name="coverletter" required></textarea>
                </div>
            </div>
           
            
            <button type="submit" class="btn btn-info">Submit</button>
   

            {{-- <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="bootstrap@example.com" type="email">
                </div>
            </div> --}}
            {{-- <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">URL</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="https://getbootstrap.com" type="url">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="1-(111)-111-1111" type="tel">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="password" type="password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Number</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="100" type="number">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Date and time</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control datetimepicker" placeholder="Choose Date anf time" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Date</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control date-picker" placeholder="Select Date" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Month</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control month-picker" placeholder="Select Month" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Time</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control time-picker" placeholder="Select time" type="text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Select</label>
                <div class="col-sm-12 col-md-10">
                    <select class="custom-select col-12">
                        <option selected="">Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Color</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="#563d7c" type="color">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Input Range</label>
                <div class="col-sm-12 col-md-10">
                    <input class="form-control" value="50" type="range">
                </div>
            </div>
        </form>
        <div class="collapse collapse-box" id="basic-form1" >
            <div class="code-box">
                <div class="clearfix">
                    <a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#copy-pre"><i class="fa fa-clipboard"></i> Copy Code</a>
                    <a href="#basic-form1" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
                </div>
                <pre><code class="xml copy-pre" id="copy-pre">
<form>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">Text</label>
<div class="col-sm-12 col-md-10">
<input class="form-control" type="text" placeholder="Johnny Brown">
</div>
</div>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">Search</label>
<div class="col-sm-12 col-md-10">
<input class="form-control" placeholder="Search Here" type="search">
</div>
</div>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">Email</label>
<div class="col-sm-12 col-md-10">
<input class="form-control" value="bootstrap@example.com" type="email">
</div>
</div>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">URL</label>
<div class="col-sm-12 col-md-10">
<input class="form-control" value="https://getbootstrap.com" type="url">
</div>
</div>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">Telephone</label>
<div class="col-sm-12 col-md-10">
<input class="form-control" value="1-(111)-111-1111" type="tel">
</div>
</div>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">Password</label>
<div class="col-sm-12 col-md-10">
<input class="form-control" value="password" type="password">
</div>
</div>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">Number</label>
<div class="col-sm-12 col-md-10">
<input class="form-control" value="100" type="number">
</div>
</div>
<div class="form-group row">
<label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Date and time</label>
<div class="col-sm-12 col-md-10">
<input class="form-control datetimepicker" placeholder="Choose Date anf time" type="text">
</div>
</div>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">Date</label>
<div class="col-sm-12 col-md-10">
<input class="form-control date-picker" placeholder="Select Date" type="text">
</div>
</div>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">Month</label>
<div class="col-sm-12 col-md-10">
<input class="form-control month-picker" placeholder="Select Month" type="text">
</div>
</div>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">Time</label>
<div class="col-sm-12 col-md-10">
<input class="form-control time-picker" placeholder="Select time" type="text">
</div>
</div>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">Select</label>
<div class="col-sm-12 col-md-10">
<select class="custom-select col-12">
    <option selected="">Choose...</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
</select>
</div>
</div>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">Color</label>
<div class="col-sm-12 col-md-10">
<input class="form-control" value="#563d7c" type="color">
</div>
</div>
<div class="form-group row">
<label class="col-sm-12 col-md-2 col-form-label">Input Range</label>
<div class="col-sm-12 col-md-10">
<input class="form-control" value="50" type="range">
</div>
</div> --}}
</form>
                </code></pre>
            </div>
        </div>
    </div>
    <!-- Default Basic Forms End -->

    <!-- horizontal Basic Forms Start -->

    <!-- horizontal Basic Forms End -->

    <!-- Form grid Start -->
    
    <!-- Form grid End -->

    <!-- Input Validation Start -->
    {{-- <div class="pd-20 card-box mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue h4">Input Validation</h4>
                <p class="mb-30">Validation styles for error, warning, and success</p>
            </div>
            <div class="pull-right">
                <a href="#input-validation-form" class="btn btn-primary btn-sm scroll-click" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
            </div>
        </div> --}}
        {{-- <form>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group has-success">
                        <label class="form-control-label">Input with success</label>
                        <input type="text" class="form-control form-control-success">
                        <div class="form-control-feedback">Success! You've done it.</div>
                        <small class="form-text text-muted">Example help text that remains unchanged.</small>
                    </div>
                    <div class="form-group has-warning">
                        <label class="form-control-label">Input with warning</label>
                        <input type="text" class="form-control form-control-warning">
                        <div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
                        <small class="form-text text-muted">Example help text that remains unchanged.</small>
                    </div>
                    <div class="form-group has-danger">
                        <label class="form-control-label">Input with danger</label>
                        <input type="text" class="form-control form-control-danger">
                        <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                        <small class="form-text text-muted">Example help text that remains unchanged.</small>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group has-success row">
                        <label class="form-control-label col-sm-12 col-md-3 col-form-label">Input with success</label>
                        <div class="col-sm-12 col-md-9">
                            <input type="text" class="form-control form-control-success">
                            <div class="form-control-feedback">Success! You've done it.</div>
                            <small class="form-text text-muted">Example help text that remains unchanged.</small>
                        </div>
                    </div>
                    <div class="form-group has-warning row">
                        <label class="form-control-label col-sm-12 col-md-3 col-form-label">Input with warning</label>
                        <div class="col-sm-12 col-md-9">
                            <input type="text" class="form-control form-control-warning">
                            <div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
                            <small class="form-text text-muted">Example help text that remains unchanged.</small>
                        </div>
                    </div>
                    <div class="form-group has-danger row">
                        <label class="form-control-label col-sm-12 col-md-3 col-form-label">Input with danger</label>
                        <div class="col-sm-12 col-md-9">
                            <input type="text" class="form-control form-control-danger">
                            <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                            <small class="form-text text-muted">Example help text that remains unchanged.</small>
                        </div>
                    </div>
                </div>
            </div>
        </form> --}}
        {{-- <div class="collapse collapse-box" id="input-validation-form" >
            <div class="code-box">
                <div class="clearfix">
                    <a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#input-validation"><i class="fa fa-clipboard"></i> Copy Code</a>
                    <a href="#input-validation-form" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
                </div>
                <pre><code class="xml copy-pre" id="input-validation">
<form>
<div class="row">
<div class="col-md-6 col-sm-12">
<div class="form-group has-success">
    <label class="form-control-label">Input with success</label>
    <input type="text" class="form-control form-control-success">
    <div class="form-control-feedback">Success! You've done it.</div>
    <small class="form-text text-muted">Example help text that remains unchanged.</small>
</div>
<div class="form-group has-warning">
    <label class="form-control-label">Input with warning</label>
    <input type="text" class="form-control form-control-warning">
    <div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
    <small class="form-text text-muted">Example help text that remains unchanged.</small>
</div>
<div class="form-group has-danger">
    <label class="form-control-label">Input with danger</label>
    <input type="text" class="form-control form-control-danger">
    <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
    <small class="form-text text-muted">Example help text that remains unchanged.</small>
</div>
</div>
<div class="col-md-6 col-sm-12">
<div class="form-group has-success row">
    <label class="form-control-label col-sm-12 col-md-2 col-form-label">Input with success</label>
    <div class="col-sm-12 col-md-10">
        <input type="text" class="form-control form-control-success">
        <div class="form-control-feedback">Success! You've done it.</div>
        <small class="form-text text-muted">Example help text that remains unchanged.</small>
    </div>
</div>
<div class="form-group has-warning row">
    <label class="form-control-label col-sm-12 col-md-2 col-form-label">Input with warning</label>
    <div class="col-sm-12 col-md-10">
        <input type="text" class="form-control form-control-warning">
        <div class="form-control-feedback">Shucks, check the formatting of that and try again.</div>
        <small class="form-text text-muted">Example help text that remains unchanged.</small>
    </div>
</div>
<div class="form-group has-danger row">
    <label class="form-control-label col-sm-12 col-md-2 col-form-label">Input with danger</label>
    <div class="col-sm-12 col-md-10">
        <input type="text" class="form-control form-control-danger">
        <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
        <small class="form-text text-muted">Example help text that remains unchanged.</small>
    </div>
</div>
</div>
</div>
</form>
                </code></pre>
            </div>
        </div> --}}
    </div>
    <!-- Input Validation End -->

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>

$("#job").validate({
    // Specify validation rules
    // rules: {
    //   // The key name on the left side is the name attribute
    //   // of an input field. Validation rules are defined
    //   // on the right side
    //   firstname: "required",
    //   lastname: "required",
    //   email: {
    //     required: true,
    //     // Specify that email should be validated
    //     // by the built-in "email" rule
    //     email: true
    //   },
    //   password: {
    //     required: true,
    //     minlength: 5
    //   }
    // },
    // compa
    // // Specify validation error messages
    // messages: {
    //   firstname: "Please enter your firstname",
    //   lastname: "Please enter your lastname",
    //   password: {
    //     required: "Please provide a password",
    //     minlength: "Your password must be at least 5 characters long"
    //   },
    //   email: "Please enter a valid email address"
    // },
    // // Make sure the form is submitted to the destination defined
    // // in the "action" attribute of the form when valid
    // submitHandler: function(form) {
    //   form.submit();
    // }
  });
</script>
<script>
    CKEDITOR.replace( 'coverletter' );
</script>
@endsection