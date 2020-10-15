
@foreach($projects->attributevalues as $cat)
<li>
    @if($cat->attribute)
    {{$cat->attribute->name}}
    @endif
    {{$cat->name}}</li>
@endforeach 