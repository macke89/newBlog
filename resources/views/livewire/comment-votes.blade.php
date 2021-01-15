<div>
    <a wire:click.prevent="vote(1)" href="#">
        <i class="fa fa-2x fa-sort-asc text-white" aria-hidden="true"></i>
    </a>
    <h2 class="text-white">{{ $comment->votes }}</h2>
    <a wire:click.prevent="vote(-1)" href="#">
        <i class="fa fa-2x fa-sort-desc text-white" aria-hidden="true"></i>
    </a>
</div>
