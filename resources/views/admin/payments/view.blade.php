<div class="modal right fade" id="myModal{{ isset($item) ? $item->id : '' }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header text-white" style="background-color: #1b2a47">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true" style="color: white">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Detalhes do Pagamento</h4>
            </div>

            <div class="modal-body" style="display: flex; flex-direction: column">
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
                                            <div style="display: flex; flex-direction: column; height: 100%;">
                                                <table class="table table-responsive">
                                                    <tbody>
                                                        <tr>
                                                            <th style="border: none;">Transação ID</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ $item->transaction_id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">
                                                                Código de Pedido</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ $item->order_id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">Data
                                                            </th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ $item->created_at }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">Tipo de Pagamento</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ $item->method }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">
                                                                Referência</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ $item->reference }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">Status</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ $item->status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">Total</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ presentPrice($item->order->total) }}kz</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @if ($item->receipt_image)
                                                    <div style="display: flex; justify-content: space-between;">
                                                        <span
                                                            style="color: white; margin-top:auto; margin-bottom:auto;"><strong>Comprovativo
                                                                de
                                                                Pagamento:</strong>
                                                        </span>
                                                        <!-- Botão para abrir o modal -->
                                                        <button type="button" class="btn btn-primary"
                                                            data-toggle="modal" data-target="#viewReceiptModal">
                                                            Visualizar Comprovativo
                                                        </button>
                                                    </div>
                                                @else
                                                    <p class="text-warning">Nenhum comprovativo enviado.</p>
                                                @endif


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($item->status == 'Aguardando Confirmação')
                    <div
                        style="display: flex; justify-content: space-between; margin-top: auto; padding-left: 32px; padding-right: 32px;">
                        <form action="{{ route('admin.payments.cancel', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Cancelar
                                Pedido</button>
                        </form>
                        <form action="{{ route('admin.payments.confirm', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="Confirmado">
                            <button type="submit" class="btn btn-success">Confirmar
                                Pagamento</button>
                        </form>
                    </div>
                @endif
                @if ($item->status == 'Confirmado' && $item->order->status == 'Pagamento Aprovado')
                    <div
                        style="display: flex; justify-content: space-between; margin-top: auto; padding-left: 32px; padding-right: 32px;">
                        <div></div>
                        <form action="{{ route('admin.payments.refund', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Reembolsar Pagamento</button>
                        </form>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@if ($item->receipt_image)
    @include('orders.components.view-receipt-modal', [
        'url' => asset('images/receipts/' . $item->receipt_image),
    ])
@endif
