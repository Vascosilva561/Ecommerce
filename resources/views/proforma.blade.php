<!DOCTYPE html>
<html>
<head>
  <title>HTML to API - Invoice</title>

  <!-- <link rel="stylesheet" href="sass/main.css" media="screen" charset="utf-8"/> -->
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="content-type" content="text-html; charset=utf-8">
  <style type="text/css">
    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td,
    article, aside, canvas, details, embed,
    figure, figcaption, footer, header, hgroup,
    menu, nav, output, ruby, section, summary,
    time, mark, audio, video {
      margin: 0;
      padding: 0;
      border: 0;
      font: inherit;
      font-size: 100%;
      vertical-align: baseline;
    }

    html {
      line-height: 1;
    }

    ol, ul {
      list-style: none;
    }

    table {
      border-collapse: collapse;
      border-spacing: 0;
    }

    caption, th, td {
      text-align: left;
      font-weight: normal;
      vertical-align: middle;
    }

    q, blockquote {
      quotes: none;
    }
    q:before, q:after, blockquote:before, blockquote:after {
      content: "";
      content: none;
    }

    a img {
      border: none;
    }

    article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
      display: block;
    }

    body {
      font-family: 'Source Sans Pro', sans-serif;
      font-weight: 300;
      font-size: 12px;
      margin: 0;
      padding: 0;
      color: #777777;
    }
    body a {
      text-decoration: none;
      color: inherit;
    }
    body a:hover {
      color: inherit;
      opacity: 0.7;
    }
    body .container {
      min-width: 500px;
      margin: 0 auto;
      padding: 0 30px;
    }
    body .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }
    body .left {
      float: left;
    }
    body .right {
      float: right;
    }
    body .helper {
      height: 100%;
    }

    header {
      height: 40px;
      margin-top: 20px;
      margin-bottom: 40px;
      padding: 0px 5px 0;
    }
    header figure {
      float: left;
      width: 40px;
      margin-right: 10px;
    }
    header figure img {
      height: 40px;
    }
    header .company-info {
      color: #BDB9B9;
    }
    header .company-info .title {
      margin-bottom: 5px;
      color: #2A8EAC;
      font-weight: 600;
      font-size: 2em;
    }
    header .company-info .line {
      display: inline-block;
      height: 9px;
      margin: 0 4px;
      border-left: 1px solid #2A8EAC;
    }

    section .details {
      min-width: 500px;
      margin-bottom: 40px;
      padding: 10px 35px;
      background-color: #a12421;
      color: #ffffff;
    }
    section .details .client {
      width: 50%;
      line-height: 16px;
    }
    section .details .client .name {
      font-weight: 600;
    }
    section .details .data {
      width: 50%;
      text-align: right;
    }
    section .details .title {
      margin-bottom: 15px;
      font-size: 3em;
      font-weight: 400;
      text-transform: uppercase;
    }
    section .table-wrapper {
      position: relative;
      overflow: hidden;
    }
    section .table-wrapper:before {
      content: "";
      display: block;
      position: absolute;
      top: 33px;
      left: 30px;
      width: 90%;
      height: 100%;
      border-top: 2px solid #BDB9B9;
      border-left: 2px solid #BDB9B9;
      z-index: -1;
    }
    section .no-break {
      page-break-inside: avoid;
    }
    section table {
      width: 100%;
      margin-bottom: -20px;
      table-layout: fixed;
      border-collapse: separate;
      border-spacing: 5px 20px;
    }
    section table .no {
      width: 15%;
    
    }
    section table .desc {
      width: 55%;
    }
    section table .qty, section table .unit, section table .total {
      width: 15%;
    }
    section table tbody.head {
      vertical-align: middle;
      border-color: inherit;
    }
    section table tbody.head th {
      text-align: center;
      color: white;
      font-weight: 600;
      text-transform: uppercase;
    }
    section table tbody.head th div {
      display: inline-block;
      padding: 7px 0;
      width: 100%;
      background: #BDB9B9;
    }
    section table tbody.head th.desc div {
      width: 115px;
      margin-left: -110px;
    }
    section table tbody.body td {
      padding: 10px 5px;
      background: #F3F3F3;
      text-align: center;
    }
    section table tbody.body h3 {
      margin-bottom: 5px;
      color: #a12421;
      font-weight: 600;
    }
    section table tbody.body .no {
      padding: 0px;
      background-color: #a12421;
      color: #ffffff;
      font-size: 1.66666666666667em;
      font-weight: 600;
      line-height: 50px;
    }
    section table tbody.body .desc {
      padding-top: 0;
      padding-bottom: 0;
      background-color: transparent;
      color: #777787;
      text-align: left;
    }
    section table tbody.body .total {
      color: #2A8EAC;
      font-weight: 600;
    }
    section table tbody.body tr.total td {
      padding: 5px 10px;
      background-color: transparent;
      border: none;
      color: #777777;
      text-align: right;
    }
    section table tbody.body tr.total .empty {
      background: white;
    }
    section table tbody.body tr.total .total {
      font-size: 1.18181818181818em;
      font-weight: 600;
      color: #2A8EAC;
    }
    section table.grand-total {
      margin-top: 40px;
      margin-bottom: 0;
      border-collapse: collapse;
      border-spacing: 0px 0px;
      margin-bottom: 40px;
    }
    section table.grand-total tbody td {
      padding: 0 10px 10px;
      background-color: #a12421;
      color: #ffffff;
      font-weight: 400;
      text-align: right;
    }
    section table.grand-total tbody td.no, section table.grand-total tbody td.desc, section table.grand-total tbody td.qty {
      background-color: transparent;
    }
    section table.grand-total tbody td.total, section table.grand-total tbody td.grand-total {
      border-right: 5px solid #ffffff;
    }
    section table.grand-total tbody td.grand-total {
      padding: 0;
      font-size: 1.16666666666667em;
      font-weight: 600;
      background-color: transparent;
    }
    section table.grand-total tbody td.grand-total div {
      float: right;
      padding: 10px 5px;
      background-color: #f6524e;
    }
    section table.grand-total tbody td.grand-total div span {
      margin-right: 5px;
    }
    section table.grand-total tbody tr:first-child td {
      padding-top: 10px;
    }

    footer {
      margin-bottom: 20px;
      padding: 0 5px;
    }
    footer .thanks {
      margin-bottom: 40px;
      color: #2A8EAC;
      font-size: 1.16666666666667em;
      font-weight: 600;
    }
    footer .notice {
      margin-bottom: 25px;
    }
    footer .end {
      padding-top: 5px;
      border-top: 2px solid #2A8EAC;
      text-align: center;
    }

  </style>
