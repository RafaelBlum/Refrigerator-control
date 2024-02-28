@if ($orders->count() > 0)
    <ul>
        @foreach ($orders->take(10) as $order)
            <li>R$ {{ number_format($order->total, 2, ',', '.') }} em {{ $order->created_at->format('d/m/Y H:i') }}
                <span class="inline-flex items-center rounded-md bg-green-300 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                    {{$order->status}}
                </span>
            </li>
        @endforeach
    </ul>
@else
    <p>Nenhuma compra realizada até o momento...</p>
@endif
