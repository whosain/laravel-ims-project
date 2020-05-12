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
                  <select name="jenisname" id="description" class="form-control input-xs" required placeholder="Jenis Perangkat">
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
          </br>

          <button type="button" name='add' id="add" class="btn btn-primary" >Add Aset</button>
              </div>
          <div class="col-xs-3">
              <label>Lokasi Perangkat</label>
              {{-- <Input type="text" name="sitename" id="sitename" readonly class="form-control input-sm" value="" required> --}}
              <select name="sitename" id="sitename" class="form-control input-xs" required placeholder="Jenis Perangkat">
                <option value="">Pilih Lokasi Perangkat</option>
                  @foreach($datalokasi as $item)
                    <option value="{{$item->siteid}}">{{$item->sitename}}</option>
                  @endforeach
              </select>  
          </div>    
          <div class="col-xs-3">
              <label class="input-group locaset" >Lokasi Aset</label><!--Internal -->
              <select name="sitename" id="sitename" class="form-control input-xs" required placeholder="Jenis Perangkat">
                <option value="">Pilih Lokasi Aset</option>
                  @foreach($datalokasi as $item)
                    <option value="{{$item->siteid}}">{{$item->location}}</option>
                  @endforeach
              </select> 
              {{-- <input type="text" class="form-control input-sm lokaset" readonly width="100%" id="lokaset" name="location" required value="" placeholder="Input Lokasi"  /><!--Internal --> --}}
              <input type="hidden" class="form-control input-sm" id="customno" name="customno" readonly required value="" placeholder="Customer No" />
              <input type="hidden" class="form-control input-sm" id="siteid"name="siteid" required placeholder="Site Id" />               
          </div>
          <div class="col-xs-3">
              <label>Keterangan</label>
              <textarea name="keterangan" required placeholder="Keterangan" cols="50%" class="form-control"></textarea>
          </div>

        </div>
      </div>
    </form>
  </div><!-- /.box-body -->
</div>