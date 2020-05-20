@include('tamplate.headerhome')

<div class="content-wrapper" style="min-height: 1200px;">
    <section class="content">
        @include('scnaset.add')

        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Data SCN</b></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            {{-- <div class="box-body" style="display: block;">
              
                <table id="table" class="table table-striped"> --}}
              <div class="table table-bordered table-hover" style="background:#eeeeee;">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Jenis Perangkat</th>
                      <th>Seri</th>
                      <th>Merek</th>
                      <th>SN</th>
                      <th>Tanggal Masuk</th>
                      <th>Lokasi Perangkat</th>
                      <th>PIC Install</th>
                      <th>Tanggal Install</th>
                      <th>PIC Dismantle</th>
                      <th>Tanggal Dismantle</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
  
                  </tbody>
  
                  <tfoot>
  
                  </tfoot>
                </table>
             
            </div><!-- /.box-body -->
          </div>
    </section>
</div>
@include('scnaset.edit')
@include('tamplate.footer')
<script type="text/javascript">

    $('#location').select2({
          placeholder: 'Cari Location...',
          ajax: {
            url: '/treckingscn/carilocation',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                  return {
                    text: item.nama_lokasi,
                    id: item.id
                  }
                })
              };
            },
            cache: true
          }
        });



   $(document).ready(function() {
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $(function () {
    
          var table = $('#table').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('showAsets') }}",
              columns: [
                {data: 'id', name: 'id'},
                {data: 'description', name: 'description'},
                {data: 'seri', name: 'seri'},
                {data: 'merk', name: 'merk'},
                {data: 'sn', name: 'sn'},
                {data: 'tglmsk', name: 'tglmsk'},
                {data: 'nama_lokasi', name: 'nama_lokasi'},
                {data: 'pic_install', name: 'pic_install'},
                {data: 'tglinstall', name: 'tglinstall'},
                {data: 'pic_dismental', name: 'pic_dismental'},
                {data: 'tgldismental', name: 'tgldismental'},
                {data: 'action', name: 'action'}
              ]
          });

          // var date = $('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val();
          
          $( "#tgl_msk").datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true,
          });

          $( "#tglinstall" ).datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true,
          });
          
          $( "#tgldismantle" ).datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true,
          });
          
        });

        $(document).on('click', '#add', function (){  
          
          
          var ajaxurl = 'addAset';
          $.ajax({
            url : ajaxurl,
            type: "POST",
            data: $('#form1').serialize(),
            dataType: "JSON",
            success: function (data) {
              alert('Succes');
              $('#form1')[0].reset();
              $('#collapse_form').collapse('hide');
              $('#table').DataTable().ajax.reload();
            },
            error: function (data) {
                alert('Opps');
            }
          });

        
        });


        $('body').on('click', '.editAset', function () {
          var id = $(this).data('id');
          $.get("{{ route('asetView.index') }}" +'/' + id +'/edit', function (data) {
              $('.modal-dialog').css({width:'90%',height:'auto', 'max-height':'100%'});
              $('#modelHeading').html("Edit Aset");
              $('#saveBtn').val("edit-user");
              $('#ajaxModel').modal('show');
              $('#id').val(data.id);
              $('#jenisname').val(data.jenisname);
              $('#seri').val(data.seri);
              $('#merk').val(data.merk);
              $('#sn').val(data.sn);
              $('#tgl_mske').val(data.tgl_msk);
              $('#location').val(data.location);
              $('#picinstalle').val(data.pic_install);
              $('#tglinstalle').val(data.tgl_install);
              $('#pic_dismantle').val(data.pic_dismental);
              $('#tgldismantles').val(data.tgl_dismental);
              
          })

          
          $( "#tgl_mske").datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true,
          });

          $( "#tglinstalle" ).datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true,
          });
          
          $( "#tgldismantles" ).datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true,
          });

        });


        $('#saveBtn').click(function (e) {

        
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                data: $('#formedit').serialize(),
                url: "{{ route('updateAset.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#formedit').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    $('#table').DataTable().ajax.reload();
                
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });


        $('body').on('click', '.deleteAset', function () {
     
        var id = $(this).data("id");
        confirm("Are You sure want to delete !");
    
        $.ajax({
            type: "DELETE",
            url: "{{ route('deleteAset.store') }}"+'/'+id,
            success: function (data) {
                $('#table').DataTable().ajax.reload();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
        });

   });
</script>

