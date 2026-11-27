<div class="page-head">
    <div>
        <div class="page-breadcrumb">
            <a href="/admin/dashboard"><i class="fas fa-home"></i></a>
            <span class="sep">/</span>
            <span>{{ $title ?? 'Dashboard' }}</span>
        </div>
        <h1 class="page-title">{{ $title ?? 'Dashboard' }}</h1>
    </div>
    <div class="page-chip">
        <i class="far fa-calendar-alt"></i>
        {{ now()->locale('id')->translatedFormat('l, d F Y') }}
    </div>
</div>

@if($content)
@include($content)
@endif