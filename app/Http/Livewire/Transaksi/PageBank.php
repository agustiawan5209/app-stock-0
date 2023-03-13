<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\Bank;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PageBank extends Component
{
    public $Bank;
    public $itemDelete = false, $itemEdit = false, $itemID, $itemCreate = false, $validasi;
    public $name_card, $number_rek, $metode, $payment;
    public function render()
    {
        // abort_if(Auth::user()->role_id == 111, 403);
        $this->payment = Bank::where('user_id', Auth::user()->id)->get();
        return view('livewire.transaksi.page-bank')->layoutData(['page'=> 'Metode Pembayaran']);
    }
    public function deleteModal($id)
    {
        $Bank = Bank::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->get();
        foreach ($Bank as $item) {
            $this->itemID = $item->id;
        }
        $this->itemDelete = true;
    }
    public function delete($id)
    {
        $Bank = Bank::where('user_id', Auth::user()->id)
            ->where('id', $id)
            ->delete();
        Alert::success('message', 'Berhasil Di Hapus');
        $this->itemDelete = false;
    }
    public function EditModal($id)
    {
        $Bank = Bank::find($id);
        $this->itemID = $Bank->id;
        $this->name_card = $Bank->name_card;
        $this->number_rek = $Bank->number_rek;
        $this->metode = $Bank->metode;
        $this->itemEdit = true;
    }

    public function edit($id)
    {
        $Bank = Bank::where('user_id', Auth::user()->id)
            ->where('id', $id)->update([
                'name_card' => $this->name_card,
                'number_rek' => $this->number_rek,
                'metode' => $this->metode,
            ]);
        if ($Bank) {
            Alert::success('message', 'Berhasil Di  Edit');
        } else {
            Alert::success('message', 'Gagal Di  Edit');
        }
        $this->itemEdit = false;
    }
    public function addModal(){

        $this->name_card ="";
        $this->number_rek = "";
        $this->metode ="";
        $this->itemCreate = true;
    }
    public function create(){
      $validate =  $this->validate([
            'name_card'=> 'required|string',
            'number_rek' => 'required|numeric',
            'metode'=>'required',
        ]);
        $arr=[
            'user_id'=> Auth::user()->id,
            'name_card'=> $this->name_card,
            'number_rek' => $this->number_rek,
            'metode'=>$this->metode,
        ];
        Bank::create($arr);
        Alert::success('message', 'Berhasil Di Tambah');
        $this->itemCreate = false;
    }
    public function closeModal(){
        $this->itemDelete =false;
        $this->itemEdit = false;
        $this->itemCreate = false;
    }
}
