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
                      <th>Lokasi Aset</th>
                      <th>Keterangan</th>
                      <!-- <th>Kembali</th>
                      <th>Tanggal Kembali</th> -->
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
                // {data: 'jenisname', name: 'jenisname'},
                {data: 'description', name: 'description'},
                {data: 'seri', name: 'seri'},
                {data: 'merk', name: 'merk'},
                {data: 'sn', name: 'sn'},
                {data: 'tgl_msk', name: 'tgl_msk'},
                {data: 'sitename', name: 'sitename'},
                {data: 'location', name: 'location'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'action', name: 'action'}
              ]
          });
          
          $("#tgl_msk").datepicker({
                dateFormat: "yyyy/mm/dd",
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
              $('#jenisname').val(data.description);
              // $('#description_e').val(data.jenisname);
              $('#seri').val(data.seri);
              $('#merk').val(data.merk);
              $('#sn').val(data.sn);
              $('#tgl_mske').val(data.tgl_msk);
              $('#sitename').val(data.sitename);
              $('#location').val(data.location);
              $('#keterangan').val(data.keterangan);
              
          })

          $("#tgl_mske").datepicker({
                dateFormat: "yyyy/mm/dd",
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

