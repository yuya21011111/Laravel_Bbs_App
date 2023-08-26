<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center gap-x-4">
        <a href="{{ route('thread') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 153.469 200"><path d="M22.208,259.644a8.154,8.154,0,0,0-8.172,8.172V451.473a8.154,8.154,0,0,0,8.172,8.172H159.333a8.154,8.154,0,0,0,8.172-8.172V267.816a8.154,8.154,0,0,0-8.172-8.172ZM90.77,314.861A41.872,41.872,0,1,1,48.9,356.734a41.873,41.873,0,0,1,41.87-41.873Zm14.7,16.663L66.929,357l38.538,25.476Z" transform="translate(-14.036 -259.644)"/></svg>
        </a>
        <div class="max-w-4xl">
          <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ $thread->title }}</h1>
        </div>
      </div>
    </x-slot>
    
    <div class="pt-6 max-w-4xl mx-auto grid bg-white mt-4">
        @if(!empty($thread->fileName))
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <!-- 画像表示 -->
            <x-image-thumbnail :filename="$thread->fileName" type="images" />
        </div>
        @endif
      @if ($comments->count())
        @foreach ($comments as $comment)
        <x-comment-card :comment="$comment" />
        @endforeach
      @else
        コメントがありません。
      @endif
     
      @if($nice)
      <!-- 「いいね」取消用ボタンを表示 -->
      <div class="flex justify-end mb-4">
          <button  onclick="location.href='{{ route('unnice',['thread' => $thread->id])}}'"  class="bg-pink-500 rounded font-medium px-4 py-2 text-white"> 
            いいね♡
              <!-- 「いいね」の数を表示 -->
              <span class="badge">
                  {{ $thread->nices->count() }}
              </span>
          </button>
      </div>
      @else
      <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
       <div class="flex justify-end mb-4">
          <button onclick="location.href='{{ route('nice',['thread' => $thread->id])}}'"  class="bg-pink-500 rounded font-medium px-4 py-2 text-white">
           
              いいね♡
              <!-- 「いいね」の数を表示 -->
              <span class="badge">
                  {{ $thread->nices->count() }}
              </span>
          </button>
       </div>
      @endif

      <form action="{{ route('comment.store', $thread) }}" method="POST" class="m-4">
        @csrf
        <label for="body">{{ __('コメント') }}</label>
        <textarea name="body" id="body" cols="30" rows="4" class="w-full rounded-lg border-2 bg-gray-100 @error('comment') border-red-500 @enderror"></textarea>
        <span class="text-sm text-red-400">※ 紹介されている施設がいいと思った方はいいねしてあげてね！</span>
        <div class="mt-4">
          <button type="submit" class="bg-blue-500 rounded font-medium px-4 py-2 text-white">投稿する</button>
        </div>
      </form>
    </div>
  </x-app-layout>