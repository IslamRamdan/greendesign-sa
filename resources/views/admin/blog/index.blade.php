@extends('adminlte::page')

@section('title', 'عرض المدونات')

@section('content_header')
    <h1>عرض جميع المقالات</h1>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <div class="card">
        <div class="card-body">

            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary mb-3">إضافة مقال جديد</a>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الصورة</th>
                        <th>العنوان</th>
                        <th>المحتوى</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                @if ($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" width="80">
                                @else
                                    لا يوجد صورة
                                @endif
                            </td>

                            <td>{{ $blog->title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 80) }}</td>

                            <td>
                                <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-sm btn-primary">تعديل</a>

                                <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('هل أنت متأكد من حذف هذا المقال؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@stop
