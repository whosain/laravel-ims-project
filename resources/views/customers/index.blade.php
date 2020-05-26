@include('tamplate.headerhome')

<div class="content-wrapper" style="min-height: 1200px;">
    <section class="content">
        @include('customers.add')

        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Data Cutomers</b></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="table table-bordered table-hover" style="background:#eeeeee;">
              <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Company Name</th>
                      <th>Customer Name</th>
                      <th>Customer Alias</th>
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
@include('customers.edit')
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
              ajax: "{{ route('showCustomers') }}",
              columns: [
                {data: 'id', name: 'id'},
                {data: 'company_name', name: 'company_name'},
                {data: 'name', name: 'name'},
                {data: 'name_short', name: 'name_short'},
                {data: 'action', name: 'action'},
              ]
          });
          
        });

        $(document).on('click', '#add', function (){  
          
          
          var ajaxurl = 'addCustomer';
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


        $('body').on('click', '.editCustomer', function () {
          var id = $(this).data('id');
          $.get("{{ route('customerView.index') }}" +'/' + id +'/edit', function (data) {
              $('.modal-dialog').css({width:'90%',height:'auto', 'max-height':'100%'});
              $('#modelHeading').html("Edit Customer");
              $('#saveBtn').val("edit-user");
              $('#ajaxModel').modal('show');
              $('#id').val(data.id);

              $('#company').val(data.company_id);
              $('#customer_name').val(data.name);
              $('#customer_short').val(data.name_short);
              $('#phone').val(data.phone);
              $('#address').val(data.address);
              $('#note').val(data.notes);
          })
        });


        $('#saveBtn').click(function (e) {

        
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
            data: $('#formedit').serialize(),
            url: "{{ route('updateCustomer.store') }}",
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


        $('body').on('click', '.deleteCustomer', function () {
     
            var id = $(this).data("id");
            confirm("Are You sure want to delete !");
        
            $.ajax({
                type: "DELETE",
                url: "{{ route('deleteCustomer.store') }}"+'/'+id,
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

