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
        <a href="admin/agency">Agency</a> <i class="fa fa-angle-double-right"></i> New
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-solid" >
        <form name="form-add-agency" method="POST" action="admin/agency/insert" >
            <div class="box-header" ></div>
            <div class="box-body" >
                <h4 style="font-size:16px;" class="page-header text-blue" >User Login</h4>
                
                <div class="form-group" >
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" required autofocus autocomplete="off">
                </div>
                <div class="form-group" >
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required autocomplete="off">
                </div>

                <h4 style="font-size:16px;" class="page-header text-blue" >Data Perusahaan</h4>
                <div class="form-group" >
                    <label>Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama" required autocomplete="off">
                </div>
                <div class="form-group" >
                    <label>Kontak</label>
                    <input type="text" class="form-control" name="kontak" autocomplete="off">
                </div>
                <div class="form-group" >
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" autocomplete="off">
                </div>
                <div class="form-group" >
                    <label>Telp</label>
                    <input type="text" class="form-control" name="telp" autocomplete="off">
                </div>
            </div>
            <div class="box-footer" >
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="admin/agency" >Cancel</a>
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