<a id="{{$id}}" onclick="filterByRT('{{$id}}')"
   class="filterButton cursor-pointer {{$data['rt'] == $id? 'activeFilterButton' : ''}}">
    {{$slot}}
</a>
