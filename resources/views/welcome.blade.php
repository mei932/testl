@extends("layouts.default")
@section("title", "Dashboard")
@section("content")
<div class="container mt-5">
    <p class="text-center">Xin chào, {{ Auth::user()->name }}!</p>
    <h2 class="text-center mb-4">Thống kê hệ thống</h2>
    <div class="row text-center">
        <div class="col-md-6 mb-3">
            <div class="card p-4 shadow">
                <h5>Tổng số người dùng</h5>
                <h2>{{ $userCount }}</h2>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card p-4 shadow">
                <h5>Tổng lượt đăng nhập</h5>
                <h2>{{ $loginCount }}</h2>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="text-center mb-4">Biểu đồ thống kê</h3>
            <canvas id="statsChart" height="100"></canvas>
        </div>
    </div>
    <div class="text-center my-4">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Đăng xuất</button>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('statsChart').getContext('2d');
    const statsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Người dùng', 'Lượt đăng nhập'],
            datasets: [{
                label: 'Thống kê hệ thống',
                data: @json([$userCount, $loginCount]),
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    }
                }
            }
        }
    });
</script>
@endsection