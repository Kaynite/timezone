@extends('adminlte.layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header bg-primary">
                    {{ __('admin.posts.create title') }}
                </div>
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">{{ __('common.title') }}</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="{{ __('admin.posts.form.title placeholder') }}" value="{{ old('title') }}">
                            @error('title')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slug">{{ __('common.slug') }}</label>
                            <input type="slug" class="form-control" id="slug" name="slug" placeholder="{{ __('admin.posts.form.slug placeholder') }}" value="{{ old('slug') }}">
                            @error('slug')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">{{ __('common.content') }}</label>
                            <textarea class="form-control" name="content" id="content" rows="5">{{ old('content') }}</textarea>
                            @error('content')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">{{ __('admin.posts.form.image')  }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="site-logo">{{ __('common.choose file') }}</label>
                            </div>
                            @error('image')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">{{ __('common.submit') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@section('title')
{{ __('admin.posts.create title') }}
@endsection

@section('styles')
    {{-- Styles Goes Here --}}
@endsection

@section('scripts')
<script src="{{ asset('adminlte/js/custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>


<script>

$('#slug').on('focus', function() {
    var title = $('#title').val();
    if (title == "") {
        $('#slug').addClass('is-invalid');
        $('#slug-error').text('The Product title field is empty')
    } else {
        $.ajax({
            type: "GET",
            url: "{{ route('posts.makeslug') }}",
            data: {
                slug: 'slug',
                title: title
            },
            cache: false,
            context: this,
            success: function(data){
                if(data.status == 'success') {
                    $('#slug').val(data.slug)
                    $('#slug').removeClass('is-invalid');
                    $('#slug').addClass('is-valid');
                    $('#slug-error').text('')
                } else {
                    $('#slug').addClass('is-invalid');
                    $('#slug-error').text(data.message)
                }
            },
            error: function (error) {
                toastr.error(error.responseJSON.message);
            }
        });
    }
});

</script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{ route('posts.uploadImages', ['_token' => csrf_token() ]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>

@endsection