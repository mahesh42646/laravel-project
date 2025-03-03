@if ($message)
    <div class="alert alert-dismissible text-primary fade show" role="alert" style="background-color: #e5eef9; color: #000 !important; border-color: rgba(0,0,0,0.1) !important">
        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 48 48" width="24" fill="currentColor">
            <path d="M24.05 45.25Q19.5 45.25 15.6 43.625Q11.7 42 8.85 39.15Q6 36.3 4.375 32.4Q2.75 28.5 2.75 23.95Q2.75 19.5 4.375 15.625Q6 11.75 8.85 8.875Q11.7 6 15.6 4.35Q19.5 2.7 24.05 2.7Q28.5 2.7 32.375 4.35Q36.25 6 39.125 8.875Q42 11.75 43.65 15.625Q45.3 19.5 45.3 24Q45.3 28.5 43.65 32.4Q42 36.3 39.125 39.15Q36.25 42 32.375 43.625Q28.5 45.25 24.05 45.25ZM24 19.05Q25.05 19.05 25.725 18.375Q26.4 17.7 26.4 16.7Q26.4 15.6 25.7 14.925Q25 14.25 24 14.25Q22.95 14.25 22.275 14.925Q21.6 15.6 21.6 16.65Q21.6 17.7 22.3 18.375Q23 19.05 24 19.05ZM22.1 34.55H26.2V22H22.1Z"/>
        </svg>
        {!! $message !!}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
