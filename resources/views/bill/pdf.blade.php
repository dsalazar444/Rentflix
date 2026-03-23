<!-- Made by: Daniela Salazar -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Factura {{ $bill->getId() }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 30px;
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 3px solid #333;
            padding-bottom: 30px;
        }

        .header h1 {
            margin: 0 0 15px 0;
            color: #1a1a1a;
            font-size: 32px;
        }

        .header p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 15px 12px;
            margin-top: 30px;
            flex-grow: 1;
            background-color: transparent;
        }

        thead {
            position: sticky;
            top: 0;
            z-index: 10;
        }

        th {
            background-color: #5e2129;
            color: white;
            border: none;
            padding: 16px 12px;
            text-align: left;
            font-weight: bold;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        td {
            background-color: white;
            border: 1px solid #ddd;
            padding: 14px 12px;
            color: #333;
            font-size: 13px;
            min-width: 80px;
        }
        
        th:first-child {
            border-radius: 8px 0 0 8px;
        }
        
        th:last-child {
            border-radius: 0 8px 8px 0;
        }
        
        td:first-child {
            border-radius: 8px 0 0 8px;
        }
        
        td:last-child {
            border-radius: 0 8px 8px 0;
        }

        tbody tr {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        tbody tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        .total-section {
            text-align: right;
            margin-top: 50px;
            padding-top: 30px;
            border-top: 3px solid #333;
            font-size: 18px;
        }

        .total-section strong {
            color: #2c3e50;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Factura {{ $bill->getIdWithNumeral() }}</h1>
        <p>Fecha: {{ $bill->getCreatedAt() }}</p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Película</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bill->items as $item)
            <tr>
                <td>{{ $item->movie->getTitle() }}</td>
                <td>{{ $item->getQuantity() }}</td>
                <td>${{ number_format($item->getPrice(), 2) }}</td>
                <td>${{ number_format($item->getTotalPrice(), 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="total-section">
        <strong>Total: ${{ number_format($bill->getPrice(), 2) }}</strong>
    </div>
</body>
</html>