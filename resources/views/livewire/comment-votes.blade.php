<div>
    @auth()
        <a wire:click.prevent="vote(1)" href="#">
            <i class="fa fa-2x fa-sort-asc text-white" aria-hidden="true"></i>
        </a>
    @endauth
    <h2 class="text-white">{{ $commentSumVotes }}</h2>
    @auth()
        <a wire:click.prevent="vote(-1)" href="#">
            <i class="fa fa-2x fa-sort-desc text-white" aria-hidden="true"></i>
        </a>
    @endauth
</div>
