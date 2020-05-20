  @include('tamplate.headerhome')

    <div class="content-wrapper" style="min-height: 1200px;">
      <section class="content">

        <div class="box ">
          <div class="box-header with-border">
            @foreach($vendor as $item)
              <h3 class="box-title"><b>List STB Detail ( {{$item->name}} )</b></h3>
            @endforeach
            <div class="box-tools pull-right">
              <button class="btn  btn-xs" data-widget="collapse" ><i class="fa fa-plus"></i></button>
            </div>
          </div>
          <div class="box-body" style="display: block;">
            <div class="form-group has-feedback">
              <div class="col-md-3">
                <select class="customer form-control" id="customer" name="customer"></select>
              </div>
              <div class="col-md-3">
                <select class="building form-control" name="building" id="building"></select>
              </div>
              <div class="col-md-3">
                <select class="location form-control" name="location" id="location"></select>
              </div>
              <div class="col-md-3">
                <button type="button" class="btn btn-sm"  id="savecom" aria-expanded="true">Save</button>
              </div>
            </div>
            <form id="content-form" method="POST">
              <div class="form-group has-feedback">
                <div class="count-checkboxes-wrapper">
                <span id="count-checked-checkboxes">0</span> checked
                </div>
              </div>
              <div class="table table-bordered table-hover" style="background:#eeeeee;">
                <div class="form-group has-feedback">
                  <input type="hidden" id="stb" name="stb"  value="{{$stb}}}">
                </div>
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                   <thead>
                  <tr>
                    <th><input id="select_all" name="select_all" value="1"  type="checkbox" /></th>
                    <th>Customer</th>
                    <th>Building</th>
                    <th>Location</th>
                    <th>Product Model</th>
                    <th>Purchase Date</th>
                    <th>Mac Address</th>
                    <th>Serial Number</th>
                    <th style="width:125px;">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                    </tr>
                  </tbody>
                  
                </table>
                
                
              </div>
            </form>
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
      $('.customer').select2({
          placeholder: 'Cari Customer...',
          ajax: {
            url: '/laravel-ims-project/public/treckingstb/caricustomer',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                  return {
                    text: item.name,
                    id: item.id
                  }
                })
              };
            },
            cache: true
          }
        });

       
        $('#building').select2( 
        {
          placeholder: 'Cari Building...',
          ajax: {
            url: '/laravel-ims-project/public/treckingstb/caribuilding',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                  return {
                    text: item.building_name,
                    id: item.id
                  }
                })
              };
            },
            cache: true
          }
        });

        $('#location').select2({
          placeholder: 'Cari Location...',
          ajax: {
            url: '/laravel-ims-project/public/treckingstb/carilocation',
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
              ajax: {
                url: "{{ route('stbdetail.index') }}",
                data: function (d) {
                  d.stb = $('#stb').val();
                  }
              },

              columns: [
                {data: 'checkbox', orderable: false, searchable: false},
                {data: 'custname', name: 'custname'},
                {data: 'building_name', name: 'building_name'},
                {data: 'nama_lokasi', name: 'nama_lokasi'},
                {data: 'product_model', name: 'product_model'},
                {data: 'date', name: 'date'},
                {data: 'mac_address', name: 'mac_address'},
                {data: 'serial_number', name: 'serial_number'},
                {data: 'action', name: 'action'},
              ]
          });

          $('#select_all').on('click', function(){

            var rows = table.rows({ 'search': 'applied' }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
          });

          $('#table tbody').on('change', 'input[type="checkbox"]', function(){
        
              if(!this.checked){
                  var el = $('#select-all').get(0);           
                  if(el && el.checked && ('indeterminate' in el)){
                      el.indeterminate = true;
                  }
              }
          });


          $('#select_all').on('click', function(){

            var rows = table.rows({ 'search': 'applied' }).nodes();
            var tes = $('input[type="checkbox"]', rows).length;
             $('#count-checked-checkboxes').text(tes);
          });

          $('#select_all').on('click', function(){

            if(!this.checked){
              $('#count-checked-checkboxes').text(0);
            }
          });

         
          
        });

        $(document).on('click', '#savecom', function ()
        {
          var Checked = $('input[name="select[]"]:checked').length;
          var customer = $('#customer').val();
          var building = $('#building').val();
          var location = $('#location').val();

          
          if(Checked > 0){
            var myObj = [];
            $('input[name="select[]"]:checked').each(function(index,obj){
              var id  = $(obj).val();
              
              var stbid = $('#id'+id+'').val();
              var stbheadid = $('#idhead'+id+'').val();

              myObj.push ({'idstb':stbid,'stbheadid':stbheadid,'customer':customer,'building':building,'location':location,});
            });
            console.log(myObj);
            var ajaxurl = 'insertcust';

            $.ajax({
              url : "{{ route('insertcust') }}",
              type: "POST",
              data: {'id':myObj},
              dataType: "JSON",
              success: function (data) {
                alert('Berhasil');
              },
              error: function (data) {
                  alert('Gagal');
              }
            });
          }
        });


        $(document).on('click', '#tes', function (){  
          
          /*alert($('#form1').serialize());
          return false;*/
          var ajaxurl = 'insertstb';
          $.ajax({
            url : ajaxurl,
            method: "post",
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
    
    


