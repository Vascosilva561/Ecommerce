<div class="container demo">
    <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                             
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <form action="{{ route('products.store') }}" method="post" role="form" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="PRODUCT NAME" name="name">
                                                    </div>

                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="16GB, 3CAMERAS 40,16, 8Mp" name="details">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Identificar" name="slug">
                                                    </div>
                                                     <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-tasks" aria-hidden="true"></i></span>

                                                        <select name="category_id" id="category_id" class="form-control">
                                                            <option value=""> -- Seleciona uma categoria --</option>
                                                            @foreach ($categories as $id=>$name)
                                                                <option value="{{$id}}">{{$name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Preço" name="price">
                                                    </div>

                                                     <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Quantidade " name="stock">
                                                    </div>

                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Estado " name="featured">
                                                    </div>

                                                     <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"></i></span>
                                                        <input type="file" class="form-control" name="image">
                                                    </div>

                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"></i></span>
                                                        <input type="file" name="img[]" multiple="true" class="form-control">
                                                    </div>

                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="" aria-hidden="true"></i></span>
                                                        <textarea type="text" class="form-control" placeholder="description" name="description"></textarea>
                                                    </div>


                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
                                                        </button>
                                                    <button type="" class="btn btn-ctl-bt waves-effect waves-light">Discard
                                                        </button>
                                                </div>
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

            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
    
    
</div><!-- container -->

<footer class="demo-footer">
    <a href="http://www.bootpen.com" target="_blank">Get more code snippets</a>
</footer>