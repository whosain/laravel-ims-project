@include('tamplate.headerhome')

<div class="content-wrapper" style="min-height: 1200px;">
    <section class="content">
        @include('companies.add')

        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Data Company</b></h3>
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
                      <th>ID</th>
                      <th>Company Name</th>
                      <th>Company Alias</th>
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
@include('companies.edit')
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
              ajax: "{{ route('showCompany') }}",
              columns: [
                {data: 'id', name: 'id'},
                {data: 'company_name', name: 'company_name'},
                {data: 'company_alias', name: 'company_alias'},
                {data: 'action', name: 'action'}
              ]
          });
          
        });

        $(document).on('click', '#add', function (){  
          
          
          var ajaxurl = 'addCompany';
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


        $('body').on('click', '.editCompany', function () {
          var id = $(this).data('id');
          $.get("{{ route('companyViews.index') }}" +'/' + id +'/edit', function (data) {
              $('.modal-dialog').css({width:'90%',height:'auto', 'max-height':'100%'});
              $('#modelHeading').html("Edit Company");
              $('#saveBtn').val("edit-user");
              $('#modal-form').modal('show');
              $('#id').val(data.id);

              $('#company_name').val(data.company_name);
              $('#company_alias').val(data.company_alias);
          })
        });


        $('#saveBtn').click(function (e) {

        
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                data: $('#form-item').serialize(),
                url: "{{ route('updateCompany.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#form-item').trigger("reset");
                    $('#modal-form').modal('hide');
                    $('#table').DataTable().ajax.reload();
                
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });


        $('body').on('click', '.deleteCompany', function () {
     
        var id = $(this).data("id");
        confirm("Are You sure want to delete !");
    
        $.ajax({
            type: "DELETE",
            url: "{{ route('deleteCompany.store') }}"+'/'+id,
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

