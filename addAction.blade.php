<div class="modal fade" id="modalAddAction">
    <div class="modal-dialog modal-dialog-centered modal-between-sm-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Action</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="form-group row">
                            <div class="ml-auto">Action function</div>
                        <div class="col-7 ml-auto">
                            <select class="form-control" value name="ActionType" data-placeholder="Select" id="ActionType" >

                                    <option value="NO_ACTION" selected>NO_ACTION</option>
                                    <option value="FORM">FORM</option>
                                    <option value="TRANSLIT">TRANSLIT</option>
                                    <option value="SEND">SEND</option>
                                    <option value="DEFINE_USER_LANGUAGE">DEFINE_USER_LANGUAGE</option>
                                    <option value="DROP">DROP</option>
                                    <option value="DEFINE_ABONENT_INFO">DEFINE_ABONENT_INFO</option>
                                    <option value="ADD_TAIL_FROM_BALANCE">ADD_TAIL_FROM_BALANCE</option>
                                    <option value="HTTP_REQUEST_ACTION">HTTP_REQUEST_ACTION</option>
                            </select>
                        </div>
                    </div>
                </div>


          

               

                <!-- Код для значения 'FORM' в селекте -->
            
               

                <!-- Код для значения 'SEND' в селекте -->
                <div id="sendAction">

                    <h4 class="text-center">Action arguments</h4>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="SendChannel">Send Channel</label>
                            <input type="text" class="form-control" id="SendChannel"value="SMPP">
                        </div>
                        <div class="form-group mt-3">
                            <label for="MessageType">Example select</label>
                            <select class="form-control" id="MessageType">
                                <option>USSD IN</option>
                                <option>SMS</option>
                                <option>FLASH SMS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Notification Lifetime Seconds">Send Channel</label>
                            <input type="text" class="form-control" id="NotificationLifetimeSec"value="3600">
                        </div>

                        <div class="form-group">
                            <label for="Source Address">Send Channel</label>
                            <input type="text" class="form-control" id="SourceAddress"value="{AS_SOURCE}">
                        </div>
                        <div class="form-group mt-3">
                            <label for="SourceTON">Source TON</label>
                            <select class="form-control" id="SourceTON">
                                <option selected>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="SourceNPI">Source NPI</label>
                            <select class="form-control" id="SourceNPI">
                                <option>0</option>
                                <option selected>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="DestTON">Dest TON</label>
                            <select class="form-control" id="DestTON">
                                <option>0</option>
                                <option selected>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="DestNPI">Dest NPI</label>
                            <select class="form-control" id="DestNPI">
                                <option>0</option>
                                <option selected>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="DataCoding">Data Coding</label>
                            <input type="text" class="form-control" id="DataCoding"value="8">
                        </div>
                        <div class="form-group">
                            <label for="PID">PID</label>
                            <input type="text" class="form-control" id="PID"value="0">
                        </div>
                        <div class="form-group mt-3">
                            <label for="GSMPriorityLevel">GSM Priority Level</label>
                            <select class="form-control" id="GSMPriorityLevel">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option selected>3</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ReplaceIfPresent">Replace If Present</label>
                            <select class="form-control" id="ReplaceIfPresent">
                                <option>True</option>
                                <option selected>False</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Код для значения 'ADD_TAIL_FROM_BALANCE' в селекте -->
                <div id="addTailAction" style="display: none;">
                    <label for="AllowedPrefix">Allowed Prefix</label>
                    <input type="text" class="form-control" id="Allowed Prefix">
                </div>

                <!-- Код для значения 'HTTP_REQUEST_ACTION' в селекте -->
                <div id="httpRequestAction" style="display: none;">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" id="url">
                </div>



                <div class="modal-footer  float-right">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.close')</button>
                    <button type="button" class="saveBtn btn btn-success" id="generalSave">@lang('general.save') </button>
                </div>
            </form>
        </div>
    </div>
</div>


