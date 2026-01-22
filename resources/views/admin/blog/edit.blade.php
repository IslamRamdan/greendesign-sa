@extends('adminlte::page')

@section('title', 'تعديل المقال')

@section('content_header')
    <h1>تعديل المقال</h1>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- عنوان المقال --}}
                <div class="form-group">
                    <label>عنوان المقال</label>
                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                </div>

                {{-- محتوى المقال --}}
                <div class="form-group mt-3">
                    <label>المحتوى</label>
                    <textarea id="summernote" name="content">{{ $blog->content }}</textarea>
                </div>

                {{-- الصورة الحالية --}}
                <div class="form-group mt-3">
                    <label>الصورة الحالية</label><br>
                    @if ($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" width="120">
                    @else
                        <p>لا يوجد صورة</p>
                    @endif
                </div>

                {{-- تغيير الصورة --}}
                <div class="form-group mt-3">
                    <label>تغيير الصورة</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button class="btn btn-success mt-3" type="submit">تحديث</button>
            </form>

        </div>
    </div>

@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
@stop

@section('js')
    <!-- Summernote JS فقط -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                lang: 'ar-AR',
                placeholder: 'اكتب محتوى المقال'
            });

            $('form').on('submit', function(e) {
                if ($('#summernote').summernote('isEmpty')) {
                    alert('المحتوى لا يمكن أن يكون فارغًا');
                    e.preventDefault();
                }
            });
        });
    </script>
@stop
