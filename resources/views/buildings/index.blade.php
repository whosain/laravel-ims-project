@include('tamplate.headerhome')

<div class="content-wrapper" style="min-height: 1200px;">
    <section class="content">
        @include('buildings.add')

        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Data Building</b></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            
            <div class="table table-bordered table-hover" style="background:#eeeeee;">
              <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Building Name</th>
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
@include('buildings.edit')
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
              ajax: "{{ route('showBuildings') }}",
              columns: [
                {data: 'id', name: 'id'},
                {data: 'building_name', name: 'building_name'},
                {data: 'action', name: 'action'},
              ]
          });
          
        });

        $(document).on('click', '#add', function (){  
          
          
          var ajaxurl = 'addBuilding';
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


        $('body').on('click', '.editBuilding', function () {
          var id = $(this).data('id');
          $.get("{{ route('buildingView.index') }}" +'/' + id +'/edit', function (data) {
              $('.modal-dialog').css({width:'90%',height:'auto', 'max-height':'100%'});
              $('#modelHeading').html("Edit Building");
              $('#saveBtn').val("edit-user");
              $('#ajaxModel').modal('show');
              $('#id').val(data.id);

              $('#building_name').val(data.building_name);
          })
        });


        $('#saveBtn').click(function (e) {

        
                e.preventDefault();
                $(this).html('Sending..');

                $.ajax({
                data: $('#formedit').serialize(),
                url: "{{ route('updateBuilding.store') }}",
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


        $('body').on('click', '.deleteBuilding', function () {
     
        var id = $(this).data("id");
        confirm("Are You sure want to delete !");
    
        $.ajax({
            type: "DELETE",
            url: "{{ route('deleteBuilding.store') }}"+'/'+id,
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

