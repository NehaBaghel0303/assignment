@foreach ($records  as $key => $record)
{{-- @dd($record) --}}
    {{-- @php
        $items = json_decode($record['data'],true)
    @endphp --}}
    {{-- @foreach ($items as $item)   --}}
    <li>{{ $record->title}}</li> 
    {{-- @endforeach --}}
@endforeach