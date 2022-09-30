<?php

namespace App\Http\Livewire\Transaksi;

use App\Models\Bank;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PageBank extends Component
{
    public $Bank;
    public $itemDelete = false, $itemEdit = false, $itemID, $itemCreate = false, $validasi;
    public $name_card, $number_rek, $metode;
    public function render()
    {
        abort_if(Auth::user()->role_id == 111, 403);
        $this->payment = Bank::where('user_id', Auth::user()->id)->get();
        return view('livewire.transaksi.page-bank');
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
        session()->flash('message', 'Berhasil Di Hapus');
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
            session()->flash('message', 'Berhasil Di  Edit');
        } else {
            session()->flash('message', 'Gagal Di  Edit');
        }
        $this->itemEdit = false;
    }
    public function CreateModal(){
        $this->name_card ="";
        $this->number_rek = "";
        $this->metode ="";
        $this->itemCreate = true;
    }
    public function create(){
      $validate =  $this->validate([
            'name_card'=> 'required',
            'number_rek' => 'required',
            'metode'=>'required',
        ]);
        $arr=[
            'user_id'=> Auth::user()->id,
            'name_card'=> $this->name_card,
            'number_rek' => $this->number_rek,
            'metode'=>$this->metode,
        ];
        Bank::create($arr);
        session()->flash('message', 'Berhasil Di Tambah');
        $this->itemCreate = false;
    }
    public function closeModal(){
        $this->itemDelete =false;
        $this->itemEdit = false;
        $this->itemCreate = false;
    }
}
