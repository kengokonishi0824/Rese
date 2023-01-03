<div>
    <input type="time" wire:model="reservation">
	    <h1>gggg{{ $reservation }}</h1>
        <p>{{ $reservation }}</p>
    <input type="text" wire:model="test">
	    <h1>{{ $test }}</h1>
        <p>aaaa{{ $test }}</p>
        <p class="confirm-c">Date　{{ $restaurants }}</p>
        <p class="confirm-c">Date　{{ $reservation }}</p>
        <p class="confirm-">Time　{{$reservation}}</p>
        <p class="confirm-conent">Number　{{$reservation}}</p>
</div>