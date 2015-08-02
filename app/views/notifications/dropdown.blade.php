@foreach($notifis as $notifi)
<li><a href="{{ route('donor.edit', $notifi->id) }}">{{ $notifi->name }}</a></li>
@endforeach