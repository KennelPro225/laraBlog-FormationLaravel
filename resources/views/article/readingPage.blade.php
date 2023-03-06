@extends('layouts.layout')
@section('page-content')
    @if (session()->has('danger'))
        <div class="flex justify-center items-center">
            <div class="w-[65vw] mt-2 flex justify-between items-center border border-red-400 rounded-lg text-red-700 relative"
                role="alert">
                <li class="w-[65vw] bg-transparent p-4 m-2">
                    {{ session('danger') }}
                </li>
                <form class="bg-transparent" action="{{ route('article.delete', $article->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button
                        class="bg-[#af1919] font-bold items text-white h-11 w-[170px] rounded-lg p-3 m-2">Confirmer</button>
                </form>
            </div>
        </div>
    @endif
    <div class="w-full mt-4 flex justify-center">
        <div class="w-[65vw]">
            <div class="flex justify-start p-4 text-center border rounded-lg">
                <a href="/home">
                    <button class="bg-[#09134d] font-bold items text-white h-11 w-[170px] rounded-lg p-3">Retour</button>
                </a>
            </div>
        </div>
    </div>
    <div class="w-full flex justify-center p-4">
        <div class="text-center border rounded-lg">
            <div class="text-2xl font-bold">{{ $article->titre }}</div>
            <div class="w-[65vw] p-6">{{ $article->contenu }}</div>
        </div>
    </div>
    <div class="w-full flex justify-center mt-2">
        <div class="w-[65vw] flex items-center">
            <div class="p-4 text-center border rounded-lg w-full">
                @auth
                    @if (Auth::user()->id === $article->user_id)
                        <div class="w-full flex justify-start">
                            <a href="{{ route('article.edit', $article->id) }}">
                                <button
                                    class="bg-[#1c9c2d] font-bold items text-white h-11 w-[170px] rounded-lg p-3 m-2">Edit</button>
                            </a>
                            <form action="{{ route('article.confirmation', $article->id) }}" method="post">
                                @csrf
                                <button
                                    class="bg-[#af1919] font-bold items text-white h-11 w-[170px] rounded-lg p-3 m-2">Delete</button>
                            </form>
                        @else
                            <div> </div>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    </div>
@endsection
