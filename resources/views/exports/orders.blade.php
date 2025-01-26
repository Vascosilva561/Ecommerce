<table>
    <thead>
        <tr>
            <th>ID do Pedido</th>
            <th>Data</th>
            <th>Nome do Usuário</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Taxa do Pedido ({{ 14 }}%)</th>
            <th>Total do Pedido</th>
            <th>Status do Pedido</th>
            <th>Método de Pagamento</th>
            <th>Status do Pagamento</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço Unitário</th>
            <th>Taxa do Produto ({{ 14 }}%)</th>
            <th>Subtotal</th>
            <th>Categoria</th>
            <th>Valor do Frete</th>
            <th>Status da Entrega</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            @foreach ($order->products as $product)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $order->address->name ?? 'N/A' }}</td>
                    <td>{{ $order->address->email ?? 'N/A' }}</td>
                    <td>{{ $order->address->telefone ?? 'N/A' }}</td>
                    <td>{{ presentPrice($order->tax) }} kz</td>
                    <td>{{ presentPrice($order->total) }} kz</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->payment->method ?? 'N/A' }}</td>
                    <td>{{ $order->payment->status ?? 'N/A' }}</td>
                    <td>{{ $product->product->name ?? 'Produto removido' }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ presentPrice($product->price) }} kz</td>
                    <td>{{ presentPrice($order->tax) }} kz</td>
                    <td>{{ presentPrice($product->total) }} kz</td>
                    <td>{{ $product->product->category->name ?? 'N/A' }}</td>
                    <td>{{ presentPrice($order->freight_cost) }} kz</td>
                    <td>{{ $order->delivery_status ?? 'N/A' }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
