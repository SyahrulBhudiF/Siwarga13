<a id="{{$id}}" onclick="filterByRT('{{$id}}')"
   class="filterButton {{$data['rt'] == $id? 'activeFilterButton' : ''}}">
    {{$slot}}
</a>
