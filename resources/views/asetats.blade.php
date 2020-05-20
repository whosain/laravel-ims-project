@include('tamplate.headerhome')
    <div class="content-wrapper" style="min-height: 1200px;">
        <section class="content">
            <div class="col-lg-12" >
                <section style="width:100%;">
                    <div class="box box-solid box-info ">
                        <div class="box-header with-border">
                            <h3 class="box-title"><b>Master Aset</b></h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-info btn-xs" data-widget="box" onclick="add_person()"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="collapse fade" id="collapse_form" role="dialog">
                            <div class="collapse-dialog">
                                <div class="collapse-content" >
                                    <div class="box-body form">
                                        <form action="#" id="form1" class="form-horizontal">
                                            <div class="col-xs-12">
                                                <div class="col-xs-3">
                                                    <input type="hidden" name="createdby" value="">
                                                    <label>Jenis Perangkat</label>
                                                    <select name="jenis" id="jenis" class="form-control input-xs" required placeholder="Jenis Perangkat">
                                                        <option value="">Select One...</option>
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
                                                    <label>Keterangan</label>
                                                    <textarea name="keterangan" required placeholder="Keterangan" cols="50%" class="form-control"></textarea>
                                                </div>
                                                <div class="col-xs-3">
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
                                                            url : "",
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
                                                            url : "",
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
                                    </div> 
                                </div>
                                <div class="box-footer">
                                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary btn-xs">Save</button>
                                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="collapse">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <section class="container" style="width:100%;">
                        <div class="box box-solid box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title"><b>View List Master Aset</b></h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-info btn-xs" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <!--<label for="billcycle">Billing Cycle :</label>-->
                                        <select name="jenisid" for="jenisid" id="jenisid" class="form-control input-sm" required>
                                            <option value="">-FILTER Jenis Perangkat-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <select name="location" for="location" id="location" class="form-control input-sm" required>
                                            <option value="">-FILTER Lokasi Aset-</option>
                                            <option value="I">Internal</option>
                                            <option value="E">External</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table table-bordered table-hover" style="background:#eeeeee;">
                                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Jenis</th>
                                                <th>Nama</th>
                                                <th>Location</th>
                                                <th style="width:125px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>

@include('tamplate.footer')
<script type="text/javascript">

var save_method; //for save method string
var table;
$(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
});

$(document).ready(function(){
    $("#custname").autocomplete({
        source: ""
    });
});

$(document).ready(function(){
    $("#cust1").autocomplete({
        source:""
    });
});

$('body').on('focus',"#tgl", function(){
    $(this).datepicker({
        dateFormat: 'yy-mm-dd',
        showOtherMonths: true,
        changeMonth: true,
        changeYear: true,
        selectOtherMonths: true,
        required: true,
        showOn: "focus",
        numberOfMonths: 1,
    });
}); 

$(document).ready(function($) {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        'serverMethod': 'post',
        "language": 
        { 
          "processing": "Mohon tunggu sebentar sedang memproses data..."
        },
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "",
            "type": "POST",
            "data": function ( data ) {
                data.jenisid = $('#jenisid').val();
                //alert($('#jenis').val());
                data.location = $('#location').val();
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
    });

    $('#jenisid').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });

    $('#location').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });
});

$('body').on('focus',"#tgl", function(){
    $(this).datepicker({
        dateFormat: 'yy-mm-dd',
        showOtherMonths: true,
        changeMonth: true,
        selectOtherMonths: true,
        required: true,
        showOn: "focus",
        numberOfMonths: 1,
    });
}); 


function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#collapse_form').collapse('show'); // show bootstrap modal
    //$('.collapse-title').text('Add Customer'); // Set Title to Bootstrap modal title
}

$(document).ready(function(){
    $( "#custname1" ).autocomplete({
        source: ""
    });
});

