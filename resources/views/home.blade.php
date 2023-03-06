@extends('layouts.layout')
@section('page-content')
    <div class="">
        @if (session()->has('success'))
            <div class="flex justify-center items-center">
                <div class="w-[65vw] flex justify-between items-center bg-green-100 p-4 m-2 border border-green-400 text-third rounded relative"
                    role="alert">
                    <li>
                        {{ session('success') }}
                    </li>

                    <a class="flex justify-end bg-secondary text-white font-bold rounded-lg p-2" href="/publier-article">
                        <button>Publier à Nouveau</button>
                    </a>
                </div>
            </div>
        @elseif (session()->has('danger'))
            <div class="flex justify-center items-center">
                <li class="w-[65vw] bg-red-100 p-4 m-2 border border-red-400 text-red-700 rounded"
                    role="alert">
                        {{ session('danger') }}
                </li>
            </div>
        @endif
    </div>
    <div class="w-full p-6">
        <div class="flex justify-center">
            <div class="text-third text-2xl flex justify-center m-8 w-[60vw] items-center">
                @if (count($articles) <= 1)
                    <div class="w-full flex justify-start font-bold items text-secondary">
                        {{ count($articles) }} Article Disponible
                    </div>
                @else
                    <div class="w-full flex justify-start font-bold items text-secondary">
                        {{ count($articles) }} Articles Disponibles
                    </div>
                @endif
            </div>
        </div>
        @forelse ($articles as $article)
            <div class="flex justify-center items-center">
                <a href="{{route('article.show',$article->id)}}">
                    <li class="list-card w-[60vw] p-3 m-1 rounded-lg border-teal-800 border flex justify-between">
                        <div class="m-2 text-xl font-bold hover:underline text-primary items hover:scale-[1.1]">
                            {{ $article->titre }}
                        </div>
                        <div class="m-2">
                            {{ $article->created_at }}
                        </div>
                    </li>
                </a>
            </div>
            @empty
            <div class="text-gray-300 text-2xl flex justify-center items-center">Aucun Article Disponible</div>
        @endforelse
    </div>
@endsection
