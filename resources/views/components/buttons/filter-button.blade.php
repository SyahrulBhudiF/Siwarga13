<a id="{{$id}}" onclick="filterByRT('{{$id}}')"
   class="filterButton {{$dt['rt'] == $id? 'activeFilterButton' : ''}}">
    {{$slot}}
</a>
