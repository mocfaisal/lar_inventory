<?php

namespace App\Livewire\Backend\Settings\Menu;

use Livewire\Component;
use Illuminate\Http\Request;

use App\Helpers\MenuHelper;
use App\Helpers\Utils\Salz\Salz_Utils;

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Masmerise\Toaster\Toaster;

use App\Models\Master\MasterMenu;

class Index extends Component {
    private $Salz_utils;

    public $input_id;
    public $input_parent_id;
    public $input_txt;
    public $input_href;
    public $input_icon;
    public $input_tooltip;
    public $input_keterangan;
    public $input_permission;
    public $input_output;

    public $is_external;
    public $is_navigated;

    public function render() {
        return view('livewire.backend.settings.menu.index');
    }
    public function __construct() {
        $this->Salz_utils = new Salz_Utils();
    }


    function getData() {
        $this->skipRender();

        $new_data = [];
        $data = MasterMenu::selectRaw('id, parent_id, `name` AS text, icon, slider, url as href, sort_no, keterangan as ket, is_navigated, is_external, tooltip, permission_name')
            ->where('is_active', '1')
            ->orderBy('sort_no', 'asc')
            ->get()->toArray();

        foreach ($data as $key => $val) {
            if (empty($val['icon'])) {
                $val['icon'] = null;
            }

            $val['id'] = strval($val['id']);
            $val['parent_id'] = strval($val['parent_id']);
            $val['is_navigated'] = strval($val['is_navigated']);
            $val['is_external'] = strval($val['is_external']);

            // $val['icon'] = "fa " . $val['icon'];
            $new_data[] = $val;
        }

        $treeList = $this->Salz_utils->buildTree($new_data);
        unset($new_data);
        $new_data = $treeList;

        // dd($new_data);

        if (!empty($new_data)) {
            $r = ['success' => true, 'data' => $new_data];
        } else {
            $r['msg'] = 'Data is empty';
        }

        return response()->json($r);
    }

    public function update(Request $request) {
        $this->skipRender();

        if ($request->ajax()) {
            $dataSave = [
                'update' => [],
                'insert' => [],
            ];
            $new_data = [];
            $whereArr = [];

            $tgl_now = date('Y-m-d H:i:s');
            $is_save = false;
            $save1 = false;
            $save2 = false;

            if ($request->has('dataJson')) {
                $dataJson = $request->input('dataJson');

                $new_data = $this->Salz_utils->objectToArray2($dataJson);

                // dd($new_data);

                $old_data2 = $this->parseJsonArray($new_data);
                $new_data = $old_data2;

                // dd($new_data);
                $iterate_parent = 1;
                $iterate_child = 1;

                foreach ($new_data as $key => $val) {
                    $is_children = $val['is_children'];
                    $id = $val['id'];
                    $parent_id = $val['parent_id'];
                    $menu_name = $val['text'];
                    $menu_tooltip = $val['tooltip'];
                    $keterangan = $val['ket'];
                    $icon = $val['icon'];
                    $url = $val['href'];
                    $permission_name = $val['permission_name'];
                    $is_external = $val['is_external'] ?: 0;
                    $is_navigated = $val['is_navigated'] ?: 0;
                    // $index = $val['index'] ?? $val['index_key'] ?: 0;
                    // $index = $key;
                    $depth_level = $val['depth_level'] ?? 1;

                    if ($is_children) {
                        $is_slider = '1';
                    } else {
                        $is_slider = '0';
                    }

                    if (empty($menu_name)) {
                        $r = ['success' => false, 'msg' => 'Data save failed!'];
                        return response()->json($r);
                    }

                    if (empty($permission_name)) {
                        $permission_name = null;
                    }

                    if ($parent_id != 0) {
                        // child menu

                        $dataArr = [
                            'parent_id' => $parent_id,
                            'name' => $menu_name,
                            'keterangan' => $keterangan,
                            'icon' => $icon,
                            'url' => $url,
                            // 'id' => $id,
                            'sort_no' => $iterate_child,
                            // 'sort_no' => $index,
                            // 'slider' => '0',
                            'tooltip' => $menu_tooltip,
                            'slider' => $is_slider,
                            'permission_name' => $permission_name,
                            'is_external' => $is_external,
                            'is_navigated' => $is_navigated,
                            'depth_level' => $depth_level,
                        ];

                        if (!empty($id)) {
                            $dataArr['id'] = $id;
                            $dataArr['date_update'] = $tgl_now;
                            array_push($dataSave['update'], $dataArr);
                        } else {
                            $dataArr['date_create'] = $tgl_now;
                            array_push($dataSave['insert'], $dataArr);
                        }

                        $iterate_child++;
                    } else {
                        // parent menu

                        $dataArr = [
                            'parent_id' => $parent_id,
                            'name' => $menu_name,
                            'keterangan' => $keterangan,
                            'icon' => $icon,
                            'url' => $url,
                            // 'id' => $id,
                            'sort_no' => $iterate_parent,
                            // 'sort_no' => $index,
                            'tooltip' => $menu_tooltip,
                            'slider' => $is_slider,
                            'permission_name' => $permission_name,
                            'is_external' => $is_external,
                            'is_navigated' => $is_navigated,
                            'depth_level' => $depth_level,
                        ];

                        // dd($dataArr);

                        if (!empty($id)) {
                            $dataArr['id'] = $id;
                            $dataArr['date_update'] = $tgl_now;
                            array_push($dataSave['update'], $dataArr);
                        } else {
                            $dataArr['date_create'] = $tgl_now;
                            array_push($dataSave['insert'], $dataArr);
                        }

                        $iterate_parent++;
                        $iterate_child = 1;
                    }
                }
            }

            // dd($dataSave);

            if (!empty($dataSave['insert'])) {
                $save1 = MasterMenu::insert($dataSave['insert']);
            }

            if (!empty($dataSave['update'])) {
                $save2 = MasterMenu::upsert($dataSave['update'], ['id'], ['parent_id', 'name', 'keterangan', 'icon', 'url', 'sort_no', 'slider', 'is_external', 'is_navigated', 'depth_level', 'tooltip', 'permission_name']);
            }

            if ($save1 || $save2) {
                $is_save = true;
            }

            if ($is_save) {

                MenuHelper::clearSidebarMenuCacheForAllUsers();

                $r = ['success' => true, 'msg' => 'Data saved!'];
            } else {
                $r = ['success' => false, 'msg' => 'Data save failed!'];
            }

            return response()->json($r);
        } else {
            return false;
        }
    }


