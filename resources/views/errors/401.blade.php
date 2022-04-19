@extends('errors.layout')

@php
  $error_number = 401;
@endphp

@section('title')
  Acción no autorizada.
@endsection

@section('description')
  @php
    $default_error_message = "Por favor <a href='javascript:history.back()''>volver atras</a> o regresar a <a href='".url('/admin')."'>nuestra pagina de inicio</a>.";
  @endphp
  {!! isset($exception)? ($exception->getMessage()?e($exception->getMessage()):$default_error_message): $default_error_message !!}
@endsection
