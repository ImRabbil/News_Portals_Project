@extends('fontend.home_master')
@section('content')
    <!-- archive_page-start -->
    <section class="single_page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="single_info">
                        <span>
                            {{-- @foreach ($subcat as $item)
                              @once
                                {{$item->subcategory_en}}
                               @endonce
                            @endforeach --}}
                        </span>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8">
                    {{-- <div class="row">
                        
                      
                    </div> --}}
                    <div class="archive_post_sec_again">
                        @foreach ($subcat as $item)
                            <div class="row">
                                <div class="col-md-4 col-sm-5">
                                    <div class="archive_img_again">
                                        <a href="#"><img src="{{ asset($item->image) }}" alt="Notebook"></a>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-7">
                                    <div class="archive_padding_again">
                                        <div class="archive_heading_01">
                                            <a href="#">{{ $item->title_en }}</a>
                                        </div>
                                        <div class="archive_dtails">
                                            {!! Str::limit($item->details_en, '200') !!}
                                        </div>
                                        <div class="dtails_btn"><a href="{{ url('single/post/' . $item->id) }}">Read
                                                More...</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-3 col-sm-4">
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
                    <!-- add-start -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="sidebar-add"><img src="{{ asset('fontend') }}/assets/img/add_01.jpg"
                                    alt="" /></div>
                        </div>
                    </div><!-- /.add-close -->
                    <div class="tab-header">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab"
                                    data-toggle="tab" aria-expanded="false">
                                    @if (session()->get('lang') == 'hindi')
                                        सभी समाचार
                                    @else
                                        Latest
                                    @endif
                                </a>
                            </li>
                            <li role="presentation"><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab"
                                    aria-expanded="true">
                                    @if (session()->get('lang') == 'hindi')
                                        सभी समाचार
                                    @else
                                        Popular
                                    @endif

                                </a></li>
                            <li role="presentation"><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab"
                                    aria-expanded="true">
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
                        <br><br>
                        <!-- add-start -->
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="sidebar-add"><img src="{{ asset('fontend') }}/assets/img/add_01.jpg"
                                        alt="" /></div>
                            </div>
                        </div><!-- /.add-close -->
                    </div>
                </div>
            </div>
    </section>
@endsection
