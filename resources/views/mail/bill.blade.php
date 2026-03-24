<!-- Laura Andrea Castrillón Fajardo -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $bill->getId() }} - RentFlix</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #1a1a1a; color: #ddd; }
        .wrapper { max-width: 620px; margin: 40px auto; background: #2a2a2a; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); }
        .header { background: #111; padding: 32px 40px; display: flex; justify-content: space-between; align-items: center; }
        .header-logo { font-size: 1.6rem; font-weight: 800; color: #fff; letter-spacing: -0.5px; }
        .header-logo span { color: #e63946; }
        .header-invoice { text-align: right; }
        .header-invoice .label { font-size: 0.75rem; color: #888; text-transform: uppercase; letter-spacing: 0.1em; }
        .header-invoice .number { font-size: 1.1rem; font-weight: 700; color: #fff; }
        .body { padding: 40px; }
        .greeting { font-size: 1rem; color: #ddd; margin-bottom: 8px; }
        .greeting strong { color: #fff; }
        .subtitle { font-size: 0.9rem; color: #aaa; margin-bottom: 32px; }
        .info-row { display: flex; gap: 16px; margin-bottom: 32px; }
        .info-box { flex: 1; background: #333; border: 1px solid #444; border-radius: 8px; padding: 16px; }
        .info-box .info-label { font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; color: #888; margin-bottom: 6px; }
        .info-box .info-value { font-size: 0.9rem; font-weight: 600; color: #fff; }
        .info-box .info-sub { font-size: 0.82rem; color: #aaa; margin-top: 2px; }
        .section-title { font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.1em; color: #888; margin-bottom: 12px; }
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
        .items-table thead tr { border-bottom: 2px solid #444; }
        .items-table th { padding: 10px 12px; text-align: left; font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.06em; color: #888; font-weight: 600; }
        .items-table th:last-child { text-align: right; }
        .items-table td { padding: 14px 12px; font-size: 0.9rem; color: #ddd; border-bottom: 1px solid #444; vertical-align: middle; }
        .items-table td:last-child { text-align: right; font-weight: 600; color: #fff; }
        .movie-title { font-weight: 600; color: #fff; display: block; }
        .movie-format { font-size: 0.78rem; color: #888; margin-top: 2px; }
        .qty-badge { display: inline-block; background: #444; color: #aaa; padding: 2px 8px; border-radius: 20px; font-size: 0.8rem; }
        .total-section { border-top: 2px solid #444; padding-top: 16px; margin-bottom: 32px; }
        .total-row { display: flex; justify-content: space-between; padding: 6px 12px; font-size: 0.9rem; color: #aaa; }
        .total-row.final { background: #111; border-radius: 8px; margin-top: 8px; padding: 14px 16px; }
        .total-row.final span:first-child { font-weight: 700; color: #fff; font-size: 1rem; }
        .total-row.final span:last-child { font-weight: 800; color: #e63946; font-size: 1.1rem; }
        .address-section { background: #333; border: 1px solid #444; border-radius: 8px; padding: 16px 20px; margin-bottom: 32px; }
        .address-section .info-label { font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.08em; color: #888; margin-bottom: 6px; }
        .address-section p { font-size: 0.9rem; color: #ddd; line-height: 1.5; }
        .footer { background: #333; border-top: 1px solid #444; padding: 24px 40px; text-align: center; }
        .footer p { font-size: 0.82rem; color: #888; line-height: 1.6; }
        .footer strong { color: #ddd; }
    </style>
</head>
<body>
    <div class="wrapper">

        <!-- Header Mail -->
        <div class="header">
            <div class="header-logo">Rent<span>Flix</span></div>
            <div class="header-invoice">
                <div class="label">Invoice</div>
                <div class="number">#{{ $bill->getIdFormatted() }}</div>
            </div>
        </div>

        <!-- Body -Mail -->
        <div class="body">

            <p class="greeting">Hola, <strong>{{ $bill->user->getName() }}</strong> </p>
            <p class="subtitle">Gracias por tu compra, aquí estan los detalles de tu orden.</p>

            <div class="info-row">
                <div class="info-box">
                    <div class="info-label">Fecha</div>
                    <div class="info-value">{{ $bill->getCreatedAtFormatted() }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Customer</div>
                    <div class="info-value">{{ $bill->user->getName() }}</div>
                    <div class="info-sub">{{ $bill->user->getEmail() }}</div>
                </div>
                <div class="info-box">
                    <div class="info-label">Estado</div>
                    <div class="info-value" style="color: #22c55e;">✓ Pagado</div>
                </div>
            </div>

            <div class="section-title">Resumen de la factura</div>
            <table class="items-table">
                <thead>
                    <tr>
                        <th>Pelicula</th>
                        <th>Cantidad</th>
                        <th>Precio por unidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bill->items as $item)
                    <tr>
                        <td>
                            <span class="movie-title">{{ $item->movie->getTitle() }}</span>
                            <span class="movie-format">{{ $item->movie->getFormatCapitalized() }}</span>
                        </td>
                        <td>
                            <span class="qty-badge">x{{ $item->getQuantity() }}</span>
                        </td>
                        <td>${{ $item->getPrice() }}</td>
                        <td>${{ $item->getTotalPrice() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!--  Total Price Bill  -->
            <div class="total-section">
                <div class="total-row final">
                    <span>Total: </span>
                    <span> ${{ $bill->getPrice() }}</span>
                </div>
            </div>

            <!-- Shipping address -->
            @if($bill->getAddress())
            <div class="address-section">
                <div class="info-label">Direccion de compra</div>
                <p>{{ $bill->getAddress() }}</p>
            </div>
            @endif

        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Esta factura es generada automaticamente por <strong>RentFlix</strong>.<br>
            Si tienes alguna pregunta comunicarse con el equipo.</p>
        </div>

    </div>
</body>
</html>