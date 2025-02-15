 @extends('admin.master')
 @section('title', 'looding')
 @section('content')
     <div class="breadcome-area">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="breadcome-list">
                         <div class="row">
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                 <div class="breadcomb-wp">
                                     <div class="breadcomb-icon">
                                         <i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.1988 3.30011C9.39965 3.76038 9.18935 4.29633 8.72908 4.49719C7.5039 5.03184 6.42834 5.85848 5.59643 6.90483C4.76452 7.95119 4.20161 9.1854 3.95689 10.4996C3.71217 11.8137 3.7931 13.1678 4.1926 14.4435C4.59211 15.7192 5.29803 16.8776 6.24864 17.8174C7.19926 18.7572 8.36562 19.4498 9.64576 19.8348C10.9259 20.2197 12.2809 20.2851 13.5921 20.0254C14.9034 19.7657 16.1311 19.1887 17.1679 18.3449C18.2047 17.5011 19.019 16.4162 19.5396 15.185C19.7352 14.7225 20.2687 14.506 20.7313 14.7016C21.1938 14.8972 21.4102 15.4307 21.2146 15.8933C20.5783 17.3981 19.583 18.7241 18.3159 19.7554C17.0487 20.7867 15.5481 21.4919 13.9455 21.8093C12.3428 22.1268 10.6867 22.0468 9.12211 21.5763C7.55749 21.1059 6.13194 20.2593 4.97007 19.1106C3.80821 17.962 2.94542 16.5462 2.45714 14.987C1.96885 13.4279 1.86994 11.7728 2.16904 10.1666C2.46814 8.56044 3.15615 7.05195 4.17293 5.77307C5.1897 4.4942 6.50427 3.48386 8.00172 2.8304C8.46199 2.62954 8.99794 2.83984 9.1988 3.30011Z" fill="#fff"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.3601 2.26633C11.5306 2.0958 11.7619 2 12.003 2C13.3165 2 14.6172 2.25871 15.8307 2.76137C17.0442 3.26403 18.1469 4.00079 19.0757 4.92958C20.0045 5.85836 20.7412 6.961 21.2439 8.17452C21.7465 9.38804 22.0052 10.6887 22.0052 12.0022C22.0052 12.5044 21.5981 12.9115 21.0959 12.9115H12.003C11.5009 12.9115 11.0938 12.5044 11.0938 12.0022V2.90929C11.0938 2.66813 11.1895 2.43685 11.3601 2.26633ZM12.9123 3.86925V11.0929H20.136C20.0507 10.3304 19.8585 9.58211 19.5637 8.87046C19.1525 7.87758 18.5496 6.97543 17.7897 6.21551C17.0298 5.45559 16.1277 4.85279 15.1348 4.44152C14.4231 4.14675 13.6749 3.95451 12.9123 3.86925Z" fill="#FFC300"/>
                                          </svg></i>
                                     </div>
                                     <div class="breadcomb-ctn">
                                         <h2>Painel Administrativo</h2>
                                         <p>Seja Bem vindo!</span></p>
                                     </div>
                                 </div>
                             </div>
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                 {{-- <div class="breadcomb-report">
                                     <button data-toggle="tooltip" data-placement="left" title="Download Report"
                                         class="btn"><i class="icon nalika-download"></i></button>
                                 </div> --}}
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     </div>
     <div class="section-admin container-fluid">
         <div class="row admin text-center">
             <div class="col-md-12">
                 <div class="row">
                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                             <h4 class="text-left text-uppercase"><b>Total de Pedidos:</b></h4>
                             <div class="row vertical-center-box vertical-center-box-tablet">
                                 {{-- <div class="col-xs-3 mar-bot-15 text-left">
                                     <label class="label bg-green">+3 (24H)<i class="fa fa-level-up"
                                             aria-hidden="true"></i></label>
                                 </div> --}}
                                 <div class="col-xs-12 cus-gh-hd-pro">
                                     <h2 class="text-right no-margin">{{ $total_orders }}</h2>
                                 </div>
                             </div>
                             <div class="progress progress-mini">
                                 <div style="width: 100%;" class="progress-bar bg-green"></div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                         <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                             <h4 class="text-left text-uppercase"><b>Total de vendas do Mês: </b></h4>
                             <div class="row vertical-center-box vertical-center-box-tablet">
                                 {{-- <div class="text-left col-xs-3 mar-bot-15">
                                     <label class="label bg-red">-13% <i class="fa fa-level-down"
                                             aria-hidden="true"></i></label>
                                 </div> --}}
                                 <div class="col-xs-12 cus-gh-hd-pro">
                                     <h2 class="text-right no-margin">{{presentPrice($total_sales)}} Kz</h2>
                                 </div>
                             </div>
                             <div class="progress progress-mini">
                                 <div style="width: 100%;" class="progress-bar progress-bar-danger bg-red"></div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                             <h4 class="text-left text-uppercase"><b>Pagamentos Pendentes:</b></h4>
                             <div class="row vertical-center-box vertical-center-box-tablet">
                                 {{-- <div class="text-left col-xs-3 mar-bot-15">
                                     <label class="label bg-blue">+1(24h) <i class="fa fa-level-up"
                                             aria-hidden="true"></i></label>
                                 </div> --}}
                                 <div class="col-xs-12 cus-gh-hd-pro">
                                     <h2 class="text-right no-margin">{{$pendent_payments}}</h2>
                                 </div>
                             </div>
                             <div class="progress progress-mini">
                                 <div style="width: 100%;" class="progress-bar bg-blue"></div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                             <h4 class="text-left text-uppercase"><b>Total de Clientes</b></h4>
                             <div class="row vertical-center-box vertical-center-box-tablet">
                                 {{-- <div class="text-left col-xs-3 mar-bot-15">
                                     <label class="label bg-purple">+24%(Mês) <i class="fa fa-level-up"
                                             aria-hidden="true"></i></label>
                                 </div> --}}
                                 <div class="col-xs-12 cus-gh-hd-pro">
                                     <h2 class="text-right no-margin">{{$total_users}}</h2>
                                 </div>
                             </div>
                             <div class="progress progress-mini">
                                 <div style="width: 100%;" class="progress-bar bg-purple"></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="product-sales-area mg-tb-30">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="product-sales-chart">
                         <div class="portlet-title">
                             <div class="row">
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                     <div class="caption pro-sl-hd">
                                         <span class="caption-subject text-uppercase"><b>Gráfico Geral de Vendas</b></span>
                                     </div>
                                 </div>
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                     <div class="actions graph-rp">
                                         <div class="btn-group" data-toggle="buttons">
                                             <label class="btn btn-grey active">
                                                 <input type="radio" name="options" class="toggle" id="option1"
                                                     checked="">Today</label>
                                             <label class="btn btn-grey">
                                                 <input type="radio" name="options" class="toggle"
                                                     id="option2">Week</label>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div id="curved-line-chart" class="flot-chart-sts flot-chart curved-chart-statistic"></div>
                     </div>
                 </div>
                 {{-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                     <div class="white-box analytics-info-cs mg-b-30 res-mg-t-30">
                         <h3 class="box-title">Total Visit</h3>
                         <ul class="list-inline two-part-sp">
                             <li>
                                 <div id="sparklinedash"></div>
                             </li>
                             <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> <span
                                     class="counter sales-sts-ctn">8659</span></li>
                         </ul>
                     </div>
                     <div class="white-box analytics-info-cs mg-b-30">
                         <h3 class="box-title">Total Page Views</h3>
                         <ul class="list-inline two-part-sp">
                             <li>
                                 <div id="sparklinedash2"></div>
                             </li>
                             <li class="text-right"><i class="fa fa-level-up" aria-hidden="true"></i> <span
                                     class="counter sales-sts-ctn">7469</span></li>
                         </ul>
                     </div>
                     <div class="white-box analytics-info-cs mg-b-30">
                         <h3 class="box-title">Unique Visitor</h3>
                         <ul class="list-inline two-part-sp">
                             <li>
                                 <div id="sparklinedash3"></div>
                             </li>
                             <li class="text-right"><i class="fa fa-level-up" aria-hidden="true"></i> <span
                                     class="counter sales-sts-ctn">6011</span></li>
                         </ul>
                     </div>
                     <div class="white-box analytics-info-cs">
                         <h3 class="box-title">Bounce Rate</h3>
                         <ul class="list-inline two-part-sp">
                             <li>
                                 <div id="sparklinedash4"></div>
                             </li>
                             <li class="text-right"><i class="fa fa-level-down" aria-hidden="true"></i> <span
                                     class="sales-sts-ctn">18%</span></li>
                         </ul>
                     </div>
                 </div> --}}
             </div>
         </div>
     </div>
     {{-- <div class="traffic-analysis-area">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                     <div class="white-box tranffic-als-inner">
                         <h3 class="box-title"><small class="pull-right m-t-10 text-success last-month-sc cl-one"><i
                                     class="fa fa-sort-asc"></i> 18% last month</small> Site Traffic</h3>
                         <div class="stats-row">
                             <div class="stat-item">
                                 <h6>Overall Growth</h6>
                                 <b>80.40%</b>
                             </div>
                             <div class="stat-item">
                                 <h6>Montly</h6>
                                 <b>15.40%</b>
                             </div>
                             <div class="stat-item">
                                 <h6>Day</h6>
                                 <b>5.50%</b>
                             </div>
                         </div>
                         <div id="sparkline8"></div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                     <div class="white-box tranffic-als-inner res-mg-t-30">
                         <h3 class="box-title"><small class="pull-right m-t-10 text-danger last-month-sc cl-two"><i
                                     class="fa fa-sort-desc"></i> 18% last month</small>Site Traffic</h3>
                         <div class="stats-row">
                             <div class="stat-item">
                                 <h6>Overall Growth</h6>
                                 <b>80.40%</b>
                             </div>
                             <div class="stat-item">
                                 <h6>Montly</h6>
                                 <b>15.40%</b>
                             </div>
                             <div class="stat-item">
                                 <h6>Day</h6>
                                 <b>5.50%</b>
                             </div>
                         </div>
                         <div id="sparkline9"></div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                     <div class="white-box tranffic-als-inner res-mg-t-30">
                         <h3 class="box-title"><small class="pull-right m-t-10 text-success last-month-sc cl-three"><i
                                     class="fa fa-sort-asc"></i> 18% last month</small>Site Traffic</h3>
                         <div class="stats-row">
                             <div class="stat-item">
                                 <h6>Overall Growth</h6>
                                 <b>80.40%</b>
                             </div>
                             <div class="stat-item">
                                 <h6>Montly</h6>
                                 <b>15.40%</b>
                             </div>
                             <div class="stat-item">
                                 <h6>Day</h6>
                                 <b>5.50%</b>
                             </div>
                         </div>
                         <div id="sparkline10"></div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="product-new-list-area">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                     <div class="single-new-trend mg-t-30">
                         <a href="#"><img src="img/new-product/5.png" alt=""></a>
                         <div class="overlay-content">
                             <a href="#">
                                 <h2>$280</h2>
                             </a>
                             <a href="#" class="btn-small">Now</a>
                             <div class="product-action">
                                 <ul>
                                     <li>
                                         <a data-toggle="tooltip" title="Shopping" href="#"><i
                                                 class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                     </li>
                                     <li>
                                         <a data-toggle="tooltip" title="Quick view" href="#"><i
                                                 class="fa fa-heart" aria-hidden="true"></i></a>
                                     </li>
                                 </ul>
                             </div>
                             <a class="pro-tlt" href="#">
                                 <h4>Princes Diamond</h4>
                             </a>
                             <div class="pro-rating">
                                 <i class="fa fa-star color"></i>
                                 <i class="fa fa-star color"></i>
                                 <i class="fa fa-star color"></i>
                                 <i class="icon nalika-half-filled-rating-star color"></i>
                                 <i class="icon nalika-half-filled-rating-star"></i>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                     <div class="single-new-trend mg-t-30">
                         <a href="#"><img src="img/new-product/5.png" alt=""></a>
                         <div class="overlay-content">
                             <a href="#">
                                 <h2>$280</h2>
                             </a>
                             <a href="#" class="btn-small">Now</a>
                             <div class="product-action">
                                 <ul>
                                     <li>
                                         <a data-toggle="tooltip" title="Shopping" href="#"><i
                                                 class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                     </li>
                                     <li>
                                         <a data-toggle="tooltip" title="Quick view" href="#"><i
                                                 class="fa fa-heart" aria-hidden="true"></i></a>
                                     </li>
                                 </ul>
                             </div>
                             <a href="#">
                                 <h4>Princes Diamond</h4>
                             </a>
                             <div class="pro-rating">
                                 <i class="fa fa-star color"></i>
                                 <i class="fa fa-star color"></i>
                                 <i class="fa fa-star color"></i>
                                 <i class="icon nalika-half-filled-rating-star color"></i>
                                 <i class="icon nalika-half-filled-rating-star"></i>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                     <div class="single-new-trend mg-t-30">
                         <a href="#"><img src="img/new-product/5.png" alt=""></a>
                         <div class="overlay-content">
                             <a href="#">
                                 <h2>$280</h2>
                             </a>
                             <a href="#" class="btn-small">Now</a>
                             <div class="product-action">
                                 <ul>
                                     <li>
                                         <a data-toggle="tooltip" title="Shopping" href="#"><i
                                                 class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                     </li>
                                     <li>
                                         <a data-toggle="tooltip" title="Quick view" href="#"><i
                                                 class="fa fa-heart" aria-hidden="true"></i></a>
                                     </li>
                                 </ul>
                             </div>
                             <a href="#">
                                 <h4>Princes Diamond</h4>
                             </a>
                             <div class="pro-rating">
                                 <i class="fa fa-star color"></i>
                                 <i class="fa fa-star color"></i>
                                 <i class="fa fa-star color"></i>
                                 <i class="icon nalika-half-filled-rating-star color"></i>
                                 <i class="icon nalika-half-filled-rating-star"></i>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                     <div class="single-new-trend mg-t-30">
                         <a href="#"><img src="img/new-product/5.png" alt=""></a>
                         <div class="overlay-content">
                             <a href="#">
                                 <h2>$280</h2>
                             </a>
                             <a href="#" class="btn-small">Now</a>
                             <div class="product-action">
                                 <ul>
                                     <li>
                                         <a data-toggle="tooltip" title="Shopping" href="#"><i
                                                 class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                                     </li>
                                     <li>
                                         <a data-toggle="tooltip" title="Quick view" href="#"><i
                                                 class="fa fa-heart" aria-hidden="true"></i></a>
                                     </li>
                                 </ul>
                             </div>
                             <a href="#">
                                 <h4>Princes Diamond</h4>
                             </a>
                             <div class="pro-rating">
                                 <i class="fa fa-star color"></i>
                                 <i class="fa fa-star color"></i>
                                 <i class="fa fa-star color"></i>
                                 <i class="icon nalika-half-filled-rating-star color"></i>
                                 <i class="icon nalika-half-filled-rating-star"></i>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="product-sales-area mg-tb-30">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <div class="analytics-rounded">
                         <div class="analytics-rounded-content">
                             <h5>Percentage division</h5>
                             <h2><span class="counter">150</span>/<span class="counter">54</span></h2>
                             <div class="text-center">
                                 <div id="sparkline52"></div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                     <div class="analytics-rounded mg-b-30 res-mg-t-30">
                         <div class="analytics-rounded-content">
                             <h5>Percentage distribution</h5>
                             <h2><span class="counter">60</span>/20</h2>
                             <div class="text-center">
                                 <div id="sparkline51"></div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </div>

     <div class="calender-area mg-tb-30">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="calender-inner">
                         <div id='calendar'></div>
                     </div>
                 </div>
             </div>
         </div>
     </div> --}}

 @endsection
