<div class="container demo">
    <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel2">Right Sidebar</h4>
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
                                            <ul id="myTab3" class="tab-review-design">
                                                <li class="active"><a href="#description"><i class="icon nalika-edit"
                                                            aria-hidden="true"></i>Adicionar Categoria</a></li>
                                                <li><a href="#reviews"><i class="icon nalika-picture"
                                                            aria-hidden="true"></i> Pictures</a></li>
                                            </ul>
                                            <br><br>
                                            <div id="myTabContent" class="tab-content custom-product-edit">
                                                <form
                                                    action="{{ isset($item) ? route('categories.update', $item->id) : route('categories.store') }}"
                                                    method="POST" role="form" enctype="multipart/form-data">
                                                    @csrf
                                                    @if (isset($item))
                                                        @method('PUT')
                                                    @endif
                                                    <div class="product-tab-list tab-pane fade active in"
                                                        id="description">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <!-- Adicione seus campos de formulário aqui -->
                                                                <div class="form-group">
                                                                    <label for="category_name" class="text-white">Nome
                                                                        da Categoria</label>
                                                                    <input type="text" class="form-control"
                                                                        id="category_name" name="category_name"
                                                                        value="{{ isset($item) ? $item->category_name : '' }}"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="category_description"
                                                                        class="text-white">Descrição da
                                                                        Categoria</label>
                                                                    <textarea class="form-control" id="category_description" name="category_description" rows="3" required>{{ isset($item) ? $item->category_description : '' }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="category_image"
                                                                        class="text-white">Imagem ou SVG da
                                                                        Categoria</label>
                                                                    <input type="file" class="form-control"
                                                                        id="category_image" name="category_image"
                                                                        accept="image/*,.svg">
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary">{{ isset($item) ? 'Atualizar' : 'Enviar' }}</button>
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
                        <!-- Revisão da aba única do produto Fim-->
                    </div>
                    <!-- Aba única do produto Fim-->
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="demo-footer">
    <a href="http://www.bootpen.com" target="_blank">Get more code snippets</a>
</footer>
