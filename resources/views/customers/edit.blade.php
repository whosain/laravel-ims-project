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
                  <label>Company  Name</label>
                  <select name="company" id="company" class="form-control input-sm" required >
                    <option value="">Select One...</option>
                    @foreach($company as $item)
                      <option value="{{$item->id}}">{{$item->company_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Customer Name</label>
                  <input type="text" class="form-control" id="customer_name" name="customer_name"  placeholder="Customer Name">
                </div>
                <div class="col-md-4">
                  <label>Customer Short Name</label>
                  <input type="text" class="form-control" id="customer_short" name="customer_short"  placeholder="Customer Short Name">
                </div>
              </div>
              <div class="form-group has-feedback">
                <div class="col-md-4">
                  <label>Phone</label>
                  <input type="text" class="form-control" id="phone" name="phone"  placeholder="08xxxxx">
                </div>
                <div class="col-md-4">
                  <label>Address</label>
                  <textarea type="text" class="form-control" id="address" name="address"  placeholder="Address"></textarea>
                </div>
              </div>
              <div class="form-group has-feedback">
                <div class="col-md-4">
                  <label>Note</label>
                  <textarea type="text" class="form-control" id="note" name="note"  placeholder="Note"></textarea>
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