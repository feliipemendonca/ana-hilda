<div class="card w-100">
    <!-- Card header -->
    <div class="card-header border-0">

        <div class="row">
            <div class="col-12 col-sm-3 col-md-3 col-lg-4 col-xl-7">
                <h3 class="mb-0">Lista</h3>
            </div>
            <div class="col-8 col-sm-5 col-md-6 col-lg-6 col-xl-4">
                <div id="datatable-basic_filter" class="dataTables_filter">
                    <input wire:model="search" class="form-control form-control-sm" type="text" placeholder="Pesquisar">
                </div>
            </div>
            <div class="col-4 col-md-3 col-lg-2 col-xl-1">
                <a href="{{ route('m3.products.create') }}" class="btn btn-danger btn-sm">Adicionar</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="sort" data-sort="empresa">ID</th>
                    <th scope="col" class="sort" data-sort="cadastro">Data</th>
                    <th scope="col" class="sort" data-sort="empresa">Image</th>
                    <th scope="col" class="sort" data-sort="empresa">Title</th>
                    <th scope="col" class="sort" data-sort="usuario">Valor</th>
                    <th scope="col" class="sort" data-sort="empresa">Estado</th>
                    <th scope="col" class="sort" data-sort="empresa">Cidade</th>
                    <th scope="col" class="sort" data-sort="empresa">Bairro</th>
                    <th scope="col" class="sort" data-sort="cadastro">Código</th>
                    <th scope="col" class="sort" data-sort="cadastro">Atualizado</th>
                    <th scope="col" class="sort" data-sort="opcoes">Opções</th>
                </tr>
            </thead>
            <tbody class="list">
                @foreach ($items as $item)
                {{-- {{ dd($item) }} --}}
                    <tr>
                        <td class="budget">
                            {{ $item->increments }}
                        </td>
                        <td>
                            {{ $item->created_at->format('d-m-Y') }}
                        </td>
                        <th>
                            <img src="{{ Storage::url($item->files->filename) }}" width="150">
                        </th>
                        <td class="budget">
                            {{ $item->title }}
                        </td>
                        <td class="budget">
                            {{ $item->value }}
                        </td>
                        <td class="budget">
                            {{ $item->estado }}
                        </td>
                        <td class="budget">
                            {{ $item->cidade }}
                        </td>
                        <td class="budget">
                            {{ $item->bairro }}
                        </td>
                        <td class="budget">
                            {{ $item->cod }}
                        </td>
                        <td>
                            {{ $item->updated_at->format('d-m-Y') }}
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ni ni-archive-2"></i>Opções
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('m3.products.edit', $item) }}">
                                        <i class="fas fa-edit"></i>Editar
                                    </a>
                                    <a class="dropdown-item" href="{{ route('m3.Productsgaleria', $item) }}">
                                        <i class="fas fa-edit"></i>Galeria
                                    </a>
                                    @livewire('delete', ['route' => route('m3.products.destroy',
                                    $item)],key($item->id))
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
