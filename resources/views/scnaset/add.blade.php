<div class="box" >
  <div class="box-header with-border">
    <h3 class="box-title"><b>Add Aset SCN</b></h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body" style="display: block;">
    <form action="#" id="form1">
      {{ csrf_field() }} {{ method_field('POST') }}
      <div class="form-row" id="collapse_form">
        <div class="form-group">
          <div class="col-xs-12">
              <div class="col-xs-3">                  
                  <label>Jenis Perangkat</label>
                  <select name="jenisname" id="jenisname" class="form-control input-xs" required placeholder="Jenis Perangkat">
                  <option value="">Pilih Jenis Perangkat</option>
                    @foreach($datajenis as $item)
                      <option value="{{$item->jenisid}}">{{$item->description}}</option>
                    @endforeach
                  </select>       
              </div>
              <div class="col-xs-3">
                  <label>Seri Perangkat</label>
                  <input name="seri" required placeholder="Seri Perangkat" class="form-control input-xs" type="text">
              </div>
              <div class="col-xs-3">
                  <label>Merk</label>
                  <input name="merk" required placeholder="Brand Perangkat" class="form-control input-xs" type="text">
              </div>
              <div class="col-xs-3">
                  <label>SN Perangkat</label>
                  <input name="sn" required placeholder="SN Perangkat" class="form-control input-xs" type="text">
              </div>
          </div>
          <br />
          <br />
          <br />
          <br />
          <br />
          {{-- <div class="col-xs-12"> --}}
              <div class="col-xs-3">
                  <label>Tanggal Masuk Perangkat</label>
                  <div class="input-group">
                      <input name="tgl_msk" id="tgl_msk" required readonly placeholder="Tanggal Masuk Perangkat" class="form-control input-xs" type="text">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                  </div>
                 
              </div>
          <div class="col-md-3">
             <label>Lokasi Perangkat</label>
             <select class="location form-control" name="location" id="location"></select>
          </div>
          <div class="col-xs-3">
              <label>PIC Install</label>
              {{-- <Input type="text" name="sitename" id="sitename" readonly class="form-control input-sm" value="" required> --}}
              <select name="picinstall" id="picinstall" class="form-control input-xs" required>
                <option value="">Pilih</option>
                <option value="Gunawan">Gunawan</option>
                <option value="Helmi">Helmi</option>
                <option value="Haekal">Haekal</option>
                <option value="Dikdo">Dikdo</option>
                  {{-- @foreach($datainstall as $item)
                    <option value="{{$item->id}}">{{$item->pic_install}}</option>
                  @endforeach --}}
              </select>  
          </div>
          {{-- <br /> --}}
          {{-- <br />  --}}
          <div class="col-xs-3">
            <label>Tanggal Install</label>
            <div class="input-group">
                <input name="tglinstall" id="tglinstall" required readonly placeholder="Tanggal Install" class="form-control input-xs" type="text">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
            </div>
        </div>
        <br />
        <br />    
        <br />    
        <br />    
          <div class="col-xs-3">
              <label class="input-group locaset" >PIC Dismantle</label><!--Internal -->
              <select name="picdismantle" id="picdismantle" class="form-control input-xs" required>
                <option value="">Pilih</option>
                <option value="Gunawan">Gunawan</option>
                <option value="Helmi">Helmi</option>
                <option value="Haekal">Haekal</option>
                <option value="Dikdo">Dikdo</option>
                  {{-- @foreach($datadismental as $item)
                    <option value="{{$item->id}}">{{$item->pic_dismental}}</option>
                  @endforeach --}}
              </select> 
              {{-- <input type="text" class="form-control input-sm lokaset" readonly width="100%" id="lokaset" name="location" required value="" placeholder="Input Lokasi"  /><!--Internal --> --}}
              <input type="hidden" class="form-control input-sm" id="customno" name="customno" readonly required value="" placeholder="Customer No" />
              <input type="hidden" class="form-control input-sm" id="siteid"name="siteid" required placeholder="Site Id" />               
         
              <br />
              <button type="button" name='add' id="add" class="btn btn-primary" >Add Aset</button>
          </div>
          {{-- <br />
    
          <br />
          <br /> --}}
          <div class="col-xs-3">
            <label>Tanggal Dismantle</label>
            <div class="input-group">
                <input name="tgldismantle" id="tgldismantle" required readonly placeholder="Tanggal Dismantle" class="form-control input-xs" type="text">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
            </div>
            <br />
          </div> 
          <br />
          {{-- <br />  --}}
          
          

          
       
        </div>
      </div>
    </form>
  </div><!-- /.box-body -->
</div>