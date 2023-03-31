@foreach($data as $dt)
    <option value="{{ $dt->id }}">{{ $dt->name }}</option>
@endforeach