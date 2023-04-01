@extends('fontend.home_master')
@section('content')
    @php
        $first_bigthamnail = DB::table('posts')
            ->where('posts.first_section_thumbnail', 1)
            ->orderBy('id', 'desc')
            ->first();
        $first_section = DB::table('posts')
            ->where('first_section', 1)
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();
        
    @endphp
    <!-- 1st-news-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-sm-9">
                    <div class="row">
                        <div class="col-md-1 col-sm-1 col-lg-1"></div>
                        <div class="col-md-10 col-sm-10">
                            <div class="lead-news">
                                <div class="service-img"><a href="">
                                        <img src="{{ asset($first_bigthamnail->image) }}" width="800px" alt="Notebook"></a>
                                </div>
                                <div class="content">
                                    <h4 class="lead-heading-01"><a
                                            href="{{ url('single/post/' . $first_bigthamnail->id) }}">
                                            @if (session()->get('lang') == 'hindi')
                                                {{ $first_bigthamnail->title_hin }}
                                            @else
                                                {{ $first_bigthamnail->title_en }}
                                            @endif

                                        </a> </h4>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        @foreach ($first_section as $item)
                            <div class="col-md-3 col-sm-6">
                                <div class="top-news">
                                    <a href="{{ url('single/post/' . $item->id) }}"><img src="{{ asset($item->image) }}"
                                            alt="Notebook"></a>
                                    <h4 class="heading-02"><a href="{{ url('single/post/' . $item->id) }}">
                                            @if (session()->get('lang') == 'hindi')
                                                {{ $item->title_hin }}
                                            @else
                                                {{ $item->title_en }}
                                            @endif
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="add"><img src="{{ asset('fontend') }}/assets/img/top-ad.jpg" alt="" />
                            </div>
                        </div>
                    </div><!-- /.add-close -->

                    @php
                        $fcat = DB::table('categories')->first();
                        
                        $bigthumbnail = DB::table('posts')
                            ->where('category_id', $fcat->id)
                            ->where('big_thumbnail', 1)
                            ->first();
                        $bigthumbnailsmall = DB::table('posts')
                            ->where('category_id', $fcat->id)
                            ->where('big_thumbnail', null)
                            ->LIMIT(3)
                            ->GET();
                    @endphp
                    {{-- @dd( $bigthumbnail) --}}

                    <!-- news-start -->
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="bg-one">
                                <div class="cetagory-title"><a href="#">

                                        @if (session()->get('lang') == 'hindi')
                                            {{ $fcat->category_hin }}
                                        @else
                                            {{ $fcat->category_en }}
                                        @endif
                                        <span>
                                            @if (session()->get('lang') == 'hindi')
                                                खेल-कूद
                                            @else
                                                More
                                            @endif


                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </span>
                                    </a></div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            <a href="{{ url('single/post/' . $bigthumbnail->id) }}"><img
                                                    src="{{ asset($bigthumbnail->image) }}" alt="Notebook"></a>
                                            <h4 class="heading-02">
                                                <a href="{{ url('single/post/' . $bigthumbnail->id) }}">
                                                    @if (session()->get('lang') == 'hindi')
                                                        {{ $bigthumbnail->title_hin }}
                                                    @else
                                                        {{ $bigthumbnail->title_en }}
                                                    @endif
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($bigthumbnailsmall as $item)
                                            <div class="image-title">
                                                <a href="{{ url('single/post/' . $item->id) }}"><img
                                                        src="{{ asset($item->image) }}" alt="Notebook"></a>
                                                <h4 class="heading-03"><a href="{{ url('single/post/' . $item->id) }}">
                                                        @if (session()->get('lang') == 'hindi')
                                                            {{ $item->title_hin }}
                                                        @else
                                                            {{ $item->title_en }}
                                                        @endif
                                                    </a> </h4>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        @php
                            $secondcat = DB::table('categories')
                                ->skip(1)
                                ->first();
                            
                            $secondbigthumbnail = DB::table('posts')
                                ->where('category_id', $secondcat->id)
                                ->where('big_thumbnail', 1)
                                ->first();
                            $secondbigthumbnailsmall = DB::table('posts')
                                ->where('category_id', $secondcat->id)
                                ->where('big_thumbnail', null)
                                ->LIMIT(3)
                                ->GET();
                        @endphp
                        {{-- @dd($secondbigthumbnailsmall) --}}


                        <div class="col-md-6 col-sm-6">
                            <div class="bg-one">
                                <div class="cetagory-title"><a href="#">
                                        @if (session()->get('lang') == 'hindi')
                                            {{ $secondcat->category_hin }}
                                        @else
                                            {{ $secondcat->category_en }}
                                        @endif
                                        <span>
                                            @if (session()->get('lang') == 'hindi')
                                                खेल-कूद
                                            @else
                                                More
                                            @endif
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        </span>
                                    </a></div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="top-news">
                                            <a href="#"><img src="{{ asset($secondbigthumbnail->image) }}"
                                                    alt="Notebook"></a>
                                            <h4 class="heading-02"><a href="#">
                                                    @if (session()->get('lang') == 'hindi')
                                                        {{ $secondbigthumbnail->title_hin }}
                                                    @else
                                                        {{ $secondbigthumbnail->title_en }}
                                                    @endif
                                                </a> </h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        @foreach ($secondbigthumbnailsmall as $item)
                                            <div class="image-title">
                                                <a href="#"><img src="{{ asset($item->image) }}" alt="Notebook"></a>
                                                <h4 class="heading-03"><a href="#">
                                                        @if (session()->get('lang') == 'hindi')
                                                            {{ $item->title_hin }}
                                                        @else
                                                            {{ $item->title_en }}
                                                        @endif
                                                    </a> </h4>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <br>
                <div class="col-md-3 col-sm-3">
                    @php
                        $horizental = DB::table('ads')
                            ->skip(2)
                            ->first();
                        $horizental3 = DB::table('ads')
                            ->skip(3)
                            ->first();
                        
                    @endphp
                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <div class="sidebar-add"><a href="{{ $horizental->link }}"><img
                                        src="{{ asset($horizental->ads) }}" alt="" /></a></div>
                        </div>
                    </div><!-- /.add-close -->
                    <br><br>

                    @php
                        $tv = DB::table('live_tvs')->first();
                    @endphp
                    @if ($tv->status == 1)
                        <!-- youtube-live-start -->
                        <div class="cetagory-title-03">Live TV</div>
                        <div class="photo">
                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item"
                                style="margin-bottom:5px;">

                                <iframe width="729" height="410"
                                    src="https://www.youtube.com/embed/{{ $tv->embed_code }}" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div><!-- /.youtube-live-close -->
                    @endif
                    <br><br>


                    <!-- facebook-page-start -->
                    <div class="cetagory-title-03">Facebook </div>
                    <div class="fb-root">
                        facebook page here
                    </div><!-- /.facebook-page-close -->
                    <br><br>


                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add"><a href="{{ $horizental3->link }}"><img
                                        src="{{ asset($horizental3->ads) }}" alt="" /></a>

                            </div>
                        </div>
                    </div><!-- /.add-close -->
                </div>
            </div>
        </div>
    </section><!-- /.1st-news-section-close -->

    <!-- 2nd-news-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            @php
                $threeCat = DB::table('categories')
                    ->skip(2)
                    ->first();
                
                $threebigthumbnail = DB::table('posts')
                    ->where('category_id', $threeCat->id)
                    ->where('big_thumbnail', 1)
                    ->first();
                $threebigthumbnailsmall = DB::table('posts')
                    ->where('category_id', $threeCat->id)
                    ->where('big_thumbnail', null)
                    ->LIMIT(3)
                    ->GET();
            @endphp






            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        <div class="cetagory-title-02"><a href="#">
                                @if (session()->get('lang') == 'hindi')
                                    {{ $threeCat->category_hin }}
                                @else
                                    {{ $threeCat->category_en }}
                                @endif
                                <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus"
                                        aria-hidden="true"></i>
                                    @if (session()->get('lang') == 'hindi')
                                        सभी समाचार
                                    @else
                                        All News
                                    @endif

                                </span>
                            </a></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="#"><img src="{{ asset($threebigthumbnail->image) }}"
                                            alt="Notebook"></a>
                                    <h4 class="heading-02"><a href="#">
                                            @if (session()->get('lang') == 'hindi')
                                                {{ $threebigthumbnail->title_hin }}
                                            @else
                                                {{ $threebigthumbnail->title_en }}
                                            @endif
                                        </a> </h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                @foreach ($threebigthumbnailsmall as $item)
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset($item->image) }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">
                                                @if (session()->get('lang') == 'hindi')
                                                    {{ $item->title_hin }}
                                                @else
                                                    {{ $item->title_en }}
                                                @endif
                                            </a> </h4>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>


                @php
                    $fourCat = DB::table('categories')
                        ->skip(3)
                        ->first();
                    
                    $fourbigthumbnail = DB::table('posts')
                        ->where('category_id', $fourCat->id)
                        ->where('big_thumbnail', 1)
                        ->first();
                    $fourbigthumbnailsmall = DB::table('posts')
                        ->where('category_id', $fourCat->id)
                        ->where('big_thumbnail', null)
                        ->LIMIT(3)
                        ->GET();
                @endphp




                <div class="col-md-6 col-sm-6">
                    <div class="bg-one">
                        <div class="cetagory-title-02"><a href="#">
                                @if (session()->get('lang') == 'hindi')
                                    {{ $fourCat->category_hin }}
                                @else
                                    {{ $fourCat->category_en }}
                                @endif
                                <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus"
                                        aria-hidden="true"></i>
                                    @if (session()->get('lang') == 'hindi')
                                        सभी समाचार
                                    @else
                                        All News
                                    @endif
                                </span>
                            </a></div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="top-news">
                                    <a href="#"><img src="{{ asset($fourbigthumbnail->image) }}"
                                            alt="Notebook"></a>
                                    <h4 class="heading-02"><a href="#">
                                            @if (session()->get('lang') == 'hindi')
                                                {{ $fourbigthumbnail->title_hin }}
                                            @else
                                                {{ $fourbigthumbnail->title_en }}
                                            @endif
                                        </a> </h4>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">

                                @foreach ($fourbigthumbnailsmall as $item)
                                    <div class="image-title">
                                        <a href="#"><img src="{{ asset($item->image) }}" alt="Notebook"></a>
                                        <h4 class="heading-03"><a href="#">
                                                @if (session()->get('lang') == 'hindi')
                                                    {{ $item->title_hin }}
                                                @else
                                                    {{ $item->title_en }}
                                                @endif
                                            </a> </h4>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>







            </div>
            @php
                $horizentall = DB::table('ads')
                    ->skip(1)
                    ->first();
                $horizentalll = DB::table('ads')
                    ->skip(4)
                    ->first();
                
            @endphp



            <!-- add-start -->
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="add"> <a href="{{ $horizentall->link }}"><img src="{{ asset($horizentall->ads) }}"
                                alt="" /></div></a>

                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="add"> <a href="{{ $horizentalll->link }}"><img
                                src="{{ asset($horizentalll->ads) }}" alt="" /></div></a>
                </div>
            </div><!-- /.add-close -->

        </div>
    </section><!-- /.2nd-news-section-close -->

    <!-- 3rd-news-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 col-sm-9">
                    <div class="cetagory-title-02"><a href="#">Feature <i class="fa fa-angle-right"
                                aria-hidden="true"></i> all district news tab here <span><i class="fa fa-plus"
                                    aria-hidden="true"></i> All News </span></a></div>

                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="top-news">
                                <a href="#"><img src="{{ asset('fontend') }}/assets/img/news.jpg"
                                        alt="Notebook"></a>
                                <h4 class="heading-02"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('fontend') }}/assets/img/news.jpg"
                                        alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a>
                                </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('fontend') }}/assets/img/news.jpg"
                                        alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a>
                                </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('fontend') }}/assets/img/news.jpg"
                                        alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('fontend') }}/assets/img/news.jpg"
                                        alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a>
                                </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('fontend') }}/assets/img/news.jpg"
                                        alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a>
                                </h4>
                            </div>
                            <div class="image-title">
                                <a href="#"><img src="{{ asset('fontend') }}/assets/img/news.jpg"
                                        alt="Notebook"></a>
                                <h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- ******* -->
                    <br />
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right"
                                        aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব
                                        খবর </span></a></div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="bg-gray">
                                <div class="top-news">
                                    <a href="#"><img src="{{ asset('fontend') }}/assets/img/news.jpg"
                                            alt="Notebook"></a>
                                    <h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="news-title">
                                <a href="#">Facebook Messenger gets shiny new logo </a>
                            </div>
                            <div class="news-title">
                                <a href="#">Facebook Messenger gets shiny new logo </a>
                            </div>
                            <div class="news-title">
                                <a href="#">Facebook Messenger gets shiny new logo</a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="news-title">
                                <a href="#">Facebook Messenger gets shiny new logo </a>
                            </div>
                            <div class="news-title">
                                <a href="#">Facebook Messenger gets shiny new logo </a>
                            </div>
                            <div class="news-title">
                                <a href="#">Facebook Messenger gets shiny new logo </a>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    @php
                        $district = DB::table('districts')->get();
                    @endphp

                    <div class="col-md-12 col-sm-12">

                        <div class="cetagory-title-02"><a href="#">District Searching<i class="fa fa-angle-right"
                                    aria-hidden="true"></i> </a></div>
                        <br>
                       

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
                        <form action="{{ route('search.district') }}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-lg-5 ">
                                    <select class="form-control" name="district_id" id="exampleSelectGender">
                                        <option selected="" disabled="">--Select District</option>
                                        @foreach ($district as $row)
                                            <option value="{{ $row->id }}">{{ $row->district_en }} </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-lg-4 ">
                                    <select class="form-control" name="subdistrict_id" id="subdistrict_id">
                                        <option selected="" disabled="">--Select District</option>
                                    </select>

                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-success btn-block" type="submit">Search</button>

                                </div>
                            </div>
                        </form>
                    </div> <br><br>
                    @php
                        
                        $horizentalll = DB::table('ads')
                            ->skip(4)
                            ->first();
                        
                    @endphp


                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add">
                                <img src="{{ asset($horizentalll->ads) }}" alt="" />
                            </div>
                        </div>
                    </div><!-- /.add-close -->


                </div>

                @php
                    $latest = DB::table('posts')
                        ->orderBy('id', 'desc')
                        ->limit(5)
                        ->get();
                    $popular = DB::table('posts')
                        ->orderBy('id', 'desc')
                        ->inRandomOrder()
                        ->limit(5)
                        ->get();
                    $highest = DB::table('posts')
                        ->orderBy('id', 'asc')
                        ->inRandomOrder()
                        ->limit(5)
                        ->get();
                @endphp


                <div class="col-md-3 col-sm-3">
                    <div class="tab-header">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21"
                                    role="tab" data-toggle="tab" aria-expanded="false">
                                    @if (session()->get('lang') == 'hindi')
                                        सभी समाचार
                                    @else
                                        Latest
                                    @endif
                                </a>
                            </li>
                            <li role="presentation"><a href="#tab22" aria-controls="tab22" role="tab"
                                    data-toggle="tab" aria-expanded="true">
                                    @if (session()->get('lang') == 'hindi')
                                        सभी समाचार
                                    @else
                                        Popular
                                    @endif

                                </a></li>
                            <li role="presentation"><a href="#tab23" aria-controls="tab23" role="tab"
                                    data-toggle="tab" aria-expanded="true">
                                    @if (session()->get('lang') == 'hindi')
                                        सभी समाचार
                                    @else
                                        Highest
                                    @endif
                                </a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content ">
                            <div role="tabpanel" class="tab-pane in active" id="tab21">
                                <div class="news-titletab">
                                    @foreach ($latest as $item)
                                        <div class="news-title-02">
                                            <h4 class="heading-03"><a href="{{ url('single/post/' . $item->id) }}">
                                                    @if (session()->get('lang') == 'hindi')
                                                        {{ $item->title_hin }}
                                                    @else
                                                        {{ $item->title_en }}
                                                    @endif
                                                </a>
                                            </h4>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab22">
                                <div class="news-titletab">

                                    @foreach ($popular as $item)
                                        <div class="news-title-02">
                                            <h4 class="heading-03"><a href="{{ url('single/post/' . $item->id) }}">
                                                    @if (session()->get('lang') == 'hindi')
                                                        {{ $item->title_hin }}
                                                    @else
                                                        {{ $item->title_en }}
                                                    @endif
                                                </a>
                                            </h4>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab23">
                                <div class="news-titletab">

                                    @foreach ($highest as $item)
                                        <div class="news-title-02">
                                            <h4 class="heading-03"><a href="{{ url('single/post/' . $item->id) }}">
                                                    @if (session()->get('lang') == 'hindi')
                                                        {{ $item->title_hin }}
                                                    @else
                                                        {{ $item->title_en }}
                                                    @endif
                                                </a>
                                            </h4>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                        <br><br><br><br><br>


                        @php
                            $prayer = DB::table('prayers')->first();
                        @endphp



                        <!-- Namaj Times -->
                        <div class="cetagory-title-03">
                            @if (session()->get('lang') == 'english')
                                Prayer Time
                                प्रार्थना का समय
                            @else
                                Prayer Time
                            @endif

                        </div>

                        <table class="table">
                            <tr>
                                <th>
                                    @if (session()->get('lang') == 'english')
                                        फजर
                                    @else
                                        Fajar
                                    @endif
                                </th>
                                <th>{{ $prayer->fajar }}</th>
                            </tr>
                            <tr>
                                <th>
                                    @if (session()->get('lang') == 'english')
                                        फजर
                                    @else
                                        Johor
                                    @endif
                                </th>
                                <th>{{ $prayer->johor }}</th>
                            </tr>
                            <tr>
                                <th>
                                    @if (session()->get('lang') == 'english')
                                        फजर
                                    @else
                                        Achor
                                    @endif
                                </th>
                                <th>{{ $prayer->achor }}</th>
                            </tr>
                            <tr>
                                <th>
                                    @if (session()->get('lang') == 'english')
                                        फजर
                                    @else
                                        Magrib
                                    @endif
                                </th>
                                <th>{{ $prayer->magrib }}</th>
                            </tr>
                            <tr>
                                <th>
                                    @if (session()->get('lang') == 'english')
                                        फजर
                                    @else
                                        Esha
                                    @endif
                                </th>
                                <th>{{ $prayer->esha }}</th>
                            </tr>
                            <tr>
                                <th>
                                    @if (session()->get('lang') == 'english')
                                        फजर
                                    @else
                                        Jummah
                                    @endif
                                </th>
                                <th>{{ $prayer->jummah }}</th>
                            </tr>

                        </table>




                        {{-- <div class="cetagory-title-03">Old News </div>
                        <form action="" method="post">
                            <div class="old-news-date">
                                <input type="text" name="from" placeholder="From Date" required="">
                                <input type="text" name="" placeholder="To Date">
                            </div>
                            <div class="old-date-button">
                                <input type="submit" value="search ">
                            </div>
                        </form> --}}
                        <!-- news -->
                        <br>

                        @php
                            $web = DB::table('websites')->get();
                        @endphp
                        <div class="cetagory-title-04">
                            @if (session()->get('lang') == 'english')
                                Important Website
                            @else
                                महत्वपूर्ण वेबसाइट
                            @endif
                        </div>
                        <div class="">
                            @foreach ($web as $item)
                                <div class="news-title-02">
                                    <h4 class="heading-03"><a href="{{ $item->website_link }}"><i class="fa fa-check"
                                                aria-hidden="true"></i>
                                            {{ $item->website_name }}
                                        </a> </h4>
                                </div>
                            @endforeach


                        </div>

                    </div>
                </div>
            </div>
    </section><!-- /.3rd-news-section-close -->




    @php
        
        $bigphoto = DB::table('photos')
            ->where('type', 1)
            ->orderBy('id', 'desc')
            ->first();
        $smallphoto = DB::table('photos')
            ->where('type', 0)
            ->orderBy('id', 'desc')
            ->get();
        
    @endphp




    <!-- gallery-section-start -->
    <section class="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-7">
                    <div class="gallery_cetagory-title">
                        @if (session()->get('lang') == 'hindi')
                            फोटो गैलरी
                        @else
                            Photo Gallery
                        @endif

                    </div>

                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <div class="photo_screen">
                                <div class="myPhotos" style="width:100%">
                                    <img src="{{ asset($bigphoto->photo) }}" alt="Avatar">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="photo_list_bg">

                                @foreach ($smallphoto as $item)
                                    <div class="photo_img photo_border active">
                                        <img src="{{ asset($item->photo) }}" alt="image" onclick="currentDiv(1)">
                                        <div class="heading-03"> {{ $item->title }}
                                            {{-- @if (session()->get('lang') == 'hindi')
                                                    {{ $item->title_hin }}
                                                @else
                                                    {{ $item->title_en }}
                                                @endif --}}
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <!--=======================================
                                                                                                                        Video Gallery clickable jquary  start
                                                                                                                    ========================================-->

                    <script>
                        var slideIndex = 1;
                        showDivs(slideIndex);

                        function plusDivs(n) {
                            showDivs(slideIndex += n);
                        }

                        function currentDiv(n) {
                            showDivs(slideIndex = n);
                        }

                        function showDivs(n) {
                            var i;
                            var x = document.getElementsByClassName("myPhotos");
                            var dots = document.getElementsByClassName("demo");
                            if (n > x.length) {
                                slideIndex = 1
                            }
                            if (n < 1) {
                                slideIndex = x.length
                            }
                            for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                            }
                            x[slideIndex - 1].style.display = "block";
                            dots[slideIndex - 1].className += " w3-opacity-off";
                        }
                    </script>

                    <!--=======================================
                                                                                                                        Video Gallery clickable  jquary  close
                                                                                                                    =========================================-->

                </div>


                @php
                    
                    $bigvideos = DB::table('videos')
                        ->where('type', 1)
                        ->orderBy('id', 'desc')
                        ->first();
                    $smallvideos = DB::table('videos')
                        ->where('type', 0)
                        ->orderBy('id', 'desc')
                        ->get();
                    
                @endphp






                <div class="col-md-4 col-sm-5">
                    <div class="gallery_cetagory-title"> Video Gallery </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                        <iframe width="853" height="480"
                                            src="https://www.youtube.com/embed/{{ $bigvideos->embed_code }}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="gallery_sec owl-carousel">



                                @foreach ($smallvideos as $item)
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                        <iframe width="853" height="480"
                                            src="https://www.youtube.com/embed/{{ $item->embed_code }}" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>


                                    </div>
                                @endforeach




                            </div>
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                            showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                            showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                            var i;
                            var x = document.getElementsByClassName("myVideos");
                            var dots = document.getElementsByClassName("demo");
                            if (n > x.length) {
                                slideIndex = 1
                            }
                            if (n < 1) {
                                slideIndex = x.length
                            }
                            for (i = 0; i < x.length; i++) {
                                x[i].style.display = "none";
                            }
                            for (i = 0; i < dots.length; i++) {
                                dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                            }
                            x[slideIndex - 1].style.display = "block";
                            dots[slideIndex - 1].className += " w3-opacity-off";
                        }
                    </script>

                </div>
            </div>
        </div>
    </section><!-- /.gallery-section-close -->



    {{-- this json for district and subdisrict --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="district_id"]').on('change', function() {
                var district_id = $(this).val();
                console.log(district_id);
                if (district_id) {
                    $.ajax({
                        url: "{{ url('/get/subdistrict/fontend') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#subdistrict_id").empty();
                            $.each(data, function(key, value) {
                                $("#subdistrict_id").append('<option value="' + value
                                    .id + '">' + value.subdistrict_en + '</option>');
                            });
                            // console.log(data);
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
