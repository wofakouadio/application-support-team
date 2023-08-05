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
                                <li class="breadcrumb-item active" aria-current="page">Tasks/Activities</li>
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
                <form class="form-horizontal">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Task / Activity Information</h4>
                        <div class="form-group">
                            <label for="fname" class="text-right control-label col-form-label">Title</label>
                            <input type="text" class="form-control" name="name" value="{{$task->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="text-right control-label col-form-label">Description</label>
                            <textarea class="form-control" name="description" cols="10" rows="5" readonly>{{$task->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="text-right control-label col-form-label">Status</label>
                            @switch($task->status)
                                @case(1)
                                    <input type="text" class="form-control" value="{{('PENDING')}}" readonly>
                                    @break
                                @case(2)
                                    <input type="text" class="form-control" value="{{('DONE')}}" readonly>
                                    @break
                                @default
                                    <input type="text" class="form-control" value="{{('SUBMITTED')}}" readonly>
                                    @break
                            @endswitch
                        </div>
                        @unless ($task->created_at->eq($task->updated_at))
                            <div class="form-group">
                                <label for="fname" class="text-right control-label col-form-label">Personnel</label>
                                <input type="text" class="form-control" name="name" value="{{$task->user->fname. ' ' .$task->user->lname}}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="text-right control-label col-form-label">Remarks</label>
                                <textarea class="form-control" name="remarks" cols="10" rows="5" readonly>{{$task->remarks}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="fname" class="text-right control-label col-form-label">Activity Timestamp</label>
                                <input type="text" class="form-control" name="name" value="{{$task->updated_at->format('j M Y, g:i a') . ' edited'}}" readonly>
                            </div>
                        @endunless
                    </div>
                </form>
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
