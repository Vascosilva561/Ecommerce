<div class="modal right fade" id="myModal{{ isset($item) ? $item->id : '' }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- Header do Modal -->
            <div class="modal-header" style="background:#1B2A47">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" style="color: white">
                    {{ isset($item) ? 'Editar Fornecedor - ' . $item->name : 'Criar Fornecedor' }}
                </h4>
            </div>

            <!-- Corpo do Modal -->
            <div class="modal-body">
                <div class="single-product-tab-area mg-b-30">
                    <div class="single-pro-review-area">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-tab-pro-inner">
                                        <div class="custom-product-edit">
                                            <form
                                                action="{{ isset($item) ? route('admin.suppliers.update', $item->id) : route('admin.suppliers.store') }}"
                                                method="POST" role="form" enctype="multipart/form-data">
                                                @csrf
                                                @if (isset($item))
                                                    @method('PUT')
                                                @endif
                                                <div class="product-tab-list">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <!-- Campos do Formulário -->
                                                            <div class="form-group">
                                                                <label for="name" style="color:#fff">Nome da
                                                                    Empresa</label>
                                                                <input type="text" class="form-control"
                                                                    id="name" name="name"
                                                                    value="{{ isset($item) ? $item->name : '' }}"
                                                                    required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="email" style="color:#fff">Email</label>
                                                                <input type="email" class="form-control"
                                                                    id="email" name="email"
                                                                    value="{{ isset($item) ? $item->email : '' }}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="phone"
                                                                    style="color:#fff">Contacto</label>
                                                                <input type="text" class="form-control"
                                                                    id="phone" name="phone"
                                                                    value="{{ isset($item) ? $item->phone : '' }}"
                                                                    required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="nif" style="color:#fff">NIF</label>
                                                                <input type="text" class="form-control"
                                                                    id="nif" name="nif"
                                                                    value="{{ isset($item) ? $item->nif : '' }}"
                                                                    required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="address"
                                                                    style="color:#fff">Localização</label>
                                                                <input type="text" class="form-control"
                                                                    id="address" name="address"
                                                                    value="{{ isset($item) ? $item->address : '' }}"
                                                                    required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="category_id" style="color:#fff">Fornecimento
                                                                    de:</label>
                                                                <select class="form-control" id="category_id"
                                                                    name="category_id">
                                                                    <option value="" disabled selected>Selecione
                                                                        uma categoria</option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}"
                                                                            {{ isset($item) && $item->category_id == $category->id ? 'selected' : '' }}>
                                                                            {{ $category->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <button type="submit"
                                                                class="btn btn-primary">{{ isset($item) ? 'Atualizar' : 'Cadastrar' }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
