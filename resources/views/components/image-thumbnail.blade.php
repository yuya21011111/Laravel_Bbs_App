@php 
if($type === 'images') {
  $path = 'storage/images/';
}

@endphp

<div>
  @if(empty($filename))
      <img src="{{ asset('images/no_images.png') }}">
  @else 
      <img class="mx-auto w-40 h-40 object-cover rounded-lg" src="{{ asset($path . $filename) }}" >
  @endif
</div>