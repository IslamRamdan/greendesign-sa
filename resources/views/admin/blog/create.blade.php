@extends('adminlte::page')

@section('title', 'إنشاء مدونة')

@section('content_header')
    <h1>إنشاء مقال جديد</h1>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">

            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- عنوان المقال --}}
                <div class="form-group">
                    <label>عنوان المقال</label>
                    <input type="text" name="title" class="form-control" placeholder="اكتب عنوان المقال" required>
                </div>

                {{-- محتوى المقال --}}
                <div class="form-group mt-3">
                    <label>المحتوى</label>
                    <textarea id="summernote" name="content" class="form-control" placeholder="اكتب محتوى المقال" required></textarea>
                </div>

                {{-- الصورة --}}
                <div class="form-group mt-3">
                    <label>الصورة</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <button class="btn btn-primary mt-3" type="submit">إنشاء</button>
            </form>

        </div>
    </div>

@stop

@section('css')
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
@stop

@section('js')
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300, // ارتفاع المحرر
                lang: 'ar-AR', // دعم العربية
                placeholder: 'اكتب محتوى المقال'
            });
        });
    </script>
@stop
