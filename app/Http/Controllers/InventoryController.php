<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InventoryController extends Controller
{
    public function index()
    {
        $categories = Category::where("is_active", true)->get();
        return view("inventories.index", compact("categories"));
    }

    public function getData()
    {
        $inventories = Inventory::with("category");

        return DataTables::of($inventories)
            ->addColumn("kategori", function ($inventory) {
                return $inventory->category->nama_kategori ?? "-";
            })
            ->addColumn("status_badge", function ($inventory) {
                $colors = [
                    "Baik" => "bg-green-100 text-green-800",
                    "Rusak" => "bg-red-100 text-red-800",
                    "Diperbaiki" => "bg-yellow-100 text-yellow-800",
                ];
                $color =
                    $colors[$inventory->status] ?? "bg-gray-100 text-gray-800";
                return '<span class="px-2 py-1 text-xs rounded-full ' .
                    $color .
                    '">' .
                    $inventory->status .
                    "</span>";
            })
            ->addColumn("active_status", function ($inventory) {
                return $inventory->is_active
                    ? '<span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Aktif</span>'
                    : '<span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Nonaktif</span>';
            })
            ->addColumn("action", function ($inventory) {
                return '
                <div class="flex gap-2">
                    <button onclick="editInventory(' .
                    $inventory->id .
                    ')" class="px-3 py-1.5 text-xs bg-green-100 text-green-700 rounded-md hover:bg-green-200 transition duration-150 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit
                    </button>
                    <button onclick="deleteInventory(' .
                    $inventory->id .
                    ')" class="px-3 py-1.5 text-xs bg-red-100 text-red-700 rounded-md hover:bg-red-200 transition duration-150 flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Hapus
                    </button>
                </div>

                ';
            })
            ->rawColumns([
                "kategori",
                "status_badge",
                "active_status",
                "action",
            ])
            ->make(true);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "kode_barang" => "required|unique:inventories",
            "nama_barang" => "required",
            "kategori_id" => "required|exists:categories,id",
            "deskripsi" => "nullable",
            "status" => "required",
            "lokasi_barang" => "required",
            "is_active" => "boolean",
        ]);

        Inventory::create($validated);

        return response()->json([
            "success" => true,
            "message" => "Data inventaris berhasil ditambahkan",
        ]);
    }

    public function show($id)
    {
        $inventory = Inventory::with("category")->findOrFail($id);
        return response()->json($inventory);
    }

    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        $validated = $request->validate([
            "kode_barang" => "required|unique:inventories,kode_barang," . $id,
            "nama_barang" => "required",
            "kategori_id" => "required|exists:categories,id",
            "deskripsi" => "nullable",
            "status" => "required",
            "lokasi_barang" => "required",
            "is_active" => "boolean",
        ]);

        $inventory->update($validated);

        return response()->json([
            "success" => true,
            "message" => "Data inventaris berhasil diupdate",
        ]);
    }

    public function check(Request $request)
    {
        $code = trim((string) $request->query('code', ''));

        if ($code === '') {
            return response()->json(['error' => 'Kode kosong'], 422);
        }

        $inventory = Inventory::where('kode_barang', $code)
            ->orWhere('id', $code)
            ->first();

        if (! $inventory) {
            return response()->json(['error' => 'Barang tidak ditemukan'], 404);
        }

        return response()->json([
            'id' => $inventory->id,
            'nama_barang' => $inventory->nama_barang,
        ]);
    }

    public function checkBarcode($kode)
    {
        $inventory = Inventory::where('kode_barang', $kode)->first();

        if ($inventory) {
            return response()->json([
                'found' => true,
                'nama_barang' => $inventory->nama_barang,
                'id' => $inventory->id,
            ]);
        }

        return response()->json(['found' => false]);
    }
}
