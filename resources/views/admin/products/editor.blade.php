<div class="modal right fade" id="{{ isset($item) ? 'myModal' . $item->id : 'myModal' }}" tabindex="-1" role="dialog"
    aria-labelledby="{{ isset($item) ? 'myModalLabel' . $item->id : 'myModalLabel' }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header text-white" style="background-color: #1b2a47">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="{{ isset($item) ? 'myModalLabel' . $item->id : 'myModalLabel' }}">
                    {{ isset($item) ? 'Editar Produto' : 'Criar Produto' }}
                </h4>
            </div>

            <div class="modal-body">
                <form
                    action="{{ isset($item) ? route('admin.products.update', $item->id) : route('admin.products.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($item))
                        @method('PUT')
                    @endif

                    <!-- Nome do Produto -->
                    <div class="form-group">
                        <label for="name">Nome do Produto</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $item->name ?? '' }}" placeholder="Digite o nome do produto" required>
                    </div>

                    <!-- Slug -->
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug"
                            value="{{ $item->slug ?? '' }}" placeholder="Digite o slug do produto" required>
                    </div>

                    <!-- Detalhes -->
                    <div class="form-group">
                        <label for="details">Detalhes</label>
                        <input type="text" class="form-control" id="details" name="details"
                            value="{{ $item->details ?? '' }}" placeholder="Digite os detalhes do produto (opcional)">
                    </div>

                    <!-- Preço -->
                    <div class="form-group">
                        <label for="price">Preço (Kz)</label>
                        <input type="number" class="form-control" id="price" name="price"
                            value="{{ $item->price ?? '' }}" placeholder="Digite o preço do produto em kwanzas"
                            required>
                    </div>

                    <!-- Descrição -->
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea class="form-control" id="description" name="description" rows="3"
                            placeholder="Digite a descrição do produto" required>{{ $item->description ?? '' }}</textarea>
                    </div>

                    <!-- Peso -->
                    <div class="form-group">
                        <label for="weight">Peso (kg)</label>
                        <input type="number" step="0.01" class="form-control" id="weight" name="weight"
                            value="{{ $item->weight ?? 0 }}" placeholder="Digite o peso do produto em kg" required>
                    </div>

                    <!-- Imagem -->
                    <div class="form-group">
                        <label for="image">Imagem</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>

                    <!-- Estoque -->
                    <div class="form-group">
                        <label for="stock">Estoque</label>
                        <input type="number" class="form-control" id="stock" name="stock"
                            value="{{ $item->stock ?? '' }}" placeholder="Digite a quantidade em estoque" required>
                    </div>

                    <!-- Categoria -->
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value=""> -- Escolha uma categoria -- </option>
                            @foreach ($categories as $id => $name)
                                <option value="{{ $id }}"
                                    {{ isset($item) && $item->category_id == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Produto em Destaque -->
                    <div class="form-group">
                        <label for="featured">Produto em Destaque</label>
                        <input type="hidden" name="featured" value="0">
                        <input type="checkbox" id="featured" name="featured" value="1"
                            {{ isset($item) && $item->featured ? 'checked' : '' }}>
                    </div>

                    <!-- Produto em Evidência -->
                    <div class="form-group">
                        <label for="highlight">Produto em Evidência</label>
                        <input type="hidden" name="highlight" value="0">
                        <input type="checkbox" id="highlight" name="highlight" value="1"
                            {{ isset($item) && $item->highlight ? 'checked' : '' }}>
                    </div>

                    <!-- Botão de Salvar -->
                    <button type="submit" class="btn btn-primary">
                        {{ isset($item) ? 'Atualizar Produto' : 'Criar Produto' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
