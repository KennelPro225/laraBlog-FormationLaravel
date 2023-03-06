@extends('layouts.layout')
@section('page-content')
    <div class="">
        @if ($errors)
            @foreach ($errors->all() as $error)
                <div class="flex justify-center items-center">
                    <li class="w-[76vw] bg-red-100 p-4 m-2 border border-red-400 text-red-700 rounded relative"
                        role="alert">{{ $error }}</li>
                </div>
            @endforeach
        @endif
        @if (session()->has('success'))
            <div class="flex justify-center items-center">
                <li class="w-[76vw] bg-green-100 p-4 m-2 border border-green-400 text-green-700 rounded relative"
                    role="alert">{{ session('success') }}</li>
            </div>
        @endif
        <div class="w-full flex justify-center items-center">
            <form action="/publier-article" method="POST" class="w-[80vw] h-[70vh] p-5">
                <div class="w-full border-2 border-slate-300 p-5 rounded-lg">
                    @csrf
                    <div class="flex justify-center items-center">
                        <h1 class="text-2xl text-teal-700 font-bold">Publier un Nouvel Article</h1>
                    </div>
                    <div class="flex justify-center items-center">
                        <label for="contenu">Titre</label>
                    </div>
                    <div class="flex justify-center items-center">
                        <input type="text" class="outline-none border-teal-800 border w-96 h-10 rounded-lg"
                            placeholder="Titre" name="titre" value="{{ old('titre') }}">
                    </div>
                    <div class="flex justify-center">
                        <label for="contenu">Contenu</label>
                    </div>
                    <div class="flex justify-center items-center">
                        <textarea class="outline-none border-teal-800 border w-96 h-20 rounded-lg" name="contenu" cols="30" rows="10">{{ old('contenu') }}</textarea>
                    </div>
                    <br>
                    <div class="flex justify-center items-center">
                        <button type="submit" class="bg-primary text-white font-bold w-48 h-12 rounded-xl">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
