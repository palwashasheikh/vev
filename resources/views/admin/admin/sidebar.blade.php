<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>

        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                @auth
                     @if(Auth::user()->role_id===1)
                        <a href="{{ url('/adminDash') }}">Dashboard</a>
                     @elseif(Auth::user()->role_id===2)
                        <a href="{{ url('/vendDash') }}" class="text-sm text-gray-700 underline">Dashboard</a>               
                     @endif        
                @else
                     <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">Home</a>        
                @endauth        
                </li>
            </ul>
        </div>
    </div>
</div>
