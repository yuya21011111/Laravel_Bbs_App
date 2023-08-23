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

      <form action="{{ route('comment.store', $thread) }}" method="POST" class="m-4">
        @csrf
        <label for="body">{{ __('Comment') }}</label>
        <textarea name="body" id="body" cols="30" rows="4" class="w-full rounded-lg border-2 bg-gray-100 @error('comment') border-red-500 @enderror"></textarea>
        <div class="mt-4">
          <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">{{ __('Submit') }}</button>
        </div>
      </form>
    </div>
  </x-app-layout>