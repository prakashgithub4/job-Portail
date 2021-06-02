@extends('layouts.app-jobseeker')
@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="title">
                    <h4>Basic Tables</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Basic Tables</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 col-sm-12 text-right">
                <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown">
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
    <!-- basic table  Start -->
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">All Jobs</h4>
                @if(Session::get('success'))
                <div class="alert alert-primary" role="alert">
                   @php echo Session::get('success'); @endphp
                  </div>
                  @endif
            </div>
            <div class="pull-right">
                <form action="{{route('search')}}" method="POST">
                    @csrf
                <input type="text" name="search"/>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

                </form>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Skills</th>
                    <th scope="col">Experiance</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($job as $key=>$val)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$val->title}}</td>
                    <td>{{$val->skills}}</td>
                    <td>{{$val->experiance}}</td>
                    
                    <td><a class="btn btn-info" href="{{url('jobseeker/apply/'.encrypt($val->id))}}">Apply</a></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
        {{ $job->links() }}
       
    </div>
   
    </div>
    <!-- Contextual classes End -->
</div>


@endsection