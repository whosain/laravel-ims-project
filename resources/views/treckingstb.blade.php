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
            <h3 class="box-title"><b>Tracking STB</b></h3>
            <div class="box-tools pull-right">
              <button class="btn  btn-xs" data-widget="collapse" ><i class="fa fa-plus"></i></button>
            </div>
          </div>
          <div class="box-body" >
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
                <button type="button" id="btnFiterSubmitSearch" class="btn btn-default">Submit</button>
              </div>
            </div>
            <br/>
            <form id="content-form" >
              <div class="table table-bordered table-hover" style="background:#eeeeee;">
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Vendor Name</th>
                      <th>Customer</th>
                      <th>Building</th>
                      <th>Location</th>
                      <th>Product Model</th>
                      <th>Purchase Date</th>
                      <th>Mac Address</th>
                      <th>Serial Number</th>
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


  @include('tamplate.footer')
    <script type="text/javascript">


      $(":checkbox:checked").length;

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
                url: "{{ route('treckingstb.index') }}",
                data: function (d) {
                    d.customer = $('#customer').val();
                    d.building = $('#building').val();
                    d.location = $('#location').val();
                  }
              }, 
                
              columns: [
               
                {data: 'name', name: 'name'},
                {data: 'custname', name: 'custname'},
                {data: 'building_name', name: 'building_name'},
                {data: 'nama_lokasi', name: 'nama_lokasi'},
                {data: 'product_model', name: 'product_model'},
                {data: 'date', name: 'date'},
                {data: 'mac_address', name: 'mac_address'},
                {data: 'serial_number', name: 'serial_number'},
                
              ]
          });





          $( "#received" ).datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true,
          });
          
        });

       

        $('#btnFiterSubmitSearch').click(function(){
          $('#table').DataTable().draw(true);
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
            var ajaxurl = 'insertstbtrack';
            $.ajax({
              url : ajaxurl,
              type: "POST",
              data: {'id':myObj},
              dataType: "JSON",
              success: function (data) {
                alert('Berhasil');
              },
              error: function (data) {
                  alert('Gagal');
                  //console.log('Error:', data);
                  //$('#saveBtn').html('Save Changes');
              }
            });
          }
        });


      });
    </script>
  </body>    
</html>
    
    


