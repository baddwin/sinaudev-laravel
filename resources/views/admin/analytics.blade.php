@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Analytics</div>

                <div class="panel-body">
                    @if (is_object($analytics))
                        <h4>Jumlah pengunjung</h4>
                        <p>Total visitor: {{ $analytics->sum('ga:pageviews') }}</p>
                        <canvas id="stat" width="200" height="200"></canvas>
                    @else
                        <h4>Error!</h4>
                        <p>{{ $analytics }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    @if (is_object($analytics) && $analytics->count() > 0)
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js" charset="utf-8"></script>
    <script type="text/javascript">
        var ctx = document.getElementById("stat");
        var statistik = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! $analytics->pluck('ga:date')->toJson() !!},
                datasets: [
                    {
                    label: "Statistik Visitor Web",
                    data: {!! $analytics->pluck('ga:pageviews')->toJson() !!}
                    }
                 ]
            }
        });
        // console.log({!! $analytics->pluck('ga:date')->toJson() !!});
    </script>
    @endif
@endsection
