@extends('master')

@section('title')
  <title>Wine</title>
@endsection
@section('video')
  <video class="background-video" src="video/videowine.mp4" alt="wine" poster="img/fondoregistro2.jpg" autoplay loop muted></video>
@endsection
@section('section')
<header class="container-header">
  <h1 class="marca">WINE</h1>
  <p id="texto-wine">Cada momento tiene un buen vino y en Wine te facilitamos su elección. Dar con el vino indicado es tan importante como la buena compañía en un momento especial. Sorprende a los tuyos y regala a tu paladar el sabor indicado para cada instante.</p>
</header>
<main class="container-section">
  @foreach ($articulosHome as $articulo)
    <section class="option" id="{{$articulo["id"]}}">
      <div class="container-img">
        <img class="photo" src="{{$articulo["img"]}}" alt="{{$articulo["alt"]}}">
      </div>
      <h2 class="titulos-section">{{$articulo["titulo"]}}</h2>
      <p>{{$articulo["descripcion"]}}</p>
    </section>
  @endforeach
</main>
<h3 id="como-trabajamos">Como trabajamos</h3>
<div class="container-footer">
  <div class="container-video">
    <iframe width="560" height="315"src="https://www.youtube.com/embed/5o5RnrcdEcg?autoplay=1&controls=1&loop=1&rel=0&showinfo=0&modestbranding=0&mute=1&enablejsapi=1"></iframe>
  </div>
</div>

@endsection
