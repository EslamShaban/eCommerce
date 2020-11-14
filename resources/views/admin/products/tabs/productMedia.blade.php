@push('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css" />

<script type="text/javascript">

    Dropzone.autoDiscover = false;

    $(document).ready(function(){

        
        $('#dropzonefileupload').dropzone({
            
            url:"{{aurl('upload/image/' . $Product->id)}}",
            paramName:'file',
            uploadMultiple:false,
            maxFiles:15,
            maxFilessize:3,
            dictRemoveFile: "{{trans('admin.delete')}}",
            addRemoveLinks:true,
            params:{
                _token: '{{ csrf_token() }}'
            },
            dictDefaultMessage: "{{trans('admin.upload_file_message')}}",
            removedfile: function(file){

                $.ajax({

                    url:"{{aurl('delete/image')}}",
                    dataType: 'json',
                    type: 'post',
                    data:{_token:'{{ csrf_token() }}', id: file.fid} 
                });

                var fmock;
                return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement):void 0;

            },
            init:function(){
                 @foreach($Product->files()->get() as $file)

                    var mock = {name:'{{$file->name}}', fid:'{{$file->id}}',size:'{{$file->size}}', type:'{{$file->mime_type}}'}
                    this.addFile.call(this, mock);
                    this.options.thumbnail.call(this, mock, "{{url('storage/'. $file->full_path)}}");
                 
                 @endforeach

                 this.on('sending', function(file, xhr, formData){
                    formData.append('fid', '');
                    file.fid = '';
                 });

                 this.on('success', function(file, response){

                    file.fid = response.id;

                 });
            }

        });

        $('#main_photo').dropzone({
            
            url:"{{aurl('update/image/' . $Product->id)}}",
            paramName:'file',
            uploadMultiple:false,
            maxFiles:1,
            maxFilessize:3,
            acceptedFiles:'image/*',
            dictRemoveFile: "{{trans('admin.delete')}}",
            addRemoveLinks:true,
            params:{
                _token: '{{ csrf_token() }}'
            },
            dictDefaultMessage: "{{trans('admin.main_photo')}}",
            removedfile: function(file){

                $.ajax({

                    url:"{{aurl('delete/product/image/' . $Product->id)}}",
                    dataType: 'json',
                    type: 'post',
                    data:{_token:'{{ csrf_token() }}'} 
                });

                var fmock;
                return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement):void 0;

            },
            init:function(){

                @if(!empty($Product->photo))
                
                    var mock = {name:'{{$Product->title}}',size:'', type:''}
                    this.addFile.call(this, mock);
                    this.options.thumbnail.call(this, mock, "{{url('storage/'. $Product->photo)}}");
                    
            
                @endif

                 this.on('sending', function(file, xhr, formData){
                    formData.append('fid', '');
                    file.fid = '';
                 });

                 this.on('success', function(file, response){

                    file.fid = response.id;

                 });
            }

        });

    });

</script>

@endpush

<div id="product_media" class="tab-pane fade">
    <h3>{{trans('admin.product_media')}}</h3>
    <hr>
    <center><h3>{{trans('admin.main_photo')}}</h3></center>
    <div class="dropzone" id="main_photo"></div>
    <hr>
    <center><h3>{{trans('admin.photos')}}</h3></center>
    <div class="dropzone" id="dropzonefileupload"></div>

</div>