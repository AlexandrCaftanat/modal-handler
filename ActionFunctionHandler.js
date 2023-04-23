window.ActionFunctionHandler = class{
    constructor() {
        this.table = null;
        this.actionType = $('#ActionType');
        this.params = {};


    }

    init(ajaxUrl, notifUrl,) {
        this.ajaxUrl = ajaxUrl
        this.notifUrl = notifUrl
        this.actionHandler();
        this.editForm();
        this.deleteForm();
        this.saveForm();
        this.deleteConfirm();
    }

    actionHandler() {
        let self = this;
        this.actionType.on('change',  function () {
            let selectvalue = self.actionType.val();

            $('#modalAddAction').on('hidden.bs.modal', function () {
                $('#placeholder').empty();
                self.actionType.val('NO_ACTION');
            })

            if (selectvalue == 'FORM') {

                $('#placeholder').html($('#formAction').html());
                $('#show-modal').off('click').on('click', (event) => {
                    // event.preventDefault();
                    $.ajax({
                        url: self.ajaxUrl,
                        type: 'get',
                        dataType: 'html',
                        success: (data) => {
                            $('#formAction').trigger("reset");
                            $('#modalAddAction').modal('hide');
                            $(data).modal('show');

                            self.tableHandler();

                        }
                    });
                });
            } else if (selectvalue == 'SEND') {
                $('#placeholder').html($('#sendAction').html());
            } else if (selectvalue == 'ADD_TAIL_FROM_BALANCE') {
                $('#placeholder').html($('#addTailAction').html());
            } else if (selectvalue == 'HTTP_REQUEST_ACTION') {
                $('#placeholder').html($('#httpRequestAction').html());
            } else {
                $('#placeholder').html('');
            }
        });
    }


    actionButtons() {
        let buttons = {
            edit: `<button class="editBtn btn btn-outline-primary"  id="BtnEdit" data-toggle="tooltip" data-html="true" data-placement="right" title="${app.config.traslations.tooltip.edit}"><i class="fa-solid fa-pen-to-square"></i></button>`,
            delete: `<button class="deleteBtn btn btn-outline-danger" id="BtnDelete" data-toggle="tooltip" data-html="true" data-placement="right" title="${app.config.traslations.tooltip.delete}"><i class="fa-solid fa-trash-can"></i></button>`
        }

        return `<span class="p-1">` + Object.values(buttons).join('</span><span class="p-1">') + '</span>';
    }


    tableHandler() {
        let self = this;
        console.log('bbbbb')
        $(document).on('click', '#click-to', function () {
            self.params = {
                language: $('#languages').val(),
                text: $('#notification-text').val(),
            }
            let templateText = self.params.text

            let $delete = '<span class="p-1"><button class="deleteBtn btn btn-outline-danger" id="BtnDelete" data-toggle="tooltip"' +
                ' data-html="true" data-placement="right" title="Delete">' +
                '<i class="fa-solid fa-trash-can"></i></button></span>';

            let inputTag = `<input type='text' id='parameterName' value='${templateText}'>`;
            let parameterValue = {'ParameterName': inputTag};
            let table = $('#table-notification-templates').DataTable();

            if ($.fn.DataTable.isDataTable(table)) {
                table.destroy();
            }

            $('#table-notification-templates').DataTable({

                data: [
                    [parameterValue.ParameterName,
                        "<input type='text' id='regex' value=''>",
                        "<input type='text' id='start' value=''>",
                        "<input type='text' id='stop' value=''>",
                        $delete,]
                ],

                columns: [
                    {title: 'Parameter Name'},
                    {title: 'Reg Exp'},
                    {title: 'Start index'},
                    {title: 'Stop index.'},
                    {title: 'Actions'},
                ],
                /*responsive: true,*/
                paging: false,
                searching: false,
                info: false,
                initComplete: self.saveArguments(),
            });

            self.actionType.val('FORM');
        });
    }

    saveArguments() {
        self = this
        let buttons = this.actionButtons();

        $('#table-notification-templates').on('click', '#BtnDelete', function () {
            const table = $('#table-notification-templates').DataTable();
            table.clear().draw();
        });

        $(document).on('click', '.saveBtn', function (event) {
            self.params.parameterName = $("#parameterName").val();
            self.params.RegExp = $('#regex').val();
            self.params.start = $("#start").val();
            self.params.stop = $("#stop").val();

            $('#modalAddNewNotificationSourse').modal('hide');
            $('#modalAddAction').modal('show');
            $('#placeholder').html($('#formAction').html());

            $('#table-notTemplates').DataTable({

                data: [
                    [
                        self.params.language,
                        self.params.parameterName,
                        buttons
                    ]
                ],
                columns: [
                    {title: 'Language'},
                    {title: 'Notification Text'},
                    {title: 'Actions'},

                ],

                responsive: true,
                paging: false,
                searching: false,
                info: false,
            })

        })

    }

    getFunctionName(response) {
        switch (response.order) {
            case 1:
                return "FORM";
            case 2:
                return "SEND";
            case 3:
                return "ADD_TAIL_FROM_BALANCE";
            case 4:
                return "HTTP_REQUEST_ACTION";
        }
    }


    saveForm() {
        let  csrfToken = $('meta[name="csrf-token"]').attr('content');
        let buttons = this.actionButtons();
        $('#generalSave').on('click', function(event){
            $.ajax( {
                url: self.notifUrl,
                method: 'post',
                data: self.params,
                headers: { 'X-CSRF-Token': csrfToken },

                success : function (param) {
                    let response = JSON.parse(param);
                    let actionfunc =  self.getFunctionName(response)

                    $('#table-action').DataTable({
                        data: [
                            [
                                response.order,
                                actionfunc,
                                buttons
                            ]
                        ],
                        columns: [
                            {title: 'Execution order number'},
                            {title: 'Action function'},
                            {title: 'Actions'},

                        ],

                        responsive: true,
                        paging: false,
                        searching: false,
                        info: false,
                    })

                    $('#modalAddAction').modal('hide');
                },
                error: function ( xhr,status, error) {
                    console.log(error);
                }
            });

        });
    }


    editForm() {
        $('#modalAddAction').on('click','#BtnEdit',function (event) {
            console.log("edit");
        })
    }

    deleteForm() {
        $('#modalAddAction').off('click').on('click','#BtnDelete',function (event) {
            event.preventDefault();
            $('#modalDeleteAttributesTemplate').modal('show');
        });
    }

    deleteConfirm() {
        $('.btnOK').off('click').on('click', function (event) {
            console.log("delete");
            $('#table-notTemplates').DataTable().clear().draw();
            delete self.params
          $('#modalDeleteAttributesTemplate').remove();
            self.actionHandler();
        });
    }


}
