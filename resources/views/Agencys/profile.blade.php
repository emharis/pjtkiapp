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
{{-- <section class="content-header">
    <h1>
        <a href="admin/ctki">CTKI</a> <i class="fa fa-angle-double-right"></i> Edit
    </h1>
</section> --}}

<!-- Main content -->
<section class="content">
    <div class="box box-solid" >
        <form method="POST" action="agency/profile-update" >
            <input type="hidden" name="id" value="{{$data->id}}">
            <div class="box-header with-border" >
                <label>PROFILE</label>
            </div>
            <div class="box-body" >
                <table class="table " >
                    <tbody>
                        <tr>
                            <td>
                                Nama
                            </td>
                            <td>
                                <input type="text" name="nama" class="form-control" autofocus autocomplete="off" required value="{{$data->nama}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kontak
                            </td>
                            <td>
                                <input type="text" name="kontak" class="form-control" autofocus autocomplete="off" required value="{{$data->kontak}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Alamat
                            </td>
                            <td>
                                <input type="text" name="alamat" class="form-control" autofocus autocomplete="off" required value="{{$data->alamat}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Telp
                            </td>
                            <td>
                                <input type="text" name="telp" class="form-control" autofocus autocomplete="off" required value="{{$data->telp}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                <button type="subit" class="btn btn-primary">Save</button>
                                <a class="btn btn-danger" href="home" >Cancel</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="box-footer" ></div>
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