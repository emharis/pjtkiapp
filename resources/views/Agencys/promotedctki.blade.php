@extends('layouts.master')

@section('styles')
<!--Bootsrap Data Table-->
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

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
        Promoted CTKI
    </h1>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box box-solid">
        <div class="box-body">
            {{-- <a class="btn btn-primary btn-sm" id="btn-add-ctki" href="admin/ctki/add" ><i class="fa fa-plus" ></i> Add CTKI</a>
            <div class="clearfix" ></div>
            <br/> --}}

            <!--table data ctki-->
            <table class="table table-bordered table-striped table-hover" id="table-datatable" >
                    <thead>
                        <tr>
                            <th style="width:50px;" >No</th>
                            <th class="col-lg-1" >Foto</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>Kota</th>
                            <th>Email</th>
                            <th class="col-sm-1 col-md-1 col-lg-1" ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $rownum = 1; ?>
                        @foreach($data as $dt)
                        <tr>
                            <td >{{$rownum++}}</td>
                            <td class="text-center" >
                                @if($dt->foto != "")
                                <img src="foto/{{$dt->foto}}" class="col-lg-12" >
                                @endif
                            </td>                            
                            <td>{{$dt->nama}}</td>                            
                            <td>{{$dt->nik}}</td>                            
                            <td>
                                @if($dt->jns_kelamin == 'P')
                                    PRIA
                                @else
                                    WANITA
                                @endif
                            </td>                            
                            <td>
                              {{$dt->kota}}  
                            </td>    
                            <td>
                                {{$dt->email}}
                            </td>                                         
                            <td class="text-center" >
                                <a class="btn btn-success btn-xs btn-show-ctki" href="agency/show-ctki/{{$dt->id}}" ><i class="fa fa-eye" ></i></a>
                                {{-- <a href="admin/ctki/delete/{{$dt->id}}" class="btn btn-danger btn-xs btn-delete-ctki" href="#" ><i class="fa fa-trash" ></i></a> --}}
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

</section><!-- /.content -->

<div class="modal modal-danger" id="modal-delete" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">DELETE</h4>
            </div>
        <div class="modal-body">
            <p>Anda akan menghapus data ini?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-outline" data-dismiss="modal" id="btn-modal-delete-yes" >Yes</button>
        </div>
        </div>
    <!-- /.modal-content -->
    </div>
  <!-- /.modal-dialog -->
</div>

@stop

@section('scripts')
<!--Datatable-->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/jqueryform/jquery.form.min.js" type="text/javascript"></script>

<script type="text/javascript">
(function ($) {

    //format datatable
    var tableData = $('#table-datatable').DataTable({
        "aaSorting": [[0, "asc"]],
        "columns": [
            {className: "text-right"},
            null,
            null,
            null,
            null,
            null,
            null,
            {className: "text-center"}
        ],
        "fnRowCallback": function (nRow, aData, iDisplayIndex) {
            // var index = iDisplayIndex + 1;
            // $('td:eq(0)', nRow).html(index);
            // return nRow;
        }
    });


    // delete ctki
    $(document).on('click','.btn-delete-ctki',function(){
        if(confirm('Anda akan menghapus data ini?')){

        }else{
            return false;
        }
    });
    

})(jQuery);
</script>
@append