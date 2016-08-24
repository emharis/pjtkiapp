@extends('layouts.master')

@section('styles')
<style>
    .table > tbody > tr > td{
        vertical-align: middle;
    } 
</style>
@append

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <a href="admin/user">User</a> <i class="fa fa-angle-double-right"></i> New
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-solid" >
        <form name="form-add-user" method="POST" action="admin/user/insert" >
            <div class="box-header" ></div>
            <div class="box-body" >
                
                    <div class="form-group" >
                        <label>Username</label>
                        <input type="text" class="form-control" name="addsername" required autofocus autocomplete="off">
                    </div>
                    <div class="form-group" >
                        <label>Type</label>
                        <select class="form-control" name="tipe" >
                            @foreach($datatype as $dt)
                                <option value="{{$dt->id}}" >{{$dt->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" >
                        <label>Password</label>
                        <input type="password" class="form-control" name="addpassword" required >
                    </div>
                
            </div>
            <div class="box-footer" >
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="admin/user" >Cancel</a>
            </div>
        </form>
    </div>
    

</section><!-- /.content -->

@stop

@section('scripts')
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/jqueryform/jquery.form.min.js" type="text/javascript"></script>

<script type="text/javascript">
(function ($) {


})(jQuery);
</script>
@append