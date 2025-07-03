@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center" style="min-height:70vh;">
    <h1 class="mb-4 fw-bold" style="color:#e50914;letter-spacing:1px;">Selamat Datang di Filmku!</h1>
    <p class="mb-5 text-center" style="max-width:500px;">Kelola daftar film yang sudah kamu tonton dan yang ingin kamu tonton. Temukan, tambahkan, dan nikmati pengalaman menonton seperti Netflix versi kamu sendiri!</p>
    <div class="d-flex flex-column flex-md-row gap-4">
        <a href="{{ route('films.sudah_ditonton') }}" class="btn btn-netflix btn-lg px-5 py-3 d-flex align-items-center gap-2 shadow">
            <i class="bi bi-check-circle-fill" style="font-size:2rem;"></i>
            <span class="fs-4">Film Sudah Ditonton</span>
        </a>
        <a href="{{ route('films.ingin_ditonton') }}" class="btn btn-outline-light btn-lg px-5 py-3 d-flex align-items-center gap-2 shadow" style="border:2px solid #e50914;">
            <i class="bi bi-clock-history" style="font-size:2rem;color:#e50914;"></i>
            <span class="fs-4">Film Ingin Ditonton</span>
        </a>
    </div>
</div>
@endsection 