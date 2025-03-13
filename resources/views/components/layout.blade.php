<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/css/app.css')
    <title>bigi</title>
</head>
<body class="bg-black text-white">
    <nav class="w-full bg-gradient-to-b from-black to-transparent fixed top-0 h-16 justify-center items-center flex space-x-3 text-white z-50">
        <a href="#" class="division">Division</a>
        <a href="#" class="gallery">Gallery</a>
        <a href="#" class="text-2xl text-bold px-5">bigi</a>
        <a href="#" class="bookshelf">Bookshelf</a>
        <a href="#" class="about">About</a>
    </nav>
    {{ $slot }}
    <footer class="grid grid-cols-5 w-full px-12 py-10 text-slate-300">
    <div class="col-span-1 flex items-center justify-center mr-12">
        <strong class="text-4xl text-white text-bold">bigi</strong>
    </div>
    <div class="flex flex-col col-span-2">
        <p class="pb-2 text-lg text-bold text-white">Reach Us</p>
        <a href="#">X</a>
        <a href="#">Instagram</a>
        <a href="#">Facebook</a>
    </div>
    <div class="flex flex-col col-span-2">
        <p class="pb-2 text-lg text-bold text-white">Contact Us</p>
        <a href="#">bigi.hirang@botak.com</a>
        <a href="#">+62812-3456-7899</a>
        <a href="#">Jl. yang benar, komplek cicak anggun, no. 69</a>
    </div>
</footer>
</body>
</html>