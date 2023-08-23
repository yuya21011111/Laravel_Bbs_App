@props(['thread' => $thread])

<a href="{{ route('thread.show', $thread->id) }}" class="p-4 block grid bg-white sm:rounded-lg border-1 shadow-sm">
    <span>
        {{ $thread->title }}
    </span>
    <span class="text-gray-600 text-sm">
        {{ $thread->created_at->diffForHumans() }}
    </span>
</a>