    function confirm_delete($data) {
        $title = $data['title'];

        LivewireAlert::title('Konfirmasi')
            ->text('Yakin hapus data ' . $title . ' ?')
            ->asConfirm()
            ->withConfirmButton('Iya!')
            ->withDenyButton('Batal')
            ->confirmButtonColor('red')
            ->denyButtonColor('gray')
            ->onConfirm('do_delete', $data)
            ->warning()
            ->withOptions([
                'allowOutsideClick' => false,
            ])
            ->show();
    }

    function do_delete($data) {
        $is_success = false;
        $result_message = 'Error';
        $id = $data['id'];

        $delete = MasterMenu::where('id', $id)->delete();

        if ($delete) {
            $is_success = true;
            $result_message = 'Data berhasil disimpan.';
        } else {
            $is_success = false;
            $result_message = 'Gagal menyimpan data.';
        }

        if (!empty($result_message)) {
            if ($is_success) {
                Toaster::success($result_message);
                $this->dispatch('refresh-menu');
            } else {
                Toaster::error($result_message);
            }
        }
    }

    private function parseJsonArray($jsonArray, $parentID = 0, $depth_level = 1): array {
        $return = [];
        $parentIndex = 'parent_id';
        $idIndex = 'id';
        $parent_id = 0;

        // Jika bukan array atau kosong, kembalikan array kosong
        if (!is_array($jsonArray) || empty($jsonArray)) {
            return $return;
        }

        // Jika hanya 1 data (1 dimensi) pastikan diubah ke array of array
        $isAssoc = function ($arr) {
            return is_array($arr) && array_keys($arr) !== range(0, count($arr) - 1);
        };

        if ($isAssoc($jsonArray) && isset($jsonArray[$idIndex])) {
            $jsonArray = [$jsonArray];
        }


        foreach ($jsonArray as $key => $item) {
            if (!is_array($item) || !isset($item[$idIndex], $item['text'])) {
                continue;
            }

            $id = $item[$idIndex];
            $parent_id = ($parentID == 0 ? $item[$parentIndex] : $parentID);
            $is_children = isset($item['children']) && is_array($item['children']) && count($item['children']) > 0;

            $return[] = [
                $idIndex => $id,
                $parentIndex => $parent_id,
                'is_children' => $is_children,
                'text' => $item['text'],
                'icon' => $item['icon'] ?? null,
                'href' => $item['href'] ?? null,
                'ket' => $item['ket'] ?? null,
                'tooltip' => $item['tooltip'] ?? null,
                'permission_name' => $item['permission_name'] ?? null,
                'is_external' => $item['is_external'] ?? 0,
                'is_navigated' => $item['is_navigated'] ?? 0,
                'index' => $item['index'] ?? null,
                'index_key' => $key,
                'depth_level' => $depth_level,
            ];

            // Rekursif jika ada children
            if ($is_children) {
                $children = $this->parseJsonArray($item['children'], $id, $depth_level + 1);
                $return = array_merge($return, $children);
            }
        }

        return $return;
    }
}
