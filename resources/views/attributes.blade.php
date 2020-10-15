
@foreach($projects->attributevalues as $cat)
<li>{{$cat->attribute->name}} : {{$cat->name}}</li>
@endforeach 