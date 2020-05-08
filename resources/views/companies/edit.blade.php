<div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  id="form-item" method="#" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data" >
                {{ csrf_field() }} {{ method_field('POST') }}

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title"></h3>
                </div>


                <div class="modal-body">
                    <input type="hidden" id="id" name="id">


                    <div class="box-body">
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"  autofocus required>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label >Alias</label>
                            <input type="text" class="form-control" id="company_alias" name="company_alias"   required>
                            <span class="help-block with-errors"></span>
                        </div>

                        {{-- <div class="form-group">
                            <label >Created By</label>
                            <input type="text" class="form-control" id="created_by" name="created_by"   required>
                            <span class="help-block with-errors"></span>
                        </div>

                        <div class="form-group">
                            <label >Updated By</label>
                            <input type="text" class="form-control" id="update_by" name="update_by"   required>
                            <span class="help-block with-errors"></span>
                        </div> --}}


                    </div>
                    <!-- /.box-body -->

                </div>

                
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Submit</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
