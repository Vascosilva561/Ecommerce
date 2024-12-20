<div class="modal right fade editcategories-{{ $category->id }}" id="myModal2" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel2">
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
                                            <div class="product-tab-list tab-pane fade active in" id="description">
                                                <form action="{{ url('admin/categories/update', $category->id) }}"
                                                    method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('UPDATE') }}
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                                            <div class="review-content-section">
                                                                <div class="input-group mg-b-pro-edt">
                                                                    <span class="input-group-addon"><i
                                                                            class="icon nalika-user"
                                                                            aria-hidden="true"></i></span>
                                                                    <input type="text" class="form-control"
                                                                        name="category"
                                                                        value="{{ $category->category }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="text-center custom-pro-edt-ds">
                                                                <button type="submit"
                                                                    class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
                                                                </button>
                                                                <button type="button"
                                                                    class="btn btn-ctl-bt waves-effect waves-light">Discard
                                                                </button>
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

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->


</div><!-- container -->
