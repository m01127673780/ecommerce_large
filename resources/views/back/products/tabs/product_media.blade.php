<div id="product_media" class="container container tab-pane active"><br>
    <center><h4>{{ trans('admin.product_media') }}</h4> </center>
    <aside class="content_tab_info  tab_product_media">
        @php use App\File; @endphp
        @push('js')
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
            <script type="text/javascript">
                Dropzone.autoDiscover = false;
                $(document).ready(function () {
                    $('#dropzonefileupload').dropzone({
                        url:"{{ aurl('upload/image/'.$products->id) }}",
                        paramName:'file',
                        uploadMultiple:false,
                        maxFiles:150,
                        maxFilessaze:10,
                        acceptedFiles:'image/*',
                        dictDefaultMessage:' {{ trans('admin.click_here_to_upload_files') }}  ',
                        dictRemoveFile:"{{ trans('admin.delete') }} ",
                        params:{
                            _token:'{{csrf_token() }}'
                        }
                    });
                });
            </script>
        @endpush
        <div class="dropzone" id="dropzonefileupload"> </div>
    </aside><!--content_tab_info product_media-->
</div>
<style>
    .dropzone{
        background: #722b2b!important;
        color: #fff;
        margin: 25px 0;
    }
    .dropzone .dz-preview.dz-image-preview {
        background: transparent!important;
    }
</style>