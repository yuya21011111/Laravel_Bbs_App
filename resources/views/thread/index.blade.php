<x-app-layout>
    <x-slot name="header">
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         香川温泉情報一覧
        </h2>
        <div>
          {{-- <a href="{{ route('thread.create') }}">{{ __('温泉情報投稿') }}</a> --}}
          <div class="flex justify-end mb-4">
            <button onclick="location.href='{{ route('thread.create')}}'"  class="bg-yellow-500 rounded font-medium px-4 py-2 text-white">
                温泉情報登録
            </button>
          </div>
        </div>
      </div>
    </x-slot>
  
    <div class="py-12 max-w-4xl mx-auto bg-orange-200 sm:px-6 lg:px-8 grid gap-y-2 ">
      @if ($threads->count())
          @foreach ($threads as $thread)
              <x-thread-card :thread="$thread" />
          @endforeach
      @else
          現在スレッドがありません。
      @endif
    </div>
  </x-app-layout>