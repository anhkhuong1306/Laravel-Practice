    <x-layout>
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if (!empty($posts))
                <x-posts-grid :posts="$posts" />
            @else
                <p>No post yet.</p>
            @endif

        </main>
    </x-layout>
{{--    @extends('components.layout')--}}

{{--    @section('banner')--}}
{{--        <h1>My Blog</h1>--}}
{{--    @endsection--}}

{{--    @section('content')--}}
{{--        @foreach ($posts as $post)--}}
{{--            <article class="{{ $loop->even ? 'foobar' : '' }}">--}}
{{--                <h1>--}}
{{--                    <a href="<?php echo 'post/' . $post->id; ?>"><?php echo $post->title; ?></a>--}}
{{--                </h1>--}}
{{--                <span>By <a href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a></span> in--}}
{{--                <a href="<?php echo 'categories/' . $post->category->slug; ?>"><?php echo $post->category->name; ?></a>--}}
{{--                <div>--}}
{{--                    <?php echo $post->excerpt; ?>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--        @endforeach--}}
{{--    @endsection--}}
