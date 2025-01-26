    <table>
        <tr>
            <th>Transação</th>
            <th>Código de Pedido</th>
            <th>Nome do Usuário</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Método</th>
            <th>Referência</th>
            <th>Data</th>
            <th>Total</th>
            <th>Status do Pedido</th>
        </tr>

        @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->transaction_id }}</td>
                <td>{{ $payment->order_id }}</td>
                <td>{{ $payment->order->address->name ?? 'N/A' }}</td>
                <td>{{ $payment->order->address->email ?? 'N/A' }}</td>
                <td>{{ $payment->order->address->telefone ?? 'N/A' }}</td>
                <td>{{ $payment->method }}</td>
                <td>{{ $payment->reference }}</td>
                <td>{{ $payment->created_at }}</td>
                <td>{{ presentPrice($payment->order->total) }}kz</td>
                <td>{{ $payment->status }}</td>
            </tr>
        @endforeach


    </table>
