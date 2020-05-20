@include('tamplate.headerhome')
    <div class="content-wrapper" style="min-height: 1200px;">
      <section class="content">

          <div class="box collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah SCN</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body" style="display: block;">
            <form action="#" id="form1" class="form-horizontal">
                                <div class="col-xs-12">
                                    <div class="col-xs-3">
                                        <input type="hidden" name="createdby" value="<?php echo $this->session->userdata('user_id'); ?>">
                                        <label>Jenis Perangkat</label>
                                        <select name="jenis" id="jenis" class="form-control input-xs" required placeholder="Jenis Perangkat">
                                            <option value="">Select One...</option>
                                            <?php foreach($data->result() as $row):?>
                                            <option value="<?php echo $row->jenisid;?>"><?php echo $row->description;?></option>
                                            <?php endforeach;?>
                                        </select>       
                                    </div>
                                    <div class="col-xs-3">
                                        <label>Nama Perangkat</label>
                                        <input name="serper" required placeholder="Nama Perangkat" class="form-control input-xs" type="text">
                                    </div>
                                    <div class="col-xs-3">
                                        <label>Brand Perangkat</label>
                                        <input name="merper" required placeholder="Brand Perangkat" class="form-control input-xs" type="text">
                                    </div>
                                    <div class="col-xs-3">
                                        <label>SN Perangkat</label>
                                        <input name="snper" required placeholder="SN Perangkat" class="form-control input-xs" type="text">
                                    </div>
                                </div>
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <div class="col-xs-12">
                                    <div class="col-xs-3">
                                        <label>Tanggal Masuk Perangkat</label>
                                        <div class="input-group">
                                            <input name="tgl" id="tgl" required readonly placeholder="Tanggal Masuk Perangkat  (yyyy-mm-dd)" class="form-control input-xs" type="text">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <!-- <label>Jumlah Perangkat</label>
                                        <input name="jmlper" required placeholder="Jumlah Perangkat" class="form-control input-sm" type="number"> -->
                                        <label>Keterangan</label>
                                        <textarea name="keterangan" required placeholder="Keterangan" cols="50%" class="form-control"></textarea>
                                    </div>
                                    <div class="col-xs-3">
                                        <!-- <label>Keterangan</label>
                                        <textarea name="keterangan" required placeholder="Keterangan" cols="50%" class="form-control"></textarea> -->
                                    </div>
                                    <div class="col-xs-3">
                                    </div>
                                </div>
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <div class="col-xs-12">
                                    <div class="col-xs-3">
                                        <label>Lokasi Aset *</label>
                                        <select name="statuscust" id="statuscust" class="form-control input-sm" required onchange="hide()">
                                            <option value="">Select One...</option>
                                            <option value="I">Internal</option>
                                            <option value="E">External</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <label class="input-group ngumpet" style="display:none;">Search Location *</label><!--Exsternal -->
                                        <label class="input-group ngumpet1" style="display:none;">Search Location *</label><!--Internal -->
                                        <input type="text" class="form-control input-xs custname" id="custname" name="custname" required style="display:none;" placeholder="Search Location Exsternal" /><!--Exsternal -->
										<div class="input-group">
											<input type="text" class="form-control input-xs cust1" id="cust1" name="custname" required style="display:none;" placeholder="Search Location Internal" /><!--Internal -->
											<div id="ngumpet" class="input-group-addon ngumpet" style="display:none;">
												<button type="button" id="submit" class="btn btn-default btn-xs" name="Search" onclick="wawa()"><i class="fa fa-search input-xs"> Search</i></button> <!--Exsternal -->
											</div>
											<div id="ngumpet2" class="input-group-addon ngumpet1" style="display:none;">
												<button type="button" id="submit" class="btn btn-default btn-xs" name="Search" onclick="wawa1()"><i class="fa fa-search input-xs"> Search</i></button> <!--Internal -->
											</div>
										</div>
                                    </div>
                                    <script type="text/javascript">
                                        function wawa() {

                                          var variable = document.getElementById('custname').value;
                                          
                                            $.ajax({
                                                url : "<?php echo site_url('Caset/ajax_edit2/')?>/",
                                                type: "GET",
                                                data :{'cust' : variable},
                                                dataType: "JSON",
                                                success: function(data)
                                                {
                                                    $('[name="custname"]').val(data.sitename);
                                                    $('[name="customerno"]').val(data.customerno);
                                                    $('[name="siteid"]').val(data.siteid);
                                                },
                                                error: function (jqXHR, textStatus, errorThrown)
                                                {
                                                    alert('Error get data from ajax');
                                                }
                                            });
                                        }

                                        function wawa1() {

                                          var variable = document.getElementById('cust1').value;
                                          
                                            $.ajax({
                                                url : "<?php echo site_url('Caset/ajax_edit2/')?>/",
                                                type: "GET",
                                                data :{'cust' : variable},
                                                dataType: "JSON",
                                                success: function(data)
                                                {
                                                    $('[name="custname"]').val(data.sitename);
                                                    $('[name="customerno"]').val(data.customerno);
                                                    $('[name="siteid"]').val(data.siteid);
                                                },
                                                error: function (jqXHR, textStatus, errorThrown)
                                                {
                                                    alert('Error get data from ajax');
                                                }
                                            });
                                        }
                                    </script>
                                    <div class="col-xs-3">
                                        <label class="input-group ngumpet" style="display:none;">Location Aset *</label><!--Exsternal -->
                                        <input type="text" class="form-control input-xs custname" width="100%" id="custname" name="custname" required value="" placeholder="Nama Location" style="display:none;" /><!--Exsternal -->
                                        <label class="input-group ngumpet1" style="display:none;">Location Aset *</label><!--Internal -->
                                        <input type="text" class="form-control input-xs custname1" width="100%" id="custname1" name="custname" required value="" placeholder="Nama Location" style="display:none;" /><!--Internal -->
                                        <input type="hidden" class="form-control input-xs" id="customerno" name="customerno" readonly required value="" placeholder="Customer No" />
                                        <input type="hidden" class="form-control input-xs" id="siteid"name="siteid" required placeholder="Site Id" />     
                                    </div>
                                    <script type="text/javascript">   
                                        function hide()
                                        {
                                            var x = document.getElementById("statuscust").value;
                                            if (x != "")
                                            {
                                                if (x == "E")
                                                {
                                                    $("#custname").show();
                                                    $(".custname").show();
                                                    $("#ngumpet").show();
                                                    $(".ngumpet").show();
                                                }
                                                else
                                                {
                                                    $("#custname").hide();
                                                    $(".custname").hide();
                                                    $("#ngumpet").hide();
                                                    $(".ngumpet").hide();
                                                }
                                            }
                                            else
                                            {
                                                $("#custname").hide();
                                                $(".custname").hide();
                                                $("#ngumpet").hide();
                                                $(".ngumpet").hide();
                                            }

                                            if (x != "")
                                            {
                                                if (x == "I")
                                                {
                                                    $("#cust1").show();
                                                    $(".custname1").show();
                                                    $("#ngumpet1").show();
                                                    $(".ngumpet1").show();
                                                }
                                                else
                                                {
                                                    $("#cust1").hide();
                                                    $(".custname1").hide();
                                                    $("#ngumpet1").hide();
                                                    $(".ngumpet1").hide();
                                                }
                                            }
                                            else
                                            {
                                                $("#cust1").hide();
                                                $(".custname1").hide();
                                                $("#ngumpet1").hide();
                                                $(".ngumpet1").hide();
                                            }

                                        }

                                    </script>
                                </div>  
                            </form>
            </div><!-- /.box-body -->
          </div>




        <div class="box ">
          <div class="box-header with-border">
            <h3 class="box-title"><b>List SCN</b></h3>
            <div class="box-tools pull-right">
              <button class="btn  btn-xs" data-widget="collapse" ><i class="fa fa-plus"></i></button>
            </div>
          </div>
          <div class="box-body" style="display: block;">
            <div class="table table-bordered table-hover" style="background:#eeeeee;">
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Site Id</th>
                        <th>Merek</th>
                        <th>Seri</th>
                        <th>SN</th>
                        <th>Jumlah</th>
                        <th>Kembali</th>
                        <th>Tanggal Kembali</th>
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
              ajax: "{{ route('scn.index') }}",
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
          var ajaxurl = 'insertscn';
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
          $.get("{{ route('scn_view.index') }}" +'/' + id +'/edit', function (data) {
              $('.modal-dialog').css({width:'90%',height:'auto', 'max-height':'100%'});
              $('#modelHeading').html("Edit SCN");
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
            url: "{{ route('scn_upd.store') }}",
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
              url: "{{ route('scn_del.store') }}"+'/'+id,
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
    
    


