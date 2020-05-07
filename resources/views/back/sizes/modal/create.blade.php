<!-- start  Modal lg  Modal lg Create New record--------------- -->
<div class="modal fade bd-example-modal-lg" id="createNewflavor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- start  Modal lg---------------- -->
            <div class="modal-body">
                <div class="container-fluid">
                    {{-- -------------------------------------------------------}}
                    <div class="box">
                        <div class="box-header">
                            <button type="button" class="close" data-dismiss="modal"><apan class="btn btn-danger">&times;</apan></button>

                            <center class="box-title"><h3 class="head_title">{{ trans('admin.create_create') }}</h3></center>
                        </div>
                        <section class="modal_massage"> @include('back.message_error') </section>
                        <!-- /.box-header ,'required'=>'required' -->
                        <!-- /.----------------------------------------------------------------- -->
                        <div class="box-body">
                            {!! Form::open(['url'=>aurl('flavors/create_quick'),'files'=>true]) !!}
                            <section class="form_modal_create">@include('back.sizes.form.create')</section>
                            {!! Form::close() !!}
                        </div><!-- box-body-->
                        <!-- /.----------------------------------------------------------------- -->
                    </div><!-- /.box -->
                    {{-- -----------------------------------------------------------------------------}}
                </div><!-- /.container-fluid -->
            </div><!-- /.modal-body -->
            <!--  End   Modal  lg---------------- -->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog modal-lg -->
</div><!-- /.modal fade bd-example-modal-lg -->
<style>
    .modal-content{width: 120%;}
</style>
<!-- End  Modal lg Create New record  ---------------- -->

