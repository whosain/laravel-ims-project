	@include('tamplate.headerhome')
    <div class="content-wrapper" style="min-height: 1200px;">
      <section class="content">

        <div class="box box-solid box-info box collapsed-box" >
          <div class="box-header with-border">
            <h3 class="box-title"><b>Tambah Lokasi</b></h3>
            <div class="box-tools pull-right">
              <button class="btn btn-info btn-xs" data-widget="collapse" ><i class="fa fa-plus"></i></button>
            </div>
          </div>
          <div class="box-body" style="display: block;">
            <form action="#" id="form1" class="form-horizontal">
              <div class="box-body" id="collapse_form">
                <div class="form-group has-feedback">
                  <div class="col-md-4">
                    <label>Company  Name</label>
                    <select name="company" id="company" class="form-control input-sm" required >
                      <option value="">Select One...</option>
                      @foreach($company as $item)
                        <option value="{{$item->id}}">{{$item->company_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Building Name</label>
                    <select name="building" id="building" class="form-control input-sm" required >
                      <option value="">Select One...</option>
                      @foreach($building as $item)
                        <option value="{{$item->id}}">{{$item->building_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Nama Lokasi</label>
                    <input type="text" class="form-control" name="nama_lok"  placeholder="Nama Lokasi">
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <div class="col-xs-4" align="right">
                    <button type="button" id="tes"  class="btn btn-primary btn-block btn-flat">Save</button>
                  </div><!-- /.col -->
                </div>
              </div>
            </form>
          </div><!-- /.box-body -->
        </div>


        <div class="box box-solid box-info">
          <div class="box-header with-border">
            <h3 class="box-title"><b>List Lokasi</b></h3>
            <div class="box-tools pull-right">
              <button class="btn btn-info btn-xs" data-widget="collapse" ><i class="fa fa-plus"></i></button>
            </div>
          </div>
          <div class="box-body" style="display: block;">
            <div class="table table-bordered table-hover" style="background:#eeeeee;">
              <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Building Name</th>
                    <th>Lokasi</th>
                    <th style="width:125px;">Action</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>

                <tfoot>

                </tfoot>
              </table>
            </div>
          </div><!-- /.box-body -->
        </div>
      </section>
    </div>
  </div>


<div class="modal fade" id="ajaxModel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="modelHeading"></h4>
      </div>
      <div class="modal-body">
        <form action="#" id="formedit" class="form-horizontal">
          
            <div class="form-group has-feedback">
              <input type="hidden" name="id" id="id">
              <div class="col-md-4">
                <label>Company  Name</label>
                <select name="company" id="companye" class="form-control input-sm" required >
                  <option value="">Select One...</option>
                  @foreach($company as $item)
                    <option value="{{$item->id}}">{{$item->company_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4">
                <label>Building Name</label>
                <select name="building" id="buildinge" class="form-control input-sm" required >
                  <option value="">Select One...</option>
                  @foreach($building as $item)
                    <option value="{{$item->id}}">{{$item->building_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4">
                <label>Nama Lokasi</label>
                <input type="text" class="form-control" id="nama_lok" name="nama_lok"  placeholder="Nama Lokasi">
              </div>
            </div>
        </form>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

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
              ajax: "{{ route('lok.index') }}",
              columns: [
                {data: 'id', name: 'id'},
                {data: 'company_name', name: 'company_name'},
                {data: 'building_name', name: 'building_name'},
                {data: 'nama_lokasi', name: 'nama_lokasi'},
                {data: 'action', name: 'action'},
              ]
          });
          
        });

        $(document).on('click', '#tes', function (){  
          
          /*alert($('#form1').serialize());
          return false;*/
          var ajaxurl = 'insertlok';
          $.ajax({
            url : ajaxurl,
            type: "POST",
            data: $('#form1').serialize(),
            dataType: "JSON",
            success: function (data) {
              alert('Berhasil');
              $('#form1')[0].reset();
              $('#collapse_form').collapse('hide');
              $('#table').DataTable().ajax.reload();
              
         
            },
            error: function (data) {
                alert('Gagal');
                //console.log('Error:', data);
                //$('#saveBtn').html('Save Changes');
            }
          });
        });


        $('body').on('click', '.editProduct', function () {
          var id = $(this).data('id');
          $.get("{{ route('lok_view.index') }}" +'/' + id +'/edit', function (data) {
              $('.modal-dialog').css({width:'90%',height:'auto', 'max-height':'100%'});
              $('#modelHeading').html("Edit Lokasi");
              $('#saveBtn').val("edit-user");
              $('#ajaxModel').modal('show');
              $('#id').val(data.id);
              $('#companye').val(data.company_id);
              $('#buildinge').val(data.building_id);
              $('#nama_lok').val(data.nama_lokasi);
          })
        });


        $('#saveBtn').click(function (e) {

          /*alert($('#formedit').serialize());
          return false;*/
          e.preventDefault();
          $(this).html('Sending..');
          
          $.ajax({
            data: $('#formedit').serialize(),
            url: "{{ route('lok_upd.store') }}",
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


        $('body').on('click', '.deleteProduct', function () {
     
          var id = $(this).data("id");
          confirm("Are You sure want to delete !");
        
          $.ajax({
              type: "DELETE",
              url: "{{ route('lok_del.store') }}"+'/'+id,
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
  </body>    
</html>
    
    


