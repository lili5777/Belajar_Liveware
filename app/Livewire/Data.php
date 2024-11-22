<?php

namespace App\Livewire;

use App\Models\data as ModelsData;
use Livewire\Component;

class Data extends Component
{
    public $datas, $nama, $umur, $data_id;
    public $open = false;
    public function render()
    {
        $this->datas = ModelsData::all();
        return view('livewire.data');
    }

    public function create()
    {
        $this->resetFields();
        $this->bukaModal();
    }

    public function edit($id)
    {
        $data = ModelsData::findOrFail($id);
        $this->data_id = $data->id;
        $this->nama = $data->nama;
        $this->umur = $data->umur;
        $this->bukaModal();
    }

    public function delete($id)
    {
        ModelsData::findOrFail($id)->delete();
        session()->flash('pesan', 'data berhasil dihapus');
    }

    public function save()
    {
        ModelsData::updateOrCreate(
            ['id' => $this->data_id],
            [
                'nama' => $this->nama,
                'umur' => $this->umur
            ]
        );

        session()->flash('pesan', $this->data_id ? 'data berhasil diedit' : 'data berhasil ditambah');
        $this->tutupModal();
        $this->resetFields();
    }

    public function bukaModal()
    {
        $this->open = true;
    }

    public function tutupModal()
    {
        $this->open = false;
    }

    public function resetFields()
    {
        $this->data_id = null;
        $this->nama = '';
        $this->umur = '';
    }
}
