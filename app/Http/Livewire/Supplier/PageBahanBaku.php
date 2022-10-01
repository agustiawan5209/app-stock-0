<?php

namespace App\Http\Livewire\Supplier;

use App\Models\BahanBaku;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\BahanBakuSupplier;
use App\Models\Satuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PageBahanBaku extends Component
{
    use WithFileUploads;
    public $modal = false,
        $itemDelete = false,
        $defa,
        $Alert = true;
    public $gambar, $bahan, $Kode, $harga, $isi, $pcs, $getBahanAll, $satuan_id, $jumlah_stock;
    public $row = 10,
        $search = '';
    public $optionPacking,
        $optionAir,
        $ItemId = false,
        $PackingItem = false;
    public $photo, $bahan_id, $bahan_baku_id;
    public function addModal()
    {
        $this->modal = true;
    }
    public function CloseModal()
    {
        $this->AirItem = false;
        $this->PackingItem = false;
        $this->itemDelete = false;
        $this->modal = false;
        $this->gambar = null;
        $this->ItemId = null;
        $this->kode = null;
        $this->harga = null;
        $this->bahan_baku_id = null;
        $this->bahan_id = null;
        $this->jumlah_stock = null;
        $this->satuan_id = null;
        $this->isi = null;
    }

    // Crud
    public function create()
    {
        // try {
        $validate = $this->validate([
            'satuan_id' => 'required',
            'isi' => 'required',
            'gambar' => 'image|max:2024',
            'bahan_id' => 'required',
            'harga' => 'required',
            'jumlah_stock' => 'required',
        ]);
        // dd($validate);
        $name = md5($this->gambar . microtime()) . '.' . $this->gambar->extension();
        $this->gambar->storeAs('upload', $name);

        // Create Bahan Baku Air Dan Bahan Baku Packaging
        try {
            $bb = BahanBakuSupplier::create([
                'gambar' => $name,
                'bahan_baku_id' => $this->bahan_id,
                'isi' => $this->isi,
                'satuan' => $this->satuan_id,
                'harga' => $this->harga,
                'jumlah_stock' => $this->jumlah_stock,
                'suppliers_id' => Auth::user()->supplier->id,
            ]);

            // dd([$arr, $defBahan]);

            if ($bb) {
                Alert::success('message', 'Berhasil Ditambahkan');
            }
        } catch (\Exception $th) {
            //throw $th;
            Alert::success('message', '' . $th->getMessage() . '');
        }
        $this->CloseModal();
    }

    public function deleteModal($id)
    {
        $this->itemDelete = true;
        $this->ItemId = $id;
        $bahan = BahanBakuSupplier::find($id);
        $this->gambar = $bahan->gambar;
    }
    public function delete($id)
    {
        BahanBakuSupplier::find($id)->delete();
        Storage::disk('upload')->delete($this->gambar);
        Alert::success('message', 'Berhasil Di Hapus');
        $this->CloseModal();
    }

    public function editModal($id)
    {
        $bahan = BahanBakuSupplier::find($id);
        $this->ItemId = $bahan->id;
        $this->gambar = $bahan->gambar;
        $this->bahan_id = $bahan->bahanbakus->nama_bahan_baku;
        $this->isi = $bahan->isi;
        $this->bahan_id = $bahan->bahan_baku_id;
        $this->satuan_id = $bahan->satuan;
        $this->harga = $bahan->harga;
        $this->jumlah_stock = $bahan->jumlah_stock;
        // dd($this->bahan);
        $this->modal = true;
    }
    public function edit($id)
    {
        if ($this->photo == '') {
            $name = $this->gambar;
        } else {
            Storage::disk('upload')->delete($this->gambar);

            $gambar = $this->photo;
            $name = md5($gambar . microtime()) . '.' . $gambar->extension();
            $photo = $gambar->storeAs('upload', $name);
        }

        $validate = $this->validate([
            'satuan_id' => 'required',
            'isi' => 'required',
            'bahan_id' => 'required',
            'harga' => 'required',
            'jumlah_stock' => 'required',
        ]);
        // dd($validate);
        // dd($validate);
        BahanBakuSupplier::where('id', $id)->update([
            'gambar' => $name,
            'bahan_baku_id' => $this->bahan_id,
            'isi' => $this->isi,
            'satuan' => $this->satuan_id,
            'harga' => $this->harga,
            'jumlah_stock' => $this->jumlah_stock,
        ]);
        Alert::success('message', 'Berhasil Di Edit');
        $this->CloseModal();
    }

    public function render()
    {
        $bahan = '';
        $bahanbaku = BahanBakuSupplier::all();
        $bahan_baku = BahanBaku::all();
        $satuan = Satuan::all();
        return view('livewire.supplier.page-bahan-baku', compact('bahanbaku', 'bahan_baku', 'satuan'));
    }
}
