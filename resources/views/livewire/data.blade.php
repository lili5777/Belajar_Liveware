<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <button wire:click="create()">Tambah Data</button>
    @if (session()->has('pesan'))
        <h3>{{ session('pesan') }}</h3>
    @endif
    <table>
        <tr>
            <th>Nama</th>
            <th>Umur</th>
            <th>Aksi</th>
        </tr>
        @foreach ($datas as $d)
            <tr>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->umur }}</td>
                <td>
                    <button wire:click="edit({{ $d->id }})">Edit</button>
                    <button wire:click="delete({{ $d->id }})">Hapus</button>
                </td>
            </tr>
        @endforeach
    </table>

    @if ($open)
        <div>
            <h1>{{ $data_id ? 'Edit Data' : 'Buat Data' }}</h1>
            <form wire:submit.prevent="save">
                <div>
                    <label for="">Nama</label>
                    <input type="text" wire:model="nama">
                </div>
                <div>
                    <label for="">Umur</label>
                    <input type="text" wire:model="umur">
                </div>
                <div>
                    <button wire:click="tutupModal()">Batal</button>
                    <button type="submit"">Simpan</button>
                </div>
            </form>
        </div>
    @endif
</div>
