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
        <a href="admin/ctki">CTKI</a> <i class="fa fa-angle-double-right"></i> New
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-solid" >
        <form name="form-add-ctki" method="POST" action="admin/ctki/insert" enctype="multipart/form-data" >
            {{-- <div class="box-header" ></div> --}}
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

                <h4 style="font-size:16px;" class="page-header text-blue" >Biodata CTKI</h4>
                <div class="form-group" >
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" >
                </div>
                <div class="form-group" >
                    <div class="row" >
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                <label>Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" >
                                    <option value="P" >PRIA</option>
                                    <option value="W" >WANITA</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                <label>NIK</label>
                                <input type="text" name="nik" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <div class="row" >
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                <label>Tanggal Lahir</label>
                                <input type="text" name="tgl_lahir" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" rows="2" ></textarea>
                </div>
                <div class="form-group" >
                    <div class="row" >
                        <div class="col-lg-6" >
                            <label>Kota</label>
                            <input name="kota" class="form-control" type="text" >
                        </div>
                        <div class="col-lg-6" >
                            <label>Provinsi</label>
                            <input name="provinsi" class="form-control" type="text" >
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <div class="row" >
                        <div class="col-lg-6" >
                                <label>Pendidikan Terakhir</label>
                                <select name="pendidikan" class="form-control">
                                    <option value="1">SD</option>
                                    <option value="2">SMP</option>
                                    <option value="3">SMA/SMK</option>
                                </select>
                        </div>
                        <div class="col-lg-6" >
                                <label>Status Menikah</label>
                                <select name="menikah" class="form-control">
                                    <option value="1">Belum Menikah</option>
                                    <option value="2">Menikah</option>
                                    <option value="3">Duda/Janda</option>
                                </select>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <div class="row" >
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                <label>Agama</label>
                                <select name="agama" class="form-control">
                                    <option value="1">Islam</option>
                                    <option value="2">Protestan</option>
                                    <option value="3">Katholik</option>
                                    <option value="4">Hindu</option>
                                    <option value="5">Budha</option>
                                    <option value="6">Konghuchu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                {{-- <label>Status Menikah</label>
                                <select name="pendidikan" class="form-control">
                                    <option value="1">Belum Menikah</option>
                                    <option value="2">Menikah</option>
                                    <option value="3">Duda/Janda</option>
                                </select> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <div class="row" >
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                <label>Telp</label>
                                <input type="text" name="telp" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <div class="row" >
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                <label>Nama Ayah</label>
                                <input type="text" name="ayah" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                <label>Nama Ibu</label>
                                <input type="text" name="ibu" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <div class="row" >
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                <label>Visa</label>
                                <input type="file" name="visa" class="">
                            </div>
                        </div>
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                <label>Passsport</label>
                                <input type="file" name="passport" class="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" >
                    <div class="row" >
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                <label>Foto</label>
                                <input type="file" name="foto" class="">
                            </div>
                        </div>
                        <div class="col-lg-6" >
                            <div class="form-group" >
                                {{-- <label>Passsport</label>
                                <input type="file" name="passport" class=""> --}}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="box-footer" >
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="admin/ctki" >Cancel</a>
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