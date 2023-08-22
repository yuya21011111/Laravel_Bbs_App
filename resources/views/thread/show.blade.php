<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center gap-x-4">
        <a href="{{ route('thread') }}">
          <img src="/left-arrow.svg" width="30" height="30" alt=""> 
        </a>
        <div class="max-w-4xl">
          <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ $thread->title }}</h1>
        </div>
      </div>
    </x-slot>
    
    <div class="pt-6 max-w-4xl mx-auto grid bg-white mt-4">
      @if ($comments->count())
        @foreach ($comments as $comment)
        <x-comment-card :comment="$comment" />
        @endforeach
      @else
        No comments
      @endif

      @if($nice)
      <!-- 「いいね」取消用ボタンを表示 -->
          <a href="{{ route('unnice', $thread) }}" class="btn btn-success btn-sm">
              いいね
              <!-- 「いいね」の数を表示 -->
              <span class="badge">
                  {{ $thread->nices->count() }}
              </span>
          </a>
      @else
      <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
          <a href="{{ route('nice', $thread) }}" class="btn btn-secondary btn-sm">
              いいね
              <!-- 「いいね」の数を表示 -->
              <span class="badge">
                  {{ $thread->nices->count() }}
              </span>
          </a>
      @endif
    </div>
  </x-app-layout>