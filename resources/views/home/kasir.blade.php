@extends('layouts.app')

@section('title')
  Kopinesia Dashboard
@endsection

@section('breadcrumb')
  @parent
  <li> Dashboard </li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-body"
      <h1> Selamat Datang </h1>
      <h2> Anda login sebagai Admin </h2>
      </div>
    </div>
  </div>
</div>
@endsection
