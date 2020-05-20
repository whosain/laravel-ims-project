	@include('tamplate.headerhome')
    <div class="content-wrapper" style="min-height: 1200px;">
      <section class="content">

          <div class="box collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah STB</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body" style="display: block;">
              <form action="#" id="form1" class="form-horizontal">
                <div class="box-body" id="collapse_form">
                  <div class="form-group has-feedback">
                    <div class="col-md-4">
                      <label>Vendor  Name</label>
                      <select name="vendor" id="vendor" class="form-control input-sm" required >
                        <option value="">Select One...</option>
                        @foreach($vendor as $item)
                          <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-4">
                      <label>Recevide Date</label>
                      <input type="text" class="form-control" name="received" id="received"  placeholder="Recevide Date">
                    </div>
                    <div class="col-md-4">
                      <label>Stock Balance</label>
                      <input type="number" class="form-control" name="stock" id="stock"  placeholder="Stock Balance">
                    </div>
                  </div>
                  <div class="form-group has-feedback">
                    <div class="col-md-4">
                      <label>Judul</label>
                      <textarea class="form-control" name="judul" id="judul" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="col-md-4">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="ket" id="ket" rows="3" placeholder="Enter ..."></textarea>
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

        <div class="box ">
          <div class="box-header with-border">
            <h3 class="box-title"><b>List STB</b></h3>
            <div class="box-tools pull-right">
              <button class="btn  btn-xs" data-widget="collapse" ><i class="fa fa-plus"></i></button>
            </div>
          </div>
          <div class="box-body" style="display: block;">
            <div class="table table-bordered table-hover" style="background:#eeeeee;">
              <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Vendor Name</th>
                    <th>Received Date</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Stock Balance</th>
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
              <label>Vendor  Name</label>
              <select name="vendor" id="vendore" class="form-control input-sm" required >
                <option value="">Select One...</option>
                @foreach($vendor as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4">
              <label>Recevide Date</label>
              <input type="text" class="form-control" name="received" id="receivede"  placeholder="Recevide Date">
            </div>
            <div class="col-md-4">
              <label>Stock Balance</label>
              <input type="number" class="form-control" name="stock" id="stocke"  placeholder="Stock Balance">
            </div>
          </div>
          <div class="form-group has-feedback">
            <div class="col-md-4">
              <label>Judul</label>
              <textarea class="form-control" name="judul" id="judule" rows="3" placeholder="Enter ..."></textarea>
            </div>
            <div class="col-md-4">
              <label>Keterangan</label>
              <textarea class="form-control" name="ket" id="kete" rows="3" placeholder="Enter ..."></textarea>
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
              ajax: "{{ route('stb.index') }}",
              columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'date', name: 'date'},
                {data: 'judul', name: 'judul'},
                {data: 'keterangan', name: 'keterangan'},
                {data: 'stock_balance', name: 'stock_balance'},
                {data: 'action', name: 'action'},
              ]
          });

          $( "#received" ).datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true,
          });
          
        });

        $(document).on('click', '#tes', function (){  
          
          /*alert($('#form1').serialize());
          return false;*/
          var ajaxurl = 'insertstb';
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
          $.get("{{ route('stb_view.index') }}" +'/' + id +'/edit', function (data) {
              $('.modal-dialog').css({width:'90%',height:'auto', 'max-height':'100%'});
              $('#modelHeading').html("Edit STB");
              $('#saveBtn').val("edit-user");
              $('#ajaxModel').modal('show');
              $('#id').val(data.id);
              $('#vendore').val(data.vendor_id);
              $('#receivede').val(data.received_date);
              $('#stocke').val(data.stock_balance);
              $('#judule').val(data.judul);
              $('#kete').val(data.keterangan);
          })
        });


        $('#saveBtn').click(function (e) {

          /*alert($('#formedit').serialize());
          return false;*/
          e.preventDefault();
          $(this).html('Sending..');
          
          $.ajax({
            data: $('#formedit').serialize(),
            url: "{{ route('stb_upd.store') }}",
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
              url: "{{ route('stb_del.store') }}"+'/'+id,
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
    
    


