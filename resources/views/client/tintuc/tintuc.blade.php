@extends('layout.client')
@section('content')
<div class="blog-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            @foreach($listTintuc as $tintuc)
            <div class="col-lg-4 col-md-6">
                <div class="blog-wrap mb-50" data-aos="fade-up" data-aos-delay="'.$delay.'">
                    <div class="blog-img-date-wrap mb-25">
                        <div class="blog-img">
                            <a href="#"><img src="{{ Storage::url($tintuc->hinh_anh) }}" alt=""></a>
                        </div>
                        <div class="blog-date" style="width:100px;border-radius: 10px;background-color: #f8f9fa;">
                            <h5>{{$tintuc->created_at->format('d-m-Y')}}</h5>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <ul>
                                <li><a href="#">Furniture</a>,</li>
                                <li>By:<a href="#">{{$tintuc->User->ten_dang_nhap}}</a></li>
                            </ul>
                        </div>
                        <h3><a href="#">{{ Str::limit($tintuc->tieu_de, 50, '...') }}</a></h3>
                        <p>{{ Str::limit($tintuc->noi_dung, 100, '...') }}</p>
                        <div class="blog-btn-2 btn-hover">
                            <a class="btn hover-border-radius theme-color" href="#">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Hiển thị các liên kết phân trang -->
        <div class="pagination-wrap">
            {{ $listTintuc->links()}}
        </div>
    </div>
</div>
@endsection