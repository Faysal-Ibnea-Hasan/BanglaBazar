<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
    @foreach ($boxes as $key => $box)
        <div class=" m-2 small-box {{$box['color']}}">
            <div class="inner">
                <h3>{{$box['count']}}</h3>
                <p>{{$box['title']}}</p>
            </div>
            <div class="icon">
                <i class="{{$box['icon']}}"></i>
            </div>
            <a href="{{$box['route']}}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    @endforeach

</div>
