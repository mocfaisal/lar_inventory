<?php

namespace App\Livewire\Backend\Master\Barang;

use Livewire\Component;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Yajra\DataTables\DataTables;

use App\Models\Master\MasterBarang;

class Index extends Component {
    public function render() {
        return view('livewire.backend.master.barang.index');
    }

    public function getTable(Request $request) {
        $model = MasterBarang::query();

        return DataTables::of($model)->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '';
                $user_id = $row->id;

                $btn .= '<div class="btn-group" role="group" aria-label="Action">';
                // $btn .= '<button class="btn btn-icon btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#userModal" wire:click="edit(\'' . $user_id . '\')" title="Edit"><i class="bi bi-pencil fs-5"></i></button>';
                // $btn .= '<button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#userModal" wire:click="delete(\'' . $user_id . '\')">Delete</button>';
                $btn .= '</div>';
                return $btn;
            })

            ->rawColumns(['action'])
            ->toJson();
    }
}
