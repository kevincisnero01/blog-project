<x-app-layout>
<div class="container">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
        @foreach ($posts as $post)
            <article 
                class="w-full h-80 bg-cover bg-center @if($loop->first) sm:col-span-2 @endif"
                style="background-image: 
                url(
                    @if($post->image)
                        {{asset(Storage::url($post->image->url))}}
                    @else
                        https://cdn.pixabay.com/photo/2022/12/03/15/00/maui-7632875_960_720.jpg
                    @endif
                )" 
            >
                <div class=" w-full h-full px-8 flex flex-col justify-center">
                    <div>
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('posts.tag',$tag) }}" class="inline-block h-6 px-3 text-white bg-{{$tag->color}}-600 mb-2 rounded-full" >
                                {{ $tag->name }}
                            </a>    
                        @endforeach
                    </div>
                    <h1 class="text-4xl  text-white leading-8 font-bold">
                        <a href="{{ route('posts.show', $post) }}">
                            {{ $post->name }}
                        </a>
                    </h1>
                </div>
            </article>
        @endforeach
    </div>
    <div class="my-4">
        {{ $posts->links() }}
    </div>
</div>
</x-app-layout>