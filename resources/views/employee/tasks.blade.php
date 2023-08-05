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
                        <form class="form-group" action="/employee/tasks/new-task" method="POST">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">New Task</h4>
                                <div class="form-group">
                                    <label for="fname" class="text-right control-label col-form-label">Title</label>
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="lname" class="text-right control-label col-form-label">Description</label>
                                    <textarea class="form-control" name="description" cols="10" rows="5" id="editor">{{old('description')}}</textarea>
                                    @error('description')
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
                                            <th>Creation Date</th>
                                            <th>Update Date</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>{{$task->name}}</td>
                                            <td>{{$task->created_at}}</td>
                                            <td>{{$task->updated_at}}</td>
                                            <td>{{$task->user->fname}} {{$task->user->lname}}</td>
                                            <td>
                                                @switch($task->status)
                                                    @case(1)
                                                        <span class="badge bg-warning text-white text-uppercase">pending</span>
                                                        @break
                                                    @case(2)
                                                        <span class="badge bg-success text-white text-uppercase">done</span>
                                                        @break
                                                    @default
                                                        <span class="badge bg-primary text-white text-uppercase">submitted</span>
                                                        @break
                                                @endswitch
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="/employee/tasks/{{$task->id}}/edit-task"> <i class="fas fa-pen-square"></i> Edit</a>
                                                <form action="/employee/tasks/delete-task" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="task_id" value="{{$task->id}}">
                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Creation Date</th>
                                            <th>Update Date</th>
                                            <th>User</th>
                                            <th>Status</th>
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
