<div class="modal fade" id="modalAddNewNotificationSourse" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-between-sm-md modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Notification Templates</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-5">
                            <div>Language</div>
                        </div>

                        <div class="col-7">

                            <select class="form-control" name="languages" id="languages" data-placeholder="Select">
                                <option value="">Select Language</option>
                                @foreach($languages AS $lang)
                                    <option value="{{$lang->id}}">{{$lang->LanguageName}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-5">
                            <div>Notification Text</div>
                        </div>

                        <div class="col-7">
                            <input type="text" id="notification-text" name="Name" value class="form-control" placeholder="Text with {params}">
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                    </div>
                    <div class="mb-3 mt-5" id="click-to">Notification Templates Arguments</div>
                    <div class=" table-responsive col-sm-12 overlay-wrapper dataTables_wrapper" style="width: 100%; table-layout: fixed;">
                        <table id="table-notification-templates" class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th data-key="parameter-name">Parameter Name</th>
                                <th data-key="reg-exp">Reg Exp</th>
                                <th data-key="start">Start index</th>
                                <th data-key="stop">Stop index</th>
                                <th data-key="actions">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <div class="modal-footer mt-5  float-right">
                            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.close')</button>
                            <button type="button" class="saveBtn btn btn-success">@lang('general.save') </button>
                        </div>
                    </div>

                </div>

                <hr>

                <div class="bg-light col" style="font-size: 11px;">
                    <p style="font-size: 12px;"><ins><em><strong>Examples</strong></em></ins></p>
                    <p> <strong>Income :</strong> Notification request: 10007BALANCE:2345, TARIFPLAN:Tvoi Stil. </p>
                    <p><strong>Notification text :</strong> Your balance is {BALANCE} som,Тarif Plan {TARIFPLAN}.</p>


                    <p><strong>Parameters</strong></p>

                    <div class=" table-responsive col-sm-12 overlay-wrapper dataTables_wrapper" style="width: 100%; table-layout: fixed;">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th>Parameter Name</th>
                                <th>Reg Exp</th>
                                <th>Start index</th>
                                <th>Stop index</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{BALANCE}</td>
                                <td>BALANCE:([-+]*\d+\.\d+|[-+]*\d+), TARIFPLAN:</td>
                                <td>8</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>{TARIFPLAN}</td>
                                <td>TARIFPLAN:.*</td>
                                <td>10</td>
                                <td>0</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <p><strong>Result : </strong>Notification to send : Your balance is 2345 som,Тarif Plan Tvoi Stil.</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
