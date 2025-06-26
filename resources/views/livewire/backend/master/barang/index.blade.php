@section('page.header', 'Master')
@section('page.header.small', 'Barang')

<div>
    {{-- In work, do what you enjoy. --}}

    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Master Barang</h4>
            <div class="panel-heading-btn">
                <a class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" href="javascript:;"><i
                        class="fa fa-expand"></i></a>
                <a class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload" href="javascript:;"><i
                        class="fa fa-redo"></i></a>
                <a class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse" href="javascript:;"><i
                        class="fa fa-minus"></i></a>
                <a class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove" href="javascript:;"><i
                        class="fa fa-times"></i></a>
            </div>
        </div>
        <div class="panel-body">

            <div class="table-responsive" wire:ignore>
                <table class="table-hovered table-bordered table" id="tbl_list">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                </table>
            </div>

        </div>
    </div>
</div>

@script
    <script data-navigate-track>
        window.tbl_list=null;

        window.loadDataTable = function() {
            return new Promise((resolve, reject) => {
                try {
                    let dataPush = {};

                    tbl_list = $('#tbl_list').DataTable({
                        processing: true,
                        serverSide: true,
                        destroy: true,
                        autoWidth: false,
                        ajax: {
                            url: "{{ route('backend.master.barang.index.data.table') }}",
                            type: "POST",
                            dataType: "JSON",
                            data: dataPush,
                        },
                        columns: [{
                                data: 'DT_RowIndex',
                                type: 'html',
                                orderable: false,
                                searchable: false
                            },
                            {
                                data: 'kd_barang',
                            },
                            {
                                data: 'nama_barang',
                            },
                            {
                                data: 'status_barang',
                                type: 'html',
                            },
                            {
                                data: 'action',
                                orderable: false,
                                searchable: false
                            }
                        ],
                        columnDefs: [{
                            className: 'dt-center',
                            targets: [0, 3, 4]
                        }],
                        order: [
                            [1, 'asc']
                        ],
                        initComplete: function() {
                            resolve(); // Sukses saat DataTable sudah terinisialisasi
                        },
                        error: function() {
                            reject(); // Error saat proses
                        }
                    });
                } catch (err) {
                    console.error('DataTable error:', err);
                    reject(err);
                }
            });
        };

        // Initial Load
        loadDataTable();
    </script>
@endscript
