
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                    @if(isset($sayfa))         
                    <li><a href="{{url('/')}}">Home Page<i class="ti-arrow-right"></i></a></li>
                    <li class="active">{{ $sayfa }}</a></li>
                    @elseif(app('request')->input('search')!==null || app('request')->input('cat')!==null)
                    <li><a href="{{url('/')}}">Home Page<i class="ti-arrow-right"></i></a></li> 
                        @if(app('request')->input('cat')!==null)
                        <li class="active"><a href ='{!! route('products',['search'=>app('request')->input('search')]) !!}'>
                            Kategori '{{ $cat }}'
                            @if(app('request')->input('search')!==null)
                            içerisinde
                            <i class="ti-arrow-right"></i>
                            @endif
                        </a></li></a>
                        @endif
                        @if(app('request')->input('search')!==null)
                        <a href ='{!! route('products',['cat'=>app('request')->input('cat')]) !!}'>
                        <li class="active">Search Result '{{ app('request')->input('search') }}'</a></li>
                        </a>
                        @endif
                    @else
                    <li><a href="{{url('/')}}">Home Page</a></li>
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>