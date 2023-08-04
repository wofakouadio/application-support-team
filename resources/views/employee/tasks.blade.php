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
    <x-menu-employee/>
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
                    <h4 class="page-title">Tasks</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tasks</li>
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
                        <form class="form-horizontal" action="/employee/new-task" method="POST">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">New Task</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="task_title" value="{{old('task_title')}}">
                                    </div>
                                    @error('task_title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="task_description" cols="10" rows="5">{{old('task_description')}}</textarea>
                                    </div>
                                    @error('task_description')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
{{--                                    @foreach($teams as $team)--}}
{{--                                        <tr>--}}
{{--                                            <td>{{$team->fname}} {{$team->lname}}</td>--}}
{{--                                            <td>{{$team->dob}}</td>--}}
{{--                                            <td>{{strtoupper($team->gender)}}</td>--}}
{{--                                            <td>{{strtoupper($team->marital_status)}}</td>--}}
{{--                                            <td>{{strtoupper($team->created_at)}}</td>--}}
{{--                                            <td>--}}
{{--                                                <a class="btn btn-info" href="{{$team->id}}/edit-team"> <i class="fas fa-pen-square"></i> Edit</a>--}}
{{--                                                <form action="/admin/delete-team" method="POST">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <input type="hidden" name="team_id" value="{{$team->id}}">--}}
{{--                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>--}}
{{--                                                </form>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date of Birth</th>
                                            <th>Gender</th>
                                            <th>Marital Status</th>
                                            <th>Reg. Date</th>
                                            <th>Action</th>
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
