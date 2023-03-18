<div class="m-3">
    
            <div class="form-group input-group mb-3">
                @if($acao == 'cadastrar')
                    <input class="form-control" placeholder="ITEM" type="text" wire:model="item" wire:keydown.enter="add()">
                    <input class="form-control" placeholder="VALOR" type="text" wire:model="valor" wire:keydown.enter="add()">
                    <input class="form-control" placeholder="QUANTIDADE" type="number" wire:model="quant" wire:keydown.enter="add()">
                @else
                    <input class="form-control" type="text" wire:model="item" wire:keydown.enter="update({{$key}})">
                    <input class="form-control" type="text" wire:model="valor" wire:keydown.enter="update({{$key}})">
                    <input class="form-control" type="number" wire:model="quant" wire:keydown.enter="update({{$key}})">
                @endif

                @if($acao == 'cadastrar')
                    <button class="btn btn-primary" wire:click="add()"><i class="bi bi-plus-square"></i></button>
                @else
                    <button class="btn btn-primary" wire:click="update({{$key}})">Atualizar</button>
                @endif
            </div>
            
            
            
            <table class="table align-middle">
                
                @foreach ($lista as $key => $nome)
                    <tr>
                    
                        <th scope="row" class="text-start ">{{$nome['item']}}</th>
                        <td>{{ number_format($nome['valor'], 2, ',', '.') }}</td>
                        <td>{{$nome['quant']}}</td>
                        
                        <td class="text-end"><button class="btn btn-primary" wire:click="delete({{$key}})"><i class="bi bi-trash3"></i></button></td>
                    </tr>
                @endforeach
            </table>
            
            <div class="row justify-content-end mt-3">
                <div class="form-group input-group mb-3" style="width: 200px;">
                    <input class="form-control"  type="text" wire:model="soma">
                    <button class="btn btn-primary" wire:click="total">TOTAL</button>
                </div>
            </div>

            <div class="text-end">
                <button class="btn btn-primary" wire:click="resetlist()">Limpar Lista - <i class="bi bi-recycle"></i></button>
            </div>

            
            
</div>


            

