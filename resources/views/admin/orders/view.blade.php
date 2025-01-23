<div class="modal right fade" id="myModal{{ isset($item) ? $item->id : '' }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header text-white" style="background-color: #1b2a47">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Detalhes do Pedido</h4>
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
                                            <div>
                                                <table class="table table-responsive">
                                                    <tbody>
                                                        <tr>
                                                            <th style="border: none;">
                                                                Referência</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ $item->payment->reference }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">
                                                                Código de Pedido</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ $item->id }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">Data
                                                            </th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ $item->created_at }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">
                                                                Status do Pedido</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ $item->status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">
                                                                Subtotal</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ presentPrice($item->sub_total) }}kz</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">TAX
                                                                (14%)</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ presentPrice($item->tax) }}kz
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">Envio</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ presentPrice($item->freight_cost) }}kz</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="border: none;">Total</th>
                                                            <td style="border: none; text-align: right;">
                                                                {{ presentPrice($item->total) }}kz</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h3>Produtos</h3>
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <tr
                                                            style="border-top: 2px solid #152036; border-bottom: 2px solid #152036;">
                                                            <th style="border-bottom: none;">Produto</th>
                                                            <th style="border-bottom: none;">Quantidade</th>
                                                            <th style="border-bottom: none;">Preço</th>
                                                            <th style="border-bottom: none;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($item->products as $product)
                                                            <tr>
                                                                <td>{{ $product->product->name }}</td>
                                                                <td>{{ $product->quantity }}</td>
                                                                <td>{{ presentPrice($product->price) }}kz</td>
                                                                <td>{{ presentPrice($product->total) }}kz
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($item->status == 'Pagamento Aprovado' || $item->status == 'Enviado')
                    <form action="{{ route('admin.orders.send', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div style="padding-left: 32px; padding-right: 32px;">
                            <div style="display: flex; margin-top: auto; width: 100%">
                                <div style="flex: 1; margin-right: 8px;">
                                    <label for="sent_date">Data de Envio</label>
                                    <input type="date" name="sent_date" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($item->sent_date)->format('Y-m-d') ?? '' }}"
                                        placeholder="Data de Envio" required>
                                </div>
                                <div style="flex: 1">
                                    <label for="sent_date">Data de Entrega Prevista</label>
                                    <input type="date" name="expected_date" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($item->expected_date)->format('Y-m-d') ?? '' }}"
                                        placeholder="Data de Entrega Prevista" required>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-top: 8px;">
                                <input style="margin-right: 8px;" type="text" name="tracking_code"
                                    class="form-control" placeholder="Código de Rastreio"
                                    value="{{ $item->tracking_code ?? '' }}" required>
                                @if ($item->status == 'Pagamento Aprovado')
                                    <button type="submit" class="btn btn-success">Enviar Produto</button>
                                @else
                                    <button type="submit" class="btn btn-warning">Actualizar Dados</button>
                                @endif
                            </div>
                        </div>
                    </form>
                @endif
                @if ($item->status == 'Enviado')
                    <div style="margin-top: 32px; text-align: right; padding-left: 32px; padding-right: 32px;">
                        <form action="{{ route('admin.orders.delivery', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-large btn-success">Confirmar Entrega</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
