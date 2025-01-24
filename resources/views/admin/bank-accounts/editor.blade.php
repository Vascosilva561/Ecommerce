<div class="modal right fade" id="myModal{{ isset($item) ? $item->id : '' }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background:#1B2A47">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true" style="color: white">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2" style="color: white">
                    {{ isset($item) ? 'Editar Conta Bancária - ' . $item->name : 'Adicionar Conta Bancária' }}</h4>
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
                                                action="{{ isset($item) ? route('admin.bank-accounts.update', $item->id) : route('admin.bank-accounts.store') }}"
                                                method="POST" role="form" enctype="multipart/form-data">
                                                @csrf
                                                @if (isset($item))
                                                    @method('PUT')
                                                @endif
                                                <div class="product-tab-list">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <!-- Ad$icione seus campos de formulário aqui -->
                                                            <div class="form-group">
                                                                <label for="name" class="text-white"
                                                                    style="color:#fff">Nome da Conta</label>
                                                                <input type="text" class="form-control"
                                                                    id="name" name="name"
                                                                    value="{{ isset($item) ? $item->name : '' }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="bank" class="text-white"
                                                                    style="color:#fff">Nome do Banco</label>
                                                                <input type="text" class="form-control"
                                                                    id="bank" name="bank"
                                                                    value="{{ isset($item) ? $item->bank : '' }}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="iban" class="text-white"
                                                                    style="color:#fff">IBAN</label>
                                                                <input type="text" class="form-control"
                                                                    id="iban" name="iban"
                                                                    value="{{ isset($item) ? $item->iban : '' }}"
                                                                    required>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary">{{ isset($item) ? 'Actualizar' : 'Cadastrar' }}</button>
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
