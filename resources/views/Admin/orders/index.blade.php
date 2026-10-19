```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Orders | CANO DE VASCO</title>
    <link rel="stylesheet" href="{{ asset('css/cano.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #0b0c09;
            color: #f5f1e8;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 5%;
            border-bottom: 1px solid #34362a;
        }

        .brand {
            color: #f5f1e8;
            text-decoration: none;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .brand span {
            color: #b1b88a;
        }

        .page {
            width: 92%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .eyebrow {
            color: #b1b88a;
            letter-spacing: 3px;
            font-size: 12px;
            text-transform: uppercase;
        }

        h1 {
            margin: 12px 0;
            font-size: clamp(28px, 4vw, 42px);
        }

        .subtitle {
            color: #aaa99f;
            margin-bottom: 28px;
        }

        .notice {
            padding: 14px 16px;
            margin-bottom: 18px;
            border-radius: 8px;
            background: #202319;
            color: #c4cca5;
        }

        .notice.error {
            color: #f0aaaa;
            background: #291919;
        }

        .panel {
            background: #141510;
            border: 1px solid #34362a;
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 22px;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
        }

        select, button, .detail-btn {
            padding: 11px 14px;
            border-radius: 7px;
            font-size: 14px;
        }

        select {
            background: #0b0c09;
            color: #f5f1e8;
            border: 1px solid #454737;
        }

        button {
            background: #b1b88a;
            color: #11120d;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th, td {
            text-align: left;
            padding: 16px 12px;
            border-bottom: 1px solid #303127;
            vertical-align: middle;
        }

        th {
            color: #b1b88a;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            font-size: 14px;
            color: #e8e4da;
        }

        .muted {
            color: #aaa99f;
        }

        .status {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 20px;
            background: #28291f;
            color: #deddb8;
            font-size: 12px;
            white-space: nowrap;
        }

        .status.paid {
            background: #203025;
            color: #b9e2be;
        }

        .status.rejected {
            background: #351f1f;
            color: #f0aaaa;
        }

        .detail-btn {
            display: inline-block;
            background: #b1b88a;
            color: #11120d;
            text-decoration: none;
            font-weight: bold;
            white-space: nowrap;
        }

        .empty {
            text-align: center;
            padding: 40px 15px;
            color: #aaa99f;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a, .pagination span {
            display: inline-block;
            margin: 3px;
            padding: 8px 12px;
            border: 1px solid #34362a;
            border-radius: 6px;
            color: #f5f1e8;
            text-decoration: none;
        }

        @media (max-width: 600px) {
            .page {
                margin-top: 25px;
            }

            .panel {
                padding: 12px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="{{ url('/product') }}" class="brand">
        CANO DE <span>VASCO</span>
    </a>

    <a href="{{ route('admin.orders.index') }}"
       style="color:#b1b88a;text-decoration:none">
        Manage Orders
    </a>
</nav>

<main class="page">
    <div class="eyebrow">Administration</div>
    <h1>Customer Orders</h1>
    <p class="subtitle">
        Kelola pesanan customer dan verifikasi pembayaran mereka.
    </p>

    @if (session('success'))
        <div class="notice">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="notice error">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="notice error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="panel">
        <form method="GET"
              action="{{ route('admin.orders.index') }}"
              class="filters">

            <label for="status">Payment status:</label>

            <select name="status" id="status">
                <option value="">All payments</option>
                <option value="pending"
                    {{ request('status') === 'pending' ? 'selected' : '' }}>
                    Pending
                </option>
                <option value="waiting_verification"
                    {{ request('status') === 'waiting_verification' ? 'selected' : '' }}>
                    Waiting verification
                </option>
                <option value="paid"
                    {{ request('status') === 'paid' ? 'selected' : '' }}>
                    Paid
                </option>
                <option value="rejected"
                    {{ request('status') === 'rejected' ? 'selected' : '' }}>
                    Rejected
                </option>
            </select>

            <button type="submit">Filter Orders</button>

            <a href="{{ route('admin.orders.index') }}"
               style="color:#c4cca5;text-decoration:none">
                Reset
            </a>
        </form>
    </div>

    <div class="panel">
        @if ($orders->count() > 0)
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <strong>{{ $order->order_number }}</strong>
                                </td>

                                <td>
                                    {{ $order->customer_name }}
                                    <br>
                                    <small class="muted">
                                        {{ $order->customer_email }}
                                    </small>
                                </td>

                                <td>
                                    {{ $order->created_at
                                        ? $order->created_at->format('d M Y, H:i')
                                        : '-' }}
                                </td>

                                <td>
                                    ${{ number_format((float) $order->total, 2) }}
                                </td>

                                <td>
                                    <span class="status {{ $order->payment_status }}">
                                        {{ ucwords(str_replace(
                                            '_', ' ', $order->payment_status
                                        )) }}
                                    </span>
                                </td>

                                <td>
                                    {{ ucwords(str_replace(
                                        '_', ' ', $order->order_status
                                    )) }}
                                </td>

                                <td>
                                    <a class="detail-btn"
                                       href="{{ route('admin.orders.show', $order) }}">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagination">
                {{ $orders->links() }}
            </div>
        @else
            <div class="empty">
                <h3>Belum Ada Pesanan</h3>
                <p>Pesanan customer akan muncul di halaman ini.</p>
            </div>
        @endif
    </div>
</main>

</body>
</html>
```