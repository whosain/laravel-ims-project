	@include('tamplate.headerhome')
    <div class="content-wrapper" style="min-height: 1200px;">
      <section class="content">

        <div class="box box-solid  box collapsed-box" >
          <div class="box-header with-border">
            <h3 class="box-title"><b>Tambah Vendor</b></h3>
            <div class="box-tools pull-right">
              <button class="btn  btn-xs" data-widget="collapse" ><i class="fa fa-plus"></i></button>
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
                    <label>Vendor Name</label>
                    <input type="text" class="form-control" name="vend_name"  placeholder="Vendor Name">
                  </div>
                  <div class="col-md-4">
                    <label>Vendor Short Name</label>
                    <input type="text" class="form-control" name="vend_short"  placeholder="Vendor Short Name">
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <div class="col-md-4">
                    <label>Email</label>
                    <input type="Email" class="form-control" name="email"  placeholder="Example@Email.co.id/.com">
                  </div>
                  <div class="col-md-4">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone"  placeholder="08xxxxx">
                  </div>
                  <div class="col-md-4">
                    <label>Address</label>
                    <textarea type="text" class="form-control" name="address"  placeholder="Address"></textarea>
                  </div>
                </div>
                <div class="form-group has-feedback">
                  <div class="col-md-4">
                    <label>Note</label>
                    <textarea type="text" class="form-control" name="note"  placeholder="Note"></textarea>
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


        <div class="box box-solid ">
          <div class="box-header with-border">
            <h3 class="box-title"><b>List Vendor</b></h3>
            <div class="box-tools pull-right">
              <button class="btn btn-xs" data-widget="collapse" ><i class="fa fa-plus"></i></button>
            </div>
          </div>
          <div class="box-body" style="display: block;">
            <div class="table table-bordered table-hover" style="background:#eeeeee;">
              <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Company Name</th>
                    <th>Vendor Name</th>
                    <th>Vendor Alias</th>
                    <th>Email</th>
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
          <div class="box-body">
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
                <label>Vendor Name</label>
                <input type="text" class="form-control" id="vend_name" name="vend_name"  placeholder="Vendor Name">
              </div>
              <div class="col-md-4">
                <label>Vendor Short Name</label>
                <input type="text" class="form-control" id="vend_short" name="vend_short"  placeholder="Vendor Short Name">
              </div>
            </div>
            <div class="form-group has-feedback">
              <div class="col-md-4">
                <label>Email</label>
                <input type="Email" class="form-control" id="email" name="email"  placeholder="Example@Email.co.id/.com">
              </div>
              <div class="col-md-4">
                <label>Phone</label>
                <input type="text" class="form-control" id="phone" name="phone"  placeholder="08xxxxx">
              </div>
              <div class="col-md-4">
                <label>Address</label>
                <textarea type="text" class="form-control" id="address" name="address"  placeholder="Address"></textarea>
              </div>
            </div>
            <div class="form-group has-feedback">
              <div class="col-md-4">
                <label>Note</label>
                <textarea type="text" class="form-control" id="note" name="note"  placeholder="Note"></textarea>
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
              ajax: "{{ route('vend.index') }}",
              columns: [
                {data: 'id', name: 'id'},
                {data: 'company_name', name: 'company_name'},
                {data: 'name', name: 'name'},
                {data: 'name_short', name: 'name_short'},
                {data: 'email', name: 'email'},
                {data: 'action', name: 'action'},
              ]
          });
          
        });

        $(document).on('click', '#tes', function (){  
          
          /*alert($('#form1').serialize());
          return false;*/
          var ajaxurl = 'insertvend';
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
          $.get("{{ route('vend_view.index') }}" +'/' + id +'/edit', function (data) {
              $('.modal-dialog').css({width:'90%',height:'auto', 'max-height':'100%'});
              $('#modelHeading').html("Edit Vendor");
              $('#saveBtn').val("edit-user");
              $('#ajaxModel').modal('show');
              $('#id').val(data.id);

              $('#companye').val(data.company_id);
              $('#vend_name').val(data.name);
              $('#vend_short').val(data.name_short);
              $('#email').val(data.email);
              $('#phone').val(data.phone);
              $('#address').val(data.address);
              $('#note').val(data.notes);
          })
        });


        $('#saveBtn').click(function (e) {

          /*alert($('#formedit').serialize());
          return false;*/
          e.preventDefault();
          $(this).html('Sending..');
          
          $.ajax({
            data: $('#formedit').serialize(),
            url: "{{ route('vend_upd.store') }}",
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
              url: "{{ route('vend_del.store') }}"+'/'+id,
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
    
    


