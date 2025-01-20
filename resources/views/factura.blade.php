<!DOCTYPE html>
<html>

<head>
    <title>Factura Proforma</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="content-type" content="text-html; charset=utf-8">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 0;
            padding: 0;
        }

        header {
            margin-bottom: 20px;
            padding: 0 20px;
        }

        .factura-title {
            text-align: center;
            /* font-size: 20px; */
            font-weight: bold;
            margin-bottom: 20px;
        }

        .logo-container {
            display: table;
            width: 100%;
        }

        .logo-container .logo {
            display: table-cell;
            width: 30%;
            vertical-align: middle;
        }

        .logo-container .company-info {
            display: table-cell;
            width: 70%;
            vertical-align: middle;
            text-align: right;
        }

        .logo-container img {
            width: 120px;
        }

        .company-info p {
            margin: 0;
        }

        .title {
            margin-bottom: 5px;
            padding-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: underline;
        }

        .client-info {
            margin: 0 20px 20px 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .client-info p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            margin: 20px;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f7d7d7;
            color: #000;
            font-weight: bold;
            text-align: center;
        }

        table td {
            font-size: 12px;
        }

        table {
            border-radius: 5px;
            overflow: hidden;
        }

        table th:first-child,
        table td:first-child {
            border-top-left-radius: 5px;
        }

        table th:last-child,
        table td:last-child {
            border-top-right-radius: 5px;
        }

        .totals {
            margin: 20px;
            float: right;
            width: 50%;
            border: 1px solid #ddd;
            border-radius: 5px;
            /* padding: 10px; */
            background-color: #f9f9f9;
        }

        .totals table {
            width: 100%;
            border-collapse: collapse;
        }

        .totals td {
            padding: 5px 10px;
            text-align: right;
            border: none;
        }

        .totals .label {
            font-weight: bold;
        }

        .totals .grand-total {
            background-color: #f7d7d7;
            font-size: 14px;
            font-weight: bold;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 12px;
            color: #777;
            padding: 10px 20px;
            border-top: 1px solid #ddd;
        }

        footer .left {
            float: left;
        }

        footer .right {
            float: right;
        }

        footer:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <div class="logo">
                <img src="{{ public_path() }}/images/icons/logo-shopp.png" alt="Logo">
            </div>
            <div class="company-info">
                <p class="title">Dados da Empresa</p>
                <p><strong>JM2X, LDA</strong></p>
                <p>NIF: 5111045546</p>
                <p>Telefone: +244 931 486 991</p>
                <p>Endereço: Rua Comandante Cassanje<br>nº92, Benguela.</p>
                <p>Email: jm2xdistribuidora@hormail.com</p>
            </div>
        </div>
    </header>

    <h3 class="factura-title">FACTURA PROFORMA</h3>

    <div class="client-info">
        <p class="title">Dados do Cliente</p>
        <p><strong>Nome:</strong> {{ Auth::user()->address->name }}</p>
        <p><strong>Telefone:</strong> {{ Auth::user()->address->telefone }}</p>
        <p><strong>Endereço:</strong> {{ Auth::user()->address->endereco }} -
            {{ Auth::user()->address->municipio }}/{{ Auth::user()->address->provincia }} -
            {{ Auth::user()->address->pais }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->address->email }}</p>
        <p><strong>Data de Emissão:</strong> {{ date('d/m/Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="no">Nº</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalWeight = 0;
            @endphp
            @foreach (Cart::content() as $item)
                @php
                    $totalWeight += $item->model->weight * $item->qty;
                @endphp
                <tr>
                    <td class="no" style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $item->model->name }}<br>{{ $item->model->details }}</td>
                    <td style="text-align: center;">{{ $item->qty }}</td>
                    <td style="text-align: right;">{{ $item->model->presentPrice() }} Kz</td>
                    <td style="text-align: right;">{{ presentPrice($item->qty * $item->model->price) }} Kz</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="totals">
        <table>
            <tr>
                <td>Subtotal:</td>
                <td>{{ presentPrice(Cart::subtotal()) }} Kz</td>
            </tr>
            <tr>
                <td>Taxa 14%:</td>
                <td>{{ presentPrice(Cart::tax()) }} Kz</td>
            </tr>
            <tr>
                <td>Frete:</td>
                <td>{{ presentPrice($totalWeight * env('FREIGHT_PRICE')) }} Kz</td>
            </tr>
            <tr>
                <td class="grand-total">Total Geral:</td>
                <td class="grand-total">
                    {{ presentPrice(Cart::total() + $totalWeight * env('FREIGHT_PRICE')) }} Kz
                </td>
            </tr>
        </table>
    </div>

    <footer>
        <div class="left">
            Obrigado pela preferência!
        </div>
        <div class="right">
            Página 1 de 1
        </div>
        {{-- <div class="right">
            Página { PAGE_NUM } de { PAGE_COUNT }
        </div> --}}
    </footer>
</body>

</html>
