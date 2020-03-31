	@include('tamplate.headerhome')
  <style type="text/css">
    .pagination li{
      float: left;
      list-style-type: none;
      margin:5px;
    }
  </style>
    <div class="content-wrapper" style="min-height: 1200px;">
      <section class="content">

        <div class="box ">
          <div class="box-header with-border">
            <h3 class="box-title"><b>List STB Detail</b></h3>
            <div class="box-tools pull-right">
              <button class="btn  btn-xs" data-widget="collapse" ><i class="fa fa-plus"></i></button>
            </div>
          </div>
          <div class="box-body" style="display: block;">
            <div class="table table-bordered table-hover" style="background:#eeeeee;">
              <table border="1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                 <thead>
                <tr>
                  <th>ID</th>
                  <th>Vendor Name</th>
                  <th>Product Model</th>
                  <th>Purchase Date</th>
                  <th>Mac Address</th>
                  <th>Serial Number</th>
                  <th style="width:125px;">Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($pegawai as $p)
                  <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->product_model }}</td>
                    <td>{{ $p->date }}</td>
                    <td>{{ $p->mac_address }}</td>
                    <td>{{ $p->serial_number }}</td>
                    <td>
                      <div class="btn-group">
                        
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{ $p->id }}" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a></li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
              {{ $pegawai->links() }}
              <br/>
              Halaman : {{ $pegawai->currentPage() }} <br/>
              Jumlah Data : {{ $pegawai->total() }} <br/>
              Data Per Halaman : {{ $pegawai->perPage() }} <br/>

              
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
              <label>Mac Address</label>
              <input type="text" class="form-control" name="mac" id="mac"  placeholder="Mac Address">
            </div>
            <div class="col-md-4">
              <label>Serial Number</label>
              <input type="Number" class="form-control" name="serial" id="serial"  placeholder="Serial Number">
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
              ajax: "{{ route('stbdetail.index') }}",
              columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'product_model', name: 'product_model'},
                {data: 'date', name: 'date'},
                {data: 'mac_address', name: 'mac_address'},
                {data: 'serial_number', name: 'serial_number'},
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
         
          $.get("{{ route('stbdetail_view.index') }}" +'/' + id +'/edit', function (data) {
              $('.modal-dialog').css({width:'90%',height:'auto', 'max-height':'100%'});
              $('#modelHeading').html("Edit STB");
              $('#saveBtn').val("edit-user");
              $('#ajaxModel').modal('show');
              $('#id').val(data.id);
              $('#vendore').val(data.vendor_id);
              $('#purchase').val(data.purchase_date);
              $('#product').val(data.product_model);
              $('#mac').val(data.mac_address);
              $('#serial').val(data.serial_number);
          })
        });


        $('#saveBtn').click(function (e) {

          /*alert($('#formedit').serialize());
          return false;*/
          e.preventDefault();
          $(this).html('Sending..');
          
          $.ajax({
            data: $('#formedit').serialize(),
            url: "{{ route('stbdetail_upd.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
       
                $('#formedit').trigger("reset");
                $('#ajaxModel').modal('hide');
                $('#table').DataTable().ajax.reload();
                location.reload();
           
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
    
    


