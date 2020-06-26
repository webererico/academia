@extends('adminlte::page')

@section('title', 'Academia')

@section('content_header')
<h1>Academia do Maroto</h1>
@stop

@section('content')
@if ($admin == false)
<h2> Bem-Vindo {{$pessoa->nome}} [Cliente]</h2>

@else
@if ($admin == true)
<h2> Bem-Vindo {{$pessoa->nome}} [Funcionário]</h2>
<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$count_treino}}</h3>

          <p>Treinos</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">Criar treinos <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$count_equipamento}}</h3>

          <p>Equipamentos</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer" style="color: white">Gerenciar Equipamentos<i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3 style="color: white">{{$count_cliente}}</h3>

          <p style="color: white">Clientes</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <p href="#"  class="small-box-footer" style="color: white">Gerenciar clientes<i class="fas fa-arrow-circle-right" style="color: white"></i></p>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$count_profissional}}</h3>

          <p>Funcionários</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer" style="color: white">Gerenciar funcionários <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  @endif
  @endif
  @stop

  @section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
  @stop

  @section('js')
  <script>
    console.log('Hi!'); 
  </script>
  @stop