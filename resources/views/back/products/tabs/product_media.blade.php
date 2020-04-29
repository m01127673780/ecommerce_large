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
                        },
                        addRemoveLinks:true,
                        removedfile:function(file)
                        {
                            //alert(file.fid);
                            $.ajax({
                                dataType: 'json',
                                type: 'post',
                                url: '{{ aurl('delete/image') }}',
                                data: {_token: '{{csrf_token() }}', id: file.fid}
                            });

                            var fmok;
                            return (fmok = file.previewElement) !=null ? fmok .parentNode.removeChild(file.previewElement):void 0;
                                },
                        init:function() {
                                    @foreach($products->files()->get() as  $file)
                            var mock = {
                                    name: '{{ $file->file_type}}',
                                    fid: '{{ $file->id}}',
                                    size: '{{ $file->size}}',
                                    type: '{{ $file->mime_type}}'
                                };
                            this.emit('addedfile', mock);
                            this.options.thumbnail.call(this, mock, '{{ url('public/storage/'.$file->full_file) }}');

                            @endforeach
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
    .dropzone .dz-preview .dz-image img {

        width: 100%;
        height: 100%;

    }
    .dropzone .dz-preview .dz-image {

        z-index: 99999!important;
    }
    .dropzone .dz-preview:hover .dz-image img {
        -webkit-transform: scale(1.05, 1.05);
        -moz-transform: scale(1.05, 1.05);
        -ms-transform: scale(1.05, 1.05);
        -o-transform: scale(1.05, 1.05);
        transform: scale(1.05, 1.05);
        -webkit-filter:  brightness(0.5);
        filter:  brightness(0.5) !important;

    }
    /*.dropzone .dz-preview .dz-image img*/
    /*{*/
    /*    width: 150px!important;*/
    /*    height: 150px!important;*/
    /* }*/



    .dropzone .dz-preview .dz-remove {
        font-size: 14px;
        text-align: center;
        display: block;
        cursor: pointer;
        border: none;
        color: #fff;
        margin-top: 10px;
    }
</style>

@push('js')
<script>
$(document).ready(function(){
    $('.dropzone .dz-preview .dz-remove ').addClass('btn btn-danger');

});
</script>
@endpush