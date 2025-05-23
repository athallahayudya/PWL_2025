<?php

namespace App\Http\Controllers;

use App\Models\PenjualanDetailModel;
use App\Models\PenjualanModel;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PenjualanDetailController extends Controller
{
    public function index($penjualan_id)
    {
        $penjualan = PenjualanModel::findOrFail($penjualan_id);

        // Contoh: menampilkan view penjualan/detail/index
        return view('penjualan.detail.index', compact('penjualan'));
    }

    public function list(Request $request, $penjualan_id)
    {
        // Ambil semua detail berdasarkan penjualan_id
        $details = PenjualanDetailModel::with('barang')
            ->where('penjualan_id', $penjualan_id);

        return DataTables::of($details)
            ->addIndexColumn()
            ->addColumn('barang_nama', function ($detail) {
                return $detail->barang ? $detail->barang->barang_nama : '-';
            })
            ->addColumn('aksi', function ($detail) use ($penjualan_id) {
                $btn = '<a href="'.url('/penjualan/'.$penjualan_id.'/detail/'.$detail->detail_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/penjualan/'.$penjualan_id.'/detail/'.$detail->detail_id.'/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'.url('/penjualan/'.$penjualan_id.'/detail/'.$detail->detail_id).'" style="display:inline;">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin hapus data ini?\');">Hapus</button>
                    </form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create($penjualan_id)
    {
        $penjualan = PenjualanModel::findOrFail($penjualan_id);
        $barangs   = BarangModel::all();

        return view('penjualan.detail.create', compact('penjualan', 'barangs'));
    }

    public function store(Request $request, $penjualan_id)
    {
        $request->validate([
            'barang_id' => 'required|exists:m_barang,barang_id',
            'qty'       => 'required|integer|min:1'
        ]);

        PenjualanDetailModel::create([
            'penjualan_id' => $penjualan_id,
            'barang_id'    => $request->barang_id,
            'qty'          => $request->qty
        ]);

        return redirect('/penjualan/'.$penjualan_id.'/detail')
            ->with('success', 'Detail penjualan berhasil ditambahkan');
    }

    public function show($penjualan_id, $detail_id)
    {
        $detail = PenjualanDetailModel::with(['barang', 'penjualan'])
            ->where('penjualan_id', $penjualan_id)
            ->findOrFail($detail_id);

        return view('penjualan.detail.show', compact('detail'));
    }

    public function edit($penjualan_id, $detail_id)
    {
        $detail = PenjualanDetailModel::where('penjualan_id', $penjualan_id)
            ->findOrFail($detail_id);

        $barangs = BarangModel::all();

        return view('penjualan.detail.edit', compact('detail', 'barangs'));
    }

    public function update(Request $request, $penjualan_id, $detail_id)
    {
        $request->validate([
            'barang_id' => 'required|exists:m_barang,barang_id',
            'qty'       => 'required|integer|min:1'
        ]);

        $detail = PenjualanDetailModel::where('penjualan_id', $penjualan_id)
            ->findOrFail($detail_id);

        $detail->update([
            'barang_id' => $request->barang_id,
            'qty'       => $request->qty
        ]);

        // (Opsional) update total_harga penjualan

        return redirect('/penjualan/'.$penjualan_id.'/detail')
            ->with('success', 'Detail penjualan berhasil diupdate');
    }

    public function destroy($penjualan_id, $detail_id)
    {
        $detail = PenjualanDetailModel::where('penjualan_id', $penjualan_id)
            ->findOrFail($detail_id);

        try {
            $detail->delete();
            return redirect('/penjualan/'.$penjualan_id.'/detail')
                ->with('success', 'Detail penjualan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/penjualan/'.$penjualan_id.'/detail')
                ->with('error', 'Gagal menghapus detail penjualan');
        }
    }
}