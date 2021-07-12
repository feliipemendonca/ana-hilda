<div class="card w-100">
    <!-- Card header -->
    <div class="card-header border-0">

        <div class="row">
            <div class="col-12 col-sm-5 col-md-8">
                <h3 class="mb-0">Lista</h3>
            </div>
            <div class="col-8 col-sm-7 col-md-4">
                <div id="datatable-basic_filter" class="dataTables_filter">
                    <input wire:model="search" class="form-control form-control-sm" type="text" placeholder="Pesquisar">
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="empresa">Nome</th>
                    <th scope="col" class="sort" data-sort="empresa">Contato</th>
                    <th scope="col" class="sort" data-sort="empresa">Mensagem</th>
                    <th scope="col" class="sort" data-sort="cadastro">Cadastro</th>
                    <th scope="col" class="sort" data-sort="opcoes">Opções</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($items as $item)
                    <tr style="{{ $item->read == '0' ? 'font-weight: bold;' : '' }}"> 
                        <td class="budget">
                            {{ $item->name }}
                        </td>
                        <td class="budget">
                            {{ $item->phone }}
                        </td>
                        <td class="budget">
                            {{ Str::limit($item->message, 100) }}
                        </td>
                        <td>
                            {{ $item->created_at->format('d-m-Y') }}
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ni ni-archive-2"></i>Opções
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('m3.contacts.show', $item) }}">
                                        <i class="fas fa-edit"></i>Ver
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Card footer -->
    <div class="card-footer py-4">
        {{ $items->links() }}
    </div>
</div>
