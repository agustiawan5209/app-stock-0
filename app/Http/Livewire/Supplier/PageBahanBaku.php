<?php

namespace App\Http\Livewire\Supplier;

use App\Models\BahanBaku;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\BahanBakuSupplier;
use App\Models\Satuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PageBahanBaku extends Component
{
    use WithFileUploads;
    public $modal = false,
        $def,
        $defa,
        $Alert = true;
    public $gambar, $bahan, $Kode, $harga, $isi, $pcs, $getBahanAll, $satuan_id, $jumlah_stock;
    public $row = 10,
        $search = '';
    public function addModal()
    {
        $this->modal = true;
    }
    public function CloseModal()
    {
        $this->AirItem = false;
        $this->PackingItem = false;
        $this->Alert = false;
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
                Alert::success('message','Berhasil Ditambahkan');
            }
        } catch (\Exception $th) {
            //throw $th;
            Alert::success('message', '' . $th->getMessage() . '');
        }
        $this->modal = false;
    }

    public function delete($id)
    {
        BahanBakuSupplier::find($id)->delete();
        Alert::success('message', $this->gambar ? 'Berhasil Di Hapus' : 'Berhasil Di Hapus');
    }
    public $optionPacking,
        $optionAir,
        $AirItem = false,
        $PackingItem = false;
    public $photo, $bahan_id, $bahan_baku_id;
    public function Edit($id, $table)
    {
        $bahan = BahanBakuSupplier::find($id);
        $this->ItemId = $bahan->id;
        $this->gambar = $bahan->gambar;
        $this->bahan_id = $bahan->bahanbaku->nama_bahan_baku;
        $this->isi = $bahan->isi;
        $this->bahan_id = $bahan->bahan_baku_id;
        $this->satuan_id = $bahan->satuan;
        $this->harga = $bahan->harga;
        $this->jumlah_stock = $bahan->jumlah_stock;
        $this->PackingItem = true;

        // dd($this->bahan);
        $this->AirItem = true;
    }
    public function Update($id)
    {
        if ($this->photo == '') {
            $name = $this->gambar;
        } else {
            $gambar = $this->photo;
            $name = md5($gambar . microtime()) . '.' . $gambar->extension();
            $photo = $gambar->storeAs('upload', $name);
        }

        // dd($this->optionPacking);
        $validate = $this->validate([
            'bahan' => 'required',
            'satuan' => 'required',
            'harga' => 'required',
            'jumlah_stock' => 'required',
        ]);
        // dd($validate);
        File::delete('upload' . $this->gambar);
        // dd($validate);
        BahanBakuSupplier::where('id', $id)->update([
            'gambar' => $name,
            'bahan_baku_id' => $this->bahan_baku_id,
            'isi' => $this->isi,
            'satuan' => $this->satuan,
            'harga' => $this->harga,
            'jumlah_stock' => $this->jumlah_stock,
        ]);
        Alert::success('message', 'Berhasil Di Edit');
        $this->AirItem = false;
        $this->PackingItem = false;
    }

    public function render()
    {
        $bahan = "";
        $bahanbaku =    BahanBakuSupplier::all();
        $bahan_baku = BahanBaku::all();
        $satuan = Satuan::all();
        return view('livewire.supplier.page-bahan-baku', compact('bahanbaku', 'bahan_baku', 'satuan'));
    }
}