</head>

<body>
  <header class="clearfix">
    <div class="container">
      <figure>
      <img src="{{ asset('images/icons/logo-shopp.png') }}" style="width: 140px; height: 60px;">
      </figure>
      {{-- <div class="company-info" style="margin-top: 37px;">
        
        <span style="margin-left: 95px;">455 Foggy Heights, AZ 85004, US</span>
        <span class="line"></span>
        <a class="phone" href="tel:602-519-0450">(602) 519-0450</a>
        <span class="line"></span>
        <a class="email" href="info@okulandisa.com">info@okulandisa.com</a>
      </div> --}}
    </div>
  </header>

  <section>
    <div class="details clearfix">
      <div class="client left">
        <p>FATURA PROFORMA</p>
        <p class="name">NIF: 00587021</p>
        <p>Tel: 997 602 038<br>
          Rua Nova Lisboa
        </p>
        <a href="info@okulandisa.com">info@okulandisa.com</a>
      </div>
      <div class="data right">
        <div class="title">Proforma</div>
        <div class="date">
          <?php
            $datenow = date('d/m/Y');
            $date = date('d/m/Y', strtotime('+5'));
            //$newDate = date('Y-m-d', ($date. ' + 3 days'));

           ?>
          Data de Emissão: {{ $datenow }}<br>
          Data de Termino: {{ $date }}

        </div>
      </div>
    </div>
    <div class="container">
      <div class="table-wrapper">
        <table>
          <tbody class="head">
            <tr>
              <th class="no"></th>
              <th class="desc"><div style="margin-left: 120px;">Description</div></th>
              <th class="qty"><div>Quantidade</div></th>
              <th class="unit"><div>Unit price</div></th>
              <th class="total"><div>Total</div></th>
            </tr>
          </tbody>

          @foreach(Cart::content() as $item)
         
          
          <tbody class="body">
            <tr>
              <td class="no"><img src="">01</td>
              <td class="desc"> {{ $item->model->name }}</h3>{{ $item->model->details }}</td>
              <td class="qty">{{ $item->qty }}</td>
              <td class="unit">{{ $item->model->presentPrice() }} Kz</td>

              <td class="total">{{ $item->qty * 2}} </td>
            </tr>
            
          </tbody>
          @endforeach
        </table>
      </div>
      <div class="no-break">
        <table class="grand-total">
          <tbody>
            <tr>
              <td class="no"></td>
              <td class="desc"></td>
              <td class="qty"></td>
              <td class="unit">SUBTOTAL:</td>
              <td class="total">{{ presentPrice(Cart::subtotal())}} kz</td>
            </tr>
            <tr>
              <td class="no"></td>
              <td class="desc"></td>
              <td class="qty"></td>
              <td class="unit">Taxa 13%:</td>
              <td class="total">{{ presentPrice(Cart::tax()) }} Kz</td>
            </tr>
            <tr>
              <td class="grand-total" colspan="5"><div><span>TOTAL:</span>{{ presentPrice(Cart::total()) }} Kz</div></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

</body>

</html>
