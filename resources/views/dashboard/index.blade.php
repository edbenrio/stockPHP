@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{$sales}}</h3>

            <p>Cantidad de ventas</p>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="/sales" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3>{{number_format($total_income, 2, ',', '.')}}</h3>

            <p>$ vendidos</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/sales" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3> {{count($stock_bajo)}} </h3>

            <p>Productos con bajo stock</p>
            </div>
            <div class="icon">
            <i class="nav-icon far ion-cube"></i>
            </div>
            <a href="/low_stock" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3> {{$products}} </h3>

            <p>Artículos</p>
            </div>
            <div class="icon">
            <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/products" class="small-box-footer">Ver más <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <!-- ./col -->
    </div>

@endsection

