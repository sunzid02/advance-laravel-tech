<select name="{{ $field ?? 'channel_id' }}" id="{{ $field ?? 'channel_id' }}">

    @foreach($channels as $channel)
        <option value="{{$channel->name}}">{{ $channel->name }}</option>
    @endforeach

</select>