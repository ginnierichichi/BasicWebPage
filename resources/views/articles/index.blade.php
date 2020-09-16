@extends('layouts')

@section('content')

    <div id="wrapper">
        <div id="page" class="container">

            @forelse($articles as $article)
                <div id="content">
                    <div class="title">
                        <h2>
                            <a href="{{ $article->path() }}">
                                {{ $article->title }}
                            </a>
                        </h2>
                    </div>
                    <p><img src="images/banner.jpg"
                            alt=""
                            class="image image-full" />
                    </p>
                    {{ $article->excerpt }}
                </div>
            @empty
            <p>No relevant articles yet</p>
            @endforelse
        </div>
    </div>
    <div id="copyright" class="container">
        <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
    </div>

@endsection
