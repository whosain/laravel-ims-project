<div class="box" >
    <div class="box-header with-border">
      <h3 class="box-title"><b>Add Customer</b></h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body" style="display: block;">
      <form action="#" id="form1">
        <div class="form-row" id="collapse_form">
          <div class="form-group">
            <div class="col-md-4">
              <label>Company  Name</label>
              <select name="company" id="company" class="form-control input-sm" required >
                <option value="">Choose...</option>
                @foreach($company as $item)
                  <option value="{{$item->id}}">{{$item->company_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4">
              <label>Customer Name</label>
              <input type="text" class="form-control" name="customer_name"  placeholder="Customer Name">
            </div>
            <div class="col-md-4">
              <label>Customer Short Name</label>
              <input type="text" class="form-control" name="customer_short"  placeholder="Customer Short Name">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              <label>Phone</label>
              <input type="text" class="form-control" name="phone"  placeholder="Phone Number">
            </div>
            <div class="col-md-4">
              <label>Address</label>
              <textarea type="text" class="form-control" name="address"  placeholder="Address"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
              <label>Note</label>
              <textarea type="text" class="form-control" name="note"  placeholder="Note"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group col-md-6">
                <button type="button" id="add" class="btn btn-primary" id="add">Add Customer</button>
            </div> 
          </div>
        </div>
      </form>
    </div><!-- /.box-body -->
  </div>