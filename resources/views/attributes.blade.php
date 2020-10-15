
<div id='specs'></div>
<script src="/js/site/jquery.min.js"></script>
@php
$attr=[];
foreach($projects->attributevalues as $cat){
    $attr[$cat->attribute->id]=$cat->attribute->name;
}
 @endphp
<script>


var myelem=JSON.parse('@php echo json_encode($projects->attributevalues); @endphp');
var array=[];
var names=JSON.parse('@php echo json_encode($attr); @endphp');
myelem.forEach(function(entry) {
    if(!array[entry.attribute_id])
    array[entry.attribute_id]=[];
    array[entry.attribute_id].push(entry.name);
});
var html ='';

for (var key in names) {
    html+='<li>'+names[key]+': '+array[key].toString()+'</li>';
}
$('#specs').html(html);


</script>