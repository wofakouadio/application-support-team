<x-head/>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <x-header/>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <x-menu/>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Teams</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Teams</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <form class="form-horizontal" action="/admin/update-team" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <h4 class="card-title">Update Team Member</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="fname" value="{{old('fname', $team->fname)}}">
                                        <input type="hidden" name="team_id" value="{{$team->id}}">
                                    </div>
                                    @error('fname')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="lname" value="{{old('lname', $team->lname)}}">
                                    </div>
                                    @error('lname')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Date of Birth</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="dob" value="{{old('dob', $team->dob)}}">
                                    </div>
                                    @error('dob')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Gender</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="gender">
                                            <option value="">Choose</option>
                                            <option value="male"
                                                    @if($team->gender === 'male') selected="selected" @endif
                                            >Male</option>
                                            <option value="female"
                                                    @if($team->gender === 'female') selected="selected" @endif
                                            >Female</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Marital Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="marital_status">
                                            <option value="">Choose</option>
                                            <option value="single" @if($team->marital_status === 'single') selected="selected" @endif>Single</option>
                                            <option value="married" @if($team->marital_status === 'married') selected="selected" @endif>Married</option>
                                            <option value="divorced" @if($team->marital_status === 'divorced') selected="selected" @endif>Divorced</option>
                                            <option value="widowed" @if($team->marital_status === 'widowed') selected="selected" @endif>Widowed</option>
                                        </select>
                                        @error('marital_status')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title m-b-4">TableView</h5>
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered dataTable">
                                    <thead>
                                        <tr role="row">
                                            <th>Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>Marital Status</th>
                                            <th>Reg. Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($teams as $team)
                                        <tr>
                                            <td>{{$team->fname}} {{$team->lname}}</td>
                                            <td>{{$team->dob}}</td>
                                            <td>{{strtoupper($team->gender)}}</td>
                                            <td>{{strtoupper($team->marital_status)}}</td>
                                            <td>{{strtoupper($team->created_at)}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>Marital Status</th>
                                            <th>Reg. Date</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<x-footer/>
