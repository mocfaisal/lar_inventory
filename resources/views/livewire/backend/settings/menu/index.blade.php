<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Menu Settings</h3>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-primary" id="btn_getData" onclick="getDataDB()"> Load Data
                            from DB </button>
                        <button type="button" class="btn btn-success" id="btn_updateData" onclick="saveDataAll()">Save
                            All</button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="menu-list" wire:ignore></div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Menu Form</h3>
                </div>
                <div class="card-body">
                    <input type="hidden" class="form-control" id="input_id" placeholder="ID" wire:model="input_id">
                    <input type="hidden" class="form-control" id="input_parent_id" placeholder="Parent ID"
                        wire:model="input_parent_id">

                    <div class="form-group mb-2">
                        <label class="form-label required" for="input_txt">Text</label>
                        <input type="text" class="form-control" id="input_txt" placeholder="Text"
                            wire:model="input_txt">
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label" for="input_icon">Icon</label>
                        <input type="text" class="form-control" id="input_icon" placeholder="Icon"
                            wire:model="input_icon">
                        <small class="text-muted">Reff:
                            <a href="https://fontawesome.com/icons?d=gallery&m=free">Font Awesome</a>,
                            <a href="https://icons.getbootstrap.com/">Bootstrap Icons</a>
                        </small>
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label" for="input_href">URL</label>
                        <input type="text" class="form-control" id="input_href" placeholder="URL"
                            wire:model="input_href">
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label required" for="input_tooltip">Tooltip</label>
                        <input type="text" class="form-control" id="input_tooltip" placeholder="Tooltip"
                            wire:model="input_tooltip">
                    </div>

                    <div class="form-group mb-2" id="field_external">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input type="checkbox" class="form-check-input" id="is_external" value="1"
                                wire:model='is_external' />
                            <label class="form-check-label" for="is_external">
                                Is External
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-2" id="field_navigate">
                        <div class="form-check form-switch form-check-custom form-check-solid">
                            <input type="checkbox" class="form-check-input" id="is_navigated" value="1"
                                wire:model='is_navigated' />
                            <label class="form-check-label" for="is_navigated">
                                Is Navigated
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-2" id="field_permission">
                        <label class="form-label" for="input_permission">Menu Permission Name</label>
                        <input type="text" class="form-control" id="input_permission"
                            placeholder="Menu Permission Name" wire:model="input_permission">
                    </div>

                    <div class="form-group mb-2">
                        <label class="form-label required" for="input_keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="input_keterangan" placeholder="Keterangan"
                            wire:model="input_keterangan">
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-warning" id="btn_update" disabled>
                        <i class="fa-solid fa-pen-to-square"></i> Update
                    </button>
                    <button class="btn btn-primary" id="btn_add">
                        <i class="fa-solid fa-plus"></i> Add
                    </button>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Menu Output</h3>

                    <div class="card-toolbar">
                        <button class="btn btn-success" id="btn_output">
                            <i class="fa-brands fa-js"></i> Output
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group mb-2">
                        <textarea class="form-control" name="input_output" id="input_output" wire:model='input_output' cols="30"
                            rows="10"></textarea>
                    </div>

                </div>
            </div>
        </div>

    </div>

    @section('header.private.scripts')
        <style>
            #menu-list .d-flex.w-100.justify-content-between.align-items-center {
                padding-right: 10px !important;
            }
        </style>
    @endsection

    @script
        <script>
            const input_id = document.getElementById('input_id');
            const input_parent_id = document.getElementById('input_parent_id');
            const input_txt = document.getElementById('input_txt');
            const input_href = document.getElementById('input_href');
            const input_icon = document.getElementById('input_icon');
            const input_tooltip = document.getElementById('input_tooltip');
            const input_keterangan = document.getElementById('input_keterangan');
            const input_permission = document.getElementById('input_permission');
            const input_output = document.getElementById('input_output');

            const is_external = document.getElementById('is_external');
            const is_navigated = document.getElementById('is_navigated');

            const btn_getData = document.getElementById('btn_getData');
            const btn_update = document.getElementById('btn_update');
            const btn_updateData = document.getElementById('btn_updateData');
            const btn_add = document.getElementById('btn_add');
            const btn_output = document.getElementById('btn_output');

            const cleanForm = () => {
                input_id.value = '';
                input_parent_id.value = '';
                input_txt.value = '';
                input_href.value = '';
                input_icon.value = '';
                input_tooltip.value = '';
                input_keterangan.value = '';
                input_permission.value = '';
                is_external.checked = false;
                is_navigated.checked = false;
            };

            let list_items = [];

            const menuEditor = new MenuEditor('menu-list', {
                maxLevel: 6
            });

            window.getDataDB = async function() {
                menuEditor.empty();
                btn_getData.setAttribute('disabled', "true");
                btn_update.setAttribute('disabled', "true");
                btn_updateData.setAttribute('disabled', "true");

                return await $.ajax({
                    url: "{{ route('backend.settings.menu.getData') }}",
                    type: 'GET',
                    dataType: 'json',
                }).done(function(response) {
                    let responses_data = response.data;
                    menuEditor.setArray(responses_data);
                    menuEditor.mount();

                    btn_getData.removeAttribute('disabled');
                    btn_updateData.removeAttribute('disabled');
                });
            };

            window.saveData = async function(data, is_result = false) {
                var NewData = new FormData();

                NewData.append('dataJson[]', JSON.stringify(data));

                return $.ajax({
                    url: "{{ route('backend.settings.menu.updateData') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: NewData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    error: function(response) {
                        let responseJson = response.responseJSON;
                        let listError = responseJson.errors;
                        let listError__ = [];
                        let listVal;

                        let listError_ = Object.keys(listError).reduce((key, val) => {
                            key[val] = listError[val][0];
                            return key;
                        }, {});

                        for (let key in listError_) {
                            let textVal = listError_[key];
                            listError__.push(textVal + "<br>");
                        }

                        let errorMsg = "<b>" + responseJson.message + "</b>";
                        if (listError__) {
                            listVal = listError__.toString().replaceAll(',', '');
                        }

                        $(elem).setButton('reset');

                        Swal.fire({
                            title: "{{ __('custom.swal.title.error') }}",
                            html: errorMsg + "<br>" + listVal,
                            icon: 'error',
                        });
                    }
                }).then(function(response) {
                    if (is_result) {
                        return response;
                    } else {
                        if (response.success) {
                            Swal.fire({
                                title: "{{ __('custom.swal.title.success') }}",
                                text: response.msg,
                                icon: 'success',
                            });
                        } else {
                            Swal.fire({
                                title: "{{ __('custom.swal.title.error') }}",
                                text: response.msg,
                                icon: 'error',
                            });
                        }
                    }
                });

            }

            window.saveDataAll = async function() {
                let strData = JSON.parse(menuEditor.getString());
                let is_saved = await saveData(strData, true);

                if (is_saved.success) {
                    Swal.fire({
                        title: "{{ __('custom.swal.title.success') }}",
                        text: is_saved.msg,
                        icon: 'success',
                        confirmButtonText: "{{ __('custom.swal.button.ok') }}",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            btn_update.setAttribute('disabled', "true");
                            cleanForm();
                            getDataDB();
                        }
                    });
                } else {
                    Swal.fire({
                        title: "{{ __('custom.swal.title.error') }}",
                        text: response.msg,
                        icon: 'error',
                    });
                }
            }

            // Events
            menuEditor.onClickDelete((event) => {
                let data = event.item.getDataset();

                $wire.call('confirm_delete', {
                    'id': data.id,
                    'title': data.text,
                });

                // if (confirm('Do you want to delete the item ' + event.item.getDataset().text)) {
                //     event.item.remove(); // remove the item
                // }
            });

            menuEditor.onClickEdit((event) => {
                let itemData = event.item.getDataset();
                // console.log(itemData);

                input_id.value = itemData.id;
                input_parent_id.value = itemData.parent_id;
                input_txt.value = itemData.text;
                input_href.value = itemData.href || null;
                input_icon.value = itemData.icon || null;
                input_tooltip.value = itemData.tooltip || null;
                input_keterangan.value = itemData.ket || null;
                input_permission.value = itemData.permission_name || null;
                is_external.checked = (itemData.is_external == '1' ? true : false) || false;
                is_navigated.checked = (itemData.is_navigated == '1' ? true : false) || false;

                $('#is_external').trigger('change');
                $('#is_navigated').trigger('change');

                btn_update.removeAttribute('disabled');
                menuEditor.edit(event.item);
            });

            btn_add.addEventListener('click', async () => {
                let newItem = {
                    id: 0,
                    parent_id: 0,
                    text: input_txt.value,
                    href: input_href.value,
                    icon: input_icon.value,
                    tooltip: input_tooltip.value,
                    ket: input_keterangan.value,
                    permission_name: input_permission.value,
                    is_navigated: is_navigated.checked,
                    is_external: is_external.checked,
                };

                menuEditor.add(newItem);

                let is_saved = await saveData(newItem, true);

                if (is_saved.success) {
                    Swal.fire({
                        title: "{{ __('custom.swal.title.success') }}",
                        text: is_saved.msg,
                        icon: 'success',
                        confirmButtonText: "{{ __('custom.swal.button.ok') }}",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            btn_update.setAttribute('disabled', "true");
                            cleanForm();
                            getDataDB();
                        }
                    });
                } else {
                    Swal.fire({
                        title: "{{ __('custom.swal.title.error') }}",
                        text: is_saved.msg,
                        icon: 'error',
                    });
                }

            });

            btn_update.addEventListener('click', async () => {
                let data = {
                    id: input_id.value,
                    parent_id: input_parent_id.value,
                    text: input_txt.value,
                    href: input_href.value,
                    icon: input_icon.value,
                    tooltip: input_tooltip.value,
                    ket: input_keterangan.value,
                    permission_name: input_permission.value,
                };

                if (is_external.checked) {
                    data.is_external = 1;
                } else {
                    data.is_external = 0;
                }

                if (is_navigated.checked) {
                    data.is_navigated = 1;
                } else {
                    data.is_navigated = 0;
                }

                menuEditor.update(data);

                // let strData = JSON.parse(menuEditor.getString());
                let strData = data;
                let is_saved = await saveData(strData, true);

                if (is_saved.success) {
                    Swal.fire({
                        title: "{{ __('custom.swal.title.success') }}",
                        text: is_saved.msg,
                        icon: 'success',
                        confirmButtonText: "{{ __('custom.swal.button.ok') }}",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            btn_update.setAttribute('disabled', "true");
                            cleanForm();
                            getDataDB();
                        }
                    });
                } else {
                    Swal.fire({
                        title: "{{ __('custom.swal.title.error') }}",
                        text: response.msg,
                        icon: 'error',
                    });
                }

            });

            btn_output.addEventListener('click', () => {
                input_output.value = menuEditor.getString();
            });

            $('#is_external').on('change', function() {
                let is_toggle = $(this).prop('checked');
                let field_navigate = $('#field_navigate');
                let field_permission = $('#field_permission');
                let is_navigated = $('#is_navigated');
                let input_permission = $('#input_permission');

                if (is_toggle) {
                    input_permission.val('');
                    is_navigated.prop('checked', false);
                    field_navigate.prop('hidden', true);
                    field_permission.prop('hidden', true);
                } else {
                    field_navigate.prop('hidden', false);
                    field_permission.prop('hidden', false);
                }

            });

            $('#is_navigated').on('change', function() {
                let is_toggle = $(this).prop('checked');
                let field_external = $('#field_external');
                let is_external = $('#is_external');

                if (is_toggle) {
                    is_external.prop('checked', false);
                    field_external.prop('hidden', true);
                } else {
                    field_external.prop('hidden', false);
                }

            });

            $wire.on('refresh-menu', function() {
                getDataDB();
            });

            // Initial
            getDataDB();
        </script>
    @endscript
