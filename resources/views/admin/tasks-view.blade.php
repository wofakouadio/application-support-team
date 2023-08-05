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
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title m-b-4">TableView / Daily Activity</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered dataTable">
                            <thead>
                            <tr role="row">
                                <th>Name</th>
                                <th>Creation Date</th>
                                <th>Update Date</th>
                                <th>Personnel</th>
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
                                        <a class="btn btn-info" href="/admin/task/{{$task->id}}"> <i class="fas fa-eye"></i> View</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Creation Date</th>
                                <th>Update Date</th>
                                <th>Personnel</th>
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
