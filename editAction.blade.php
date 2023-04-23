
<div class="modal fade" id="modalAddNewNotificationSourse">
    <div class="modal-dialog modal-dialog-centered modal-between-sm-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Action</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-5">
                            <div>Action function</div>
                        </div>

                        <div class="col-7">
                            <select class="form-control" name="service" data-placeholder="Select">

                                    <option value=""></option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-5">
                            <div>Notification Templates</div>
                        </div>

                        </div>
                    </div>
                    <div class=" table-responsive col-sm-12 overlay-wrapper dataTables_wrapper">
                        <table id="table-statistic" class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th data-key="datetime">Language </th>
                                    <th data-key="subscriber">Notification text</th>
                                    <th data-key="actions">@lang('general.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer  float-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.close')</button>
                    <button type="button" class="saveBtn btn btn-success" disabled>@lang('general.save') </button>
                </div>
            </form>
        </div>
    </div>
</div>
