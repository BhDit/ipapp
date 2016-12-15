
@extends ('layout')
 @section('part2')
            About us
           <p>  bla lba bla bla bla  bla lba bla bla blabla lba bla bla blabla lba bla bla blabla lba bla bla blabla lba bla bla blabla lba bla bla bla
           </p>
            regulament

            <p>  bla lba bla bla bla  bla lba bla bla blabla lba bla bla blabla lba bla bla blabla lba bla bla blabla lba bla bla blabla lba bla bla bla
            </p>
  @stop

@extends('layouts.app')
@section('css')
    .content{
        width:100vw;
        height:90vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }
@endsection
@section('content')
    <div class="content">
                <span class="logo">
                    <h1>IPAPP</h1>
                </span>
    </div>
@endsection