function edit_person(asetid)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.modal-dialog').css({width:'90%',height:'auto', 'max-height':'90%'});

    //Ajax Load data from ajax
    $.ajax({
        url : "",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="asetid1"]').val(data.asetid);
            $('[name="jenis1"]').val(data.jenisid);
            $('[name="serper1"]').val(data.seri);
            $('[name="merper1"]').val(data.merk);
            $('[name="snper1"]').val(data.sn);
            $('[name="jmlper1"]').val(data.jumlah);
            $('[name="keterangan1"]').val(data.keterangan);
            $('[name="statuscuste"]').val(data.location);
            $('[name="customerno"]').val(data.customerno);
            $('[name="siteid"]').val(data.siteid);
            $('[name="custname"]').val(data.sitename);
            $('#modal1_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Aset'); // Set title to Bootstrap modal title

            var x = data.location;
            if (x != "")
            {
                if (x == "E")
                {
                    $("#custnamee").show();
                    $(".custnamee").show();
                    $("#ngumpete").show();
                    $(".ngumpete").show();
                }
                else
                {
                    $("#custnamee").hide();
                    $(".custnamee").hide();
                    $("#ngumpete").hide();
                    $(".ngumpete").hide();
                }
            }
            else
            {
                $("#custnamee").hide();
                $(".custnamee").hide();
                $("#ngumpete").hide();
                $(".ngumpete").hide();
            }
            if (x != "")
            {
                if (x == "I")
                {
                    $("#cust1e").show();
                    $(".custname1e").show();
                    $("#ngumpet1e").show();
                    $(".ngumpet1e").show();
                }
                else
                {
                    $("#cust1e").hide();
                    $(".custname1e").hide();
                    $("#ngumpet1e").hide();
                    $(".ngumpet1e").hide();
                }
            }
            else
            {
                $("#cust1e").hide();
                $(".custname1e").hide();
                $("#ngumpet1e").hide();
                $(".ngumpet1e").hide();
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}


function view_aset(asetid)
{
    //save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.modal-dialog').css({width:'90%',height:'auto', 'max-height':'90%'});

    //Ajax Load data from ajax
    $.ajax({
        url : "",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="asetid1"]').val(data.asetid);
            $('[name="jenis1"]').val(data.jenisname);
            $('[name="serper1"]').val(data.seri);
            $('[name="merper1"]').val(data.merk);
            $('[name="snper1"]').val(data.sn);
            $('[name="jmlper1"]').val(data.jumlah);
            $('[name="keterangan1"]').val(data.keterangan);
            //$('[name="statuscuste"]').val(data.location);
            $('[name="customerno"]').val(data.customerno);
            $('[name="siteid"]').val(data.siteid);
            $('[name="custname"]').val(data.sitename);
            $('#modal_view').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('View Aset'); // Set title to Bootstrap modal title

            var y =data.location;
            if (y == "I") 
            {
                document.getElementById("statuscuste1").value = "Internal";
            }
            else
            {
                document.getElementById("statuscuste1").value = "External";
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function edit_aset(asetid)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.modal-dialog').css({width:'95%',height:'auto', 'max-height':'100%'});

    //Ajax Load data from ajax
    $.ajax({
        url : "",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="asetid1"]').val(data.asetid);
            $('[name="jenis1"]').val(data.jenisid);
            $('[name="serper1"]').val(data.seri);
            $('[name="merper1"]').val(data.merk);
            $('[name="snper1"]').val(data.sn);
            $('[name="jmlper1"]').val(data.jumlah);
            $('[name="keterangan1"]').val(data.keterangan);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Aset'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

        url = "";
        url1 = "";
    // ajax adding data to database
 
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form1').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#collapse_form').collapse('hide');
                reload_table();
                $('#form1')[0].reset(); 
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        }
    });
}


function update()
{
    $('#btnupdate').text('UPDATING...'); //change button text
    $('#btnupdate').attr('disabled',true); //set button disable 
    var url;

        url = "";

    //ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal1_form').modal('hide');
                reload_table();
            }
            $('#btnupdate').text('UPDATING...'); //change button text
            $('#btnUpdate').attr('disabled',false); //set button enable 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnupdate').text('UPDATE...'); //change button text
            $('#btnupdate').attr('disabled',false); //set button enable 
        }
    });
}


function del()
{
    var url;
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#del').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_del').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnupdate').text('UPDATING...'); //change button text
            $('#btnUpdate').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnupdate').text('UPDATE...'); //change button text
            $('#btnupdate').attr('disabled',false); //set button enable 

        }
    });
}

