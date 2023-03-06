@extends('layouts.layout')
@section('page-content')
    <div class="">
        @if ($errors)
            @foreach ($errors->all() as $error)
                <div class="flex justify-center items-center">
                    <li class="w-[45vw] bg-red-100 p-4 m-2 border border-red-400 text-red-700 rounded relative"
                        role="alert">{{ $error }}</li>
                </div>
            @endforeach
        @endif
    </div>
    <div class="w-full flex justify-center items center p-4">
        <form action="/login" class="border border-red-500 h-[60vh] w-[45vw] rounded-xl pt-10" method="post">
            @csrf
            @method('post')
            <div class="flex justify-center text-3xl text-primary font-bold">Connexion</div>
            <div class="w-full flex justify-center items-center mt-1">
                <label for="email" class="text-primary text-xl">Email</label>
            </div>
            <div class="w-full flex justify-center items-center">
                <input type="email" name="email" value="{{old('email')}}" class="border-green-800 border w-[65%] outline-none h-12 rounded-xl">
            </div>
            <div class="w-full flex justify-center items-center mt-1">
                <label for="password" class="text-primary text-xl">Mot de Passe</label>
            </div>
            <div class="w-full flex justify-center items-center">
                <input type="password" name="password" value="{{old('password')}}" class="border-green-800 border w-[65%] outline-none h-12 rounded-xl">
            </div>

            <div class="w-full flex justify-center items-center mt-8">
                <input type="submit" name="button" value="Se connecter"
                    class="bg-green-800 text-white text-xl cursor-pointer border-green-800 border w-[55%] outline-none h-12 rounded-xl">
            </div>
        </form>
    </div>
@endsection
