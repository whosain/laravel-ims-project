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
                <label>Jenis Perangkat</label>
                <select name="jenisname" id="jenisname" class="form-control input-sm" required >
                  <option value="">Select One...</option>
                  @foreach($datajenis as $item)
                    <option value="{{$item->jenisid}}">{{$item->description}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4">
                <label>Seri Perangkat</label>
                <input type="text" class="form-control" id="seri" name="seri"  placeholder="Seri Perangkat">
              </div>
              <div class="col-md-4">
                <label>Merk</label>
                <input type="text" class="form-control" id="merk" name="merk"  placeholder="Brand Perangkat">
              </div>
            </div>
            <div class="form-group has-feedback">
              <div class="col-md-4">
                <label>SN Perangkat</label>
                <input type="text" class="form-control" id="sn" name="sn"  placeholder="SN Perangkat">
              </div>
              <div class="col-md-4">
                <div class="input-group">
                  <label>Tanggal Masuk Perangkat</label>
                  <div class="input-group">
                      <input type="text" class="form-control" name="tgl_msk" id="tgl_mske"  placeholder="Recevide Date">

                      <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                      </div>
                  </div>
                </div> 
              </div>
            </div>
            <div class="form-group has-feedback">
              <div class="col-md-4">
                <label>Lokasi Perangkat</label>
                {{-- <Input type="text" name="sitename" id="sitename" readonly class="form-control input-sm" value="" required> --}}
                <select name="sitename" id="sitename" class="form-control input-xs" required placeholder="Jenis Perangkat">
                  <option value="">Pilih Lokasi Perangkat</option>
                    @foreach($datalokasi as $item)
                      <option value="{{$item->siteid}}">{{$item->sitename}}</option>
                    @endforeach
                </select> 
              </div>
              <div class="col-md-4">
                <label>Lokasi Perangkat</label>
                {{-- <Input type="text" name="sitename" id="sitename" readonly class="form-control input-sm" value="" required> --}}
                <select name="sitename" id="sitename" class="form-control input-xs" required placeholder="Jenis Perangkat">
                  <option value="">Pilih Lokasi Perangkat</option>
                    @foreach($datalokasi as $item)
                      <option value="{{$item->siteid}}">{{$item->sitename}}</option>
                    @endforeach
                </select> 
              </div>
              <div class="col-md-4">
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
              <div class="col-md-4">
                <label>Keterangan</label>
                <textarea type="text" class="form-control" id="keterangan" name="keterangan"  placeholder="keterangan"></textarea>
              </div>
            </div>
        </form>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save Change</button>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- <div class="modal fade" id="ajaxModel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="modelHeading"></h4>
          </div>
          <div class="modal-body">
            <form action="#" id="formedit" class="form-horizontal">
              <div class="box-body">
                  <div class="form-group">
                      <input type="hidden" name="id" id="id">
                      <div class="col-xs-12">
                                                  <div class="col-xs-3">
                                                      
                                                      <label>Jenis Perangkat</label>
                                                      <select name="jenisname" id="description" class="form-control input-xs" required placeholder="Jenis Perangkat">
                                                      <option value="">Choose...</option>
                                                        @foreach($datajenis as $item)
                                                          <option value="{{$item->jenisid}}">{{$item->description}}</option>
                                                        @endforeach
                                                      </select>       
                                                  </div>
                                                  <div class="col-xs-3">
                                                      <label>Seri Perangkat</label>
                                                      <input id="seri" name="seri" required placeholder="Seri Perangkat" class="form-control input-xs" type="text">
                                                  </div>
                                                  <div class="col-xs-3">
                                                      <label>Merk</label>
                                                      <input id="merk" name="merk" required placeholder="Brand Perangkat" class="form-control input-xs" type="text">
                                                  </div>
                                                  <div class="col-xs-3">
                                                      <label>SN Perangkat</label>
                                                      <input id="sn" name="sn" required placeholder="SN Perangkat" class="form-control input-xs" type="text">
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
                                                          <input type="text" class="form-control" name="tgl_mske" id="tgl_mske"  placeholder="Recevide Date">
                                                        
                                                          <div class="input-group-addon">
                                                              <i class="fa fa-calendar"></i>
                                                          </div>
                                                      </div>
                                              </br>
                                              </br>
                                              
                                              
                                                  </div>
                                                  <div class="col-xs-3">
                                                   
                                                      <label>Keterangan</label>
                                                      <textarea name="keterangan"  id="keterangan" required placeholder="Keterangan" cols="50%" class="form-control"></textarea>
                                                  </div>
                    
                        
                        
                      </div>
                </div>
            </form>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save Change</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  -->