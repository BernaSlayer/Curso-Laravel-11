


{{-- <div class="w-full border shadow-md rounded-md p-5"> 
    {{$slot}}

</div> --}}

@props(['type' => 'info' ,'bg' =>  true])
<div {{ $attributes->class(['w-full border shadow-md rounded-md p-5', 'bg-white' => $bg]) }}>
    {{ $slot }}

</div>


