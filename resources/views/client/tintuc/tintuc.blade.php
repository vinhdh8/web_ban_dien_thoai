@extends('layout.client')
@section('content')
<div class="blog-area pt-100 pb-100">
            <div class="container">
                <div class="row">        
                            <div class="col-lg-4 col-md-6">
                                    <div class="blog-wrap mb-50" data-aos="fade-up" data-aos-delay="'.$delay.'">
                                        <div class="blog-img-date-wrap mb-25">
                                            <div class="blog-img">
                                                <a href="#"><img src="{{ Storage::url('uploads/images/userbl.png') }}" alt=""></a>
                                            </div>
                                            <div class="blog-date">
                                                <h5></h5>
                                            </div>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-meta">
                                                <ul>
                                                    <li><a href="#">Furniture</a>,</li>
                                                    <li>By:<a href="#"></a></li>
                                                </ul>
                                            </div>
                                            <h3><a href="#"></a></h3>
                                            <p></p>
                                            <div class="blog-btn-2 btn-hover">
                                                <a class="btn hover-border-radius theme-color" href="#">Xem thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
                <div class="pagination-style-1" data-aos="fade-up" data-aos-delay="200">
                    <ul>
                        <li><a class="active" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a class="next" href="#"><i class=" ti-angle-double-right "></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
@endsection