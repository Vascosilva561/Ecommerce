<div class="modal right fade" id="myModal{{ isset($item) ? $item->id : '' }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header text-white" style="background-color: #1b2a47">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true" style="color: white">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">
                    {{ isset($item) ? 'Editar Categoria' : 'Criar Categoria' }}</h4>
            </div>

            <div class="modal-body">
                <!-- Single pro tab start-->
                <div class="single-product-tab-area mg-b-30">
                    <!-- Single pro tab review Start-->
                    <div class="single-pro-review-area">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-tab-pro-inner">
                                        <br><br>
                                        <div class="custom-product-edit">
                                            <form
                                                action="{{ isset($item) ? route('admin.categories.update', $item->id) : route('admin.categories.store') }}"
                                                method="POST" role="form" enctype="multipart/form-data">
                                                @csrf
                                                @if (isset($item))
                                                    @method('PUT')
                                                @endif
                                                <div class="product-tab-list">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <!-- Adicione seus campos de formulário aqui -->
                                                            <div class="form-group">
                                                                <label for="category_name" class="text-white"
                                                                    style="color:#fff">Nome da
                                                                    Categoria</label>
                                                                <input type="text" class="form-control"
                                                                    id="name" name="name"
                                                                    value="{{ isset($item) ? $item->name : '' }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="slug" class="text-white"
                                                                    style="color:#fff">Slug da
                                                                    Categoria</label>
                                                                <input type="text" class="form-control"
                                                                    id="slug" name="slug"
                                                                    value="{{ isset($item) ? $item->slug : '' }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="image"
                                                                    class="text-white"style="color:#fff">Imagem da
                                                                    Categoria</label>
                                                                <input type="file" class="form-control"
                                                                    id="image" name="image" accept="image/*,.svg">
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ isset($item) ? 'Actualizar' : 'Enviar' }}</button>
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
