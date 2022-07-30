<div class="m-3">
    
            <div class="form-group input-group mb-3">
                @if($acao == 'cadastrar')
                    <input class="form-control" type="text" wire:model="item" wire:keydown.enter="add()">
                @else
                    <input class="form-control" type="text" wire:model="item" wire:keydown.enter="update()">
                @endif

                @if($acao == 'cadastrar')
                    <button class="btn btn-primary" wire:click="add()"><i class="bi bi-plus-square"></i></button>
                @else
                    <button class="btn btn-primary" wire:click="update()">Atualizar</button>
                @endif
            </div>
            
            
            
            <table class="table align-middle">
                @foreach ($lista as $key => $nome)
                    <tr>
                        <th scope="row" class="text-start ">{{$nome}}</th>
                        <td><button class="btn btn-primary" wire:click="edit({{$key}})"><i class="bi bi-pencil"></i></button></td>
                        <td class="text-end"><button class="btn btn-primary" wire:click="delete({{$key}})"><i class="bi bi-trash3"></i></button></td>
                    </tr>
                @endforeach
            </table>

            <div class="text-end">
                <button class="btn btn-primary" wire:click="resetlist()">Limpar Lista - <i class="bi bi-recycle"></i></button>
            </div>
</div>

