<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@yield('name-page')</h1>
                </div>
                <div class="col-sm-6">
                    @if(!empty($breadcrumbs))
                        <nav class="main-breadcrumb float-sm-right" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{url('admin')}}"><i class='fa fa-home'></i> Dashboard</a>
                                </li>
                                @foreach($breadcrumbs as $breadcrumb)
                                    <li class="breadcrumb-item {{$breadcrumb['class'] ?? ''}}">
                                        @if(!empty($breadcrumb['url']))
                                            <a href="{{url($breadcrumb['url'])}}">{{$breadcrumb['name']}}</a>
                                        @else
                                            {{$breadcrumb['name']}}
                                        @endif
                                    </li>
                                @endforeach

                            </ol>
                        </nav>
                    @endif
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            @yield('section-content')
        </div>
    </section>
</div>
