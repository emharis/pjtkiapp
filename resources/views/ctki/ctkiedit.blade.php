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
        <a href="admin/ctki">CTKI</a> <i class="fa fa-angle-double-right"></i> Edit
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Biodata</a></li>
              <li><a href="#tab_2" data-toggle="tab">User Profile</a></li>
              <li><a href="#tab_3" data-toggle="tab">Promosikan CTKI</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <table class="table" >
                    <tbody>
                        <tr>
                            <td class="col-lg-3" >
                                <label>Nama</label>
                            </td>
                            <td class="col-lg-3" >
                                <input class="form-control" type="text" name="nama" value="{{$data->nama}}">
                            </td>
                            <td class="col-lg-6 text-center" colspan="2" rowspan="3"  >
                                @if($data->foto != "")
                                    <img src="foto/{{$data->foto}}" style="width:100px;"  >
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>NIK</label>
                            </td>
                            <td>
                                <input class="form-control" type="text" name="nik" value="{{$data->nik}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Jenis Kelamin</label>
                            </td>
                            <td>
                                <select name="jenis_kelamin" class="form-control" >
                                    <option {{$data->jns_kelamin == 'P' ? 'selected':''}} value="P" >PRIA</option>
                                    <option {{$data->jns_kelamin == 'W' ? 'selected':''}} value="W" >WANITA</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tempat Lahir</label>
                            </td>
                            <td>
                                <input type="text" name="tempat_lahir" class="form-control" value="{{$data->tempat_lahir}}">
                            </td>
                             <td class="col-lg-3" >
                                <label>Tanggal Lahir</label>
                            </td>
                            <td>
                                <input type="text" name="tanggal_lahir" class="form-control" value="{{date('d-m-Y',strtotime($data->tgl_lahir))}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Alamat</label>
                            </td>
                            <td colspan="3" >
                                <input type="text" name="alamat" class="form-control" value="{{$data->alamat}}" > 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Kota</label>
                            </td>
                            <td>
                                <input type="text" name="kota" class="form-control" value="{{$data->kota}}">
                            </td>
                            <td>
                                <label>Provinsi</label>
                            </td>
                            <td>
                                <input type="text" name="provinsi" class="form-control" value="{{$data->provinsi}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Pendidikan Terakhir</label>
                            </td>
                            <td>
                                 <select name="pendidikan" class="form-control">
                                    <option value="1">SD</option>
                                    <option value="2">SMP</option>
                                    <option value="3">SMA/SMK</option>
                                </select>
                            </td>
                            <td>
                                <label>Status Menikah</label>
                            </td>
                            <td>
                                <select name="menikah" class="form-control">
                                    <option value="1">Belum Menikah</option>
                                    <option value="2">Menikah</option>
                                    <option value="3">Duda/Janda</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Agama</label>
                            </td>
                            <td>
                                 <select name="agama" class="form-control">
                                    <option value="1">Islam</option>
                                    <option value="2">Protestan</option>
                                    <option value="3">Katholik</option>
                                    <option value="4">Hindu</option>
                                    <option value="5">Budha</option>
                                    <option value="6">Konghuchu</option>
                                </select>
                            </td>
                            <td>
                                <label></label>
                            </td>
                            <td>
                               
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                 <input type="email" name="email" class="form-control" value="{{$data->email}}" >
                            </td>
                            <td>
                                <label>Telp</label>
                            </td>
                            <td>
                               <input type="text" name="telp" class="form-control" value="{{$data->telp}}" >
                            </td>
                        </tr>
                        <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary" type="submit" >Save</button>
                                    <a href="admin/ctki" class="btn btn-danger" >Cancel</a>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                    </tbody>
                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <form>
                    <table class="table" >
                        <tbody>
                            <tr>
                                <td>Username</td>
                                <td>
                                    <input type="text" name="username" class="form-control" readonly value="{{$data->username}}">
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <input type="password" name="password" placeholder="Input untuk mengganti password" class="form-control">
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-primary" type="submit" >Save</button>
                                    <a href="admin/ctki" class="btn btn-danger" >Cancel</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <h4>Daftar Agency :</h4>
                <small>* centang data agency di bawah ini, untuk mempromosikan CTKI kepada agency</small>

                <form method="POST" action="admin/ctki/promote">
                    <input type="hidden" name="ctki_id" value="{{$data->id}}">
                    <table class="table table-bordered table-striped" >
                        <thead>
                            <tr>
                                <th>Nama Agency</th>
                                <th class="col-lg-1" >Promote</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($agency as $dt)
                                <tr>
                                    <td>{{$dt->nama}}</td>
                                    <td class="text-center" >
                                        <input {{$dt->promote > 0 ? 'checked':''}} type="checkbox" name="agency[]" value="{{$dt->id}}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right" >
                        <button class="btn btn-primary" > Promote <i class="fa fa-angle-double-right" ></i></button>    
                        <a class="btn btn-danger" href="admin/ctki" > Cancel</a>    
                    </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
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