function delete_person(asetid)
{
    // ajax delete data to database
    save_method = 'update';
    $('#del')[0].reset();
    //$('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('.modal-dialog').css({width:'70%',height:'auto', 'max-height':'70%'});

    //Ajax Load data from ajax
    $.ajax({
        url : "" + asetid,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="asetid2"]').val(data.asetid);
            $('#modal_del').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Delete Aset'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal1_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                <h3 class="modal-title">Aset Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-3">
                                <input type="hidden" name="createdby" value="">
                                <input type="hidden" name="asetid1">
                                <label>Jenis Perangkat</label>
                                <select name="jenis1" id="jenis" class="form-control input-sm" required placeholder="Jenis Perangkat">
                                    <option value="">Select One...</option>
                                </select>       
                            </div>
                            <div class="col-xs-3">
                                <label>Nama Perangkat</label>
                                <input name="serper1" required placeholder="Nama Perangkat" class="form-control input-sm" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Brand Perangkat</label>
                                <input name="merper1" required placeholder="Brand Perangkat" class="form-control input-sm" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>SN Perangkat</label>
                                <input name="snper1" required placeholder="SN Perangkat" class="form-control input-sm" type="text">
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-3">
                                <!-- <label>Jumlah Perangkat</label>
                                <input name="jmlper1" required placeholder="Jumlah Perangkat" class="form-control input-sm" type="number"> -->
                                <label>Keterangan</label>
                                <textarea name="keterangan1" required placeholder="Keterangan" cols="50%" class="form-control"></textarea>
                            </div>
                            <div class="col-xs-3">
                                <!-- <label>Keterangan</label>
                                <textarea name="keterangan1" required placeholder="Keterangan" cols="50%" class="form-control"></textarea> -->
                            </div>
                            <div class="col-xs-3">

                            </div>
                            <div class="col-xs-3">
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-3">
                                <label>Lokasi Perangkat *</label>
                                <select name="statuscuste" id="statuscuste" class="form-control input-sm" required onchange="hide1()">
                                    <option value="">Select One...</option>
                                    <option value="I">Internal</option>
                                    <option value="E">External</option>
                                </select>
                            </div>
                            <script type="text/javascript">
                                function hide1()
                                    {
                                        var x = document.getElementById("statuscuste").value;
                                        if (x != "")
                                        {
                                            if (x == "E")
                                            {
                                                $("#custnamee").show();
                                                $(".custnamee").show();
                                                $("#ngumpete").show();
                                                $(".ngumpete").show();
                                            }
                                            else
                                            {
                                                $("#custnamee").hide();
                                                $(".custnamee").hide();
                                                $("#ngumpete").hide();
                                                $(".ngumpete").hide();
                                            }
                                        }
                                        else
                                        {
                                            $("#custnamee").hide();
                                            $(".custnamee").hide();
                                            $("#ngumpete").hide();
                                            $(".ngumpete").hide();
                                        }

                                        if (x != "")
                                        {
                                            if (x == "I")
                                            {
                                                $("#cust1e").show();
                                                $(".custname1e").show();
                                                $("#ngumpet1e").show();
                                                $(".ngumpet1e").show();
                                            }
                                            else
                                            {
                                                $("#cust1e").hide();
                                                $(".custname1e").hide();
                                                $("#ngumpet1e").hide();
                                                $(".ngumpet1e").hide();
                                            }
                                        }
                                        else
                                        {
                                            $("#cust1e").hide();
                                            $(".custname1e").hide();
                                            $("#ngumpet1e").hide();
                                            $(".ngumpet1e").hide();
                                        }
                                    }
                            </script>
                            <div class="col-xs-3">
                                <label class="input-group ngumpete" style="display:none;">Search Location *</label><!--Exsternal -->
                                <label class="input-group ngumpet1e" style="display:none;">Search Location *</label><!--Internal -->
                                <input type="text" class="form-control input-sm-4 custnamee" id="custnamee" name="custname" required style="display:none;" placeholder="Search Location Exsternal" /><!--Exsternal -->
                                <input type="text" class="form-control input-sm-4 cust1e" id="cust1e" name="custname" required style="display:none;" placeholder="Search Location Internal" /><!--Internal -->
                                <div id="ngumpet" class="input-group-addon ngumpete" style="display:none;">
                                    <button type="button" id="submit" class="btn btn-default btn-xs" name="Search" onclick="waw()"><i class="fa fa-search input-xs"> Search</i></button> <!--Exsternal -->
                                </div>
                                <div id="ngumpet2" class="input-group-addon ngumpet1e" style="display:none;">
                                    <button type="button" id="submit" class="btn btn-default btn-xs" name="Search" onclick="waw1()"><i class="fa fa-search input-xs"> Search</i></button> <!--Internal -->
                                </div>               
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function(){
                                    $("#custnamee").autocomplete({
                                        source: "",
                                        appendTo : modal1_form
                                    });
                                    
                                });

                                $(document).ready(function(){
                                    $("#cust1e").autocomplete({
                                        source:"",
                                        appendTo : modal1_form
                                    });
                                    
                                });
                            </script>    
                            <div class="col-xs-3">
                                <label class="input-group ngumpete" style="display:none;">Location Aset *</label><!--Exsternal -->
                                <input type="text" class="form-control input-sm custnamee" width="100%" id="custnamee" name="custname" required value="" placeholder="Nama Location" style="display:none;" /><!--Exsternal -->
                                <label class="input-group ngumpet1e" style="display:none;">Location Aset *</label><!--Internal -->
                                <input type="text" class="form-control input-sm custname1e" width="100%" id="custname1e" name="custname" required value="" placeholder="Nama Location" style="display:none;" /><!--Internal -->
                                <input type="hidden" class="form-control input-sm" id="customerno" name="customerno" readonly required value="" placeholder="Customer No" />
                                <input type="hidden" class="form-control input-sm" id="siteid"name="siteid" required placeholder="Site Id" />               
                            </div>
                            <script type="text/javascript">
                                function waw() {

                                  var variable = document.getElementById('custnamee').value;
                                  //alert(document.getElementById('custnamee').value);
                                    $.ajax({
                                        url : "" ,
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
                                
                                function waw1() {

                                  var variable = document.getElementById('cust1e').value;
                                  //alert(document.getElementById('cust1e').value);
                                    $.ajax({
                                        url : "" ,
                                        type: "GET",
                                        data :{'cust' : variable},
                                        dataType: "JSON",
                                        success: function(data)
                                        {
                                            /*alert(data.sitename);
                                            return false;*/
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
                        </div>
                    </div>  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnUpdate" onclick="update()" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<!-- Bootstrap modal -->
<div class="modal fade" id="modal_del" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                <h3 class="modal-title">Aset Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="del" class="form-horizontal">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-3">
                                <input type="hidden" name="createdby" value="">
                                <input type="hidden" name="asetid2" name="asetid2">
                                <label>Keterangan</label>
                                <textarea name="alasan" id="alasan" style="resize:none;width:400px;height:150px;" class="form-control input-sm" required placeholder="Keterangan"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    <br />
                    <br />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="Delete" onclick="del()" class="btn btn-primary">Delete</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div> <!--/.modal-content -->
    </div><!--/.modal-dialog -->
</div> <!--/.modal -->
<!-- End Bootstrap modal --> 



<!-- Bootstrap modal -->
<div class="modal fade" id="modal_view" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                <h3 class="modal-title">Aset Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-3">
                                <input type="hidden" name="createdby" value="">
                                <input type="hidden" name="asetid1">
                                <label>Jenis Perangkat</label>
                                <input name="jenis1" id="jenis" readonly class="form-control input-sm" required placeholder="Jenis Perangkat">       
                            </div>
                            <div class="col-xs-3">
                                <label>Nama Perangkat</label>
                                <input name="serper1" required placeholder="Nama Perangkat" readonly class="form-control input-sm" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>Brand Perangkat</label>
                                <input name="merper1" required placeholder="Brand Perangkat" readonly class="form-control input-sm" type="text">
                            </div>
                            <div class="col-xs-3">
                                <label>SN Perangkat</label>
                                <input name="snper1" required placeholder="SN Perangkat" readonly class="form-control input-sm" type="text">
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-3">
                                <!-- <label>Jumlah Perangkat</label>
                                <input name="jmlper1" required placeholder="Jumlah Perangkat" class="form-control input-sm" type="number"> -->
                                <label>Keterangan</label>
                                <textarea name="keterangan1" required placeholder="Keterangan" readonly cols="50%" class="form-control"></textarea>
                            </div>
                            <div class="col-xs-3">
                                <!-- <label>Keterangan</label>
                                <textarea name="keterangan1" required placeholder="Keterangan" cols="50%" class="form-control"></textarea> -->
                            </div>
                            <div class="col-xs-3">

                            </div>
                            <div class="col-xs-3">
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-xs-3">
                                <label>Lokasi Perangkat *</label>
                                <Input type="text" name="statuscuste1" id="statuscuste1" readonly class="form-control input-sm" value="" required>
                            </div>    
                            <div class="col-xs-3">
                                <label class="input-group ngumpet1e" >Location Aset *</label><!--Internal -->
                                <input type="text" class="form-control input-sm custname1e" readonly width="100%" id="custname1e" name="custname" required value="" placeholder="Nama Location"  /><!--Internal -->
                                <input type="hidden" class="form-control input-sm" id="customerno" name="customerno" readonly required value="" placeholder="Customer No" />
                                <input type="hidden" class="form-control input-sm" id="siteid"name="siteid" required placeholder="Site Id" />               
                            </div>
                        </div>
                    </div>  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->