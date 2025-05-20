<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resi Pengiriman - #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .shipping-label {
            max-width: 800px;
            margin: 0 auto;
            border: 2px solid #000;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .company-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .label-title {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .info-section {
            margin-bottom: 20px;
        }
        .info-section h3 {
            margin: 0 0 10px 0;
            font-size: 16px;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .info-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .barcode {
            text-align: center;
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #000;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
        }
        @media print {
            body {
                padding: 0;
            }
            .shipping-label {
                border: none;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="shipping-label">
        <div class="header">
            <div class="company-name">FLORALISH</div>
            <div class="label-title">RESI PENGIRIMAN</div>
        </div>

        <div class="info-section">
            <h3>Informasi Pengiriman</h3>
            <div class="info-grid">
                <div>
                    <div class="info-item">
                        <div class="info-label">No. Resi:</div>
                        <div>#{{ $order->id }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tanggal:</div>
                        <div>{{ $order->created_at->format('d M Y H:i') }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Status:</div>
                        <div>{{ ucfirst($order->status) }}</div>
                    </div>
                </div>
                <div>
                    <div class="info-item">
                        <div class="info-label">Produk:</div>
                        <div>{{ $order->product->name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Harga:</div>
                        <div>Rp {{ number_format($order->product->price, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="info-section">
            <h3>Informasi Penerima</h3>
            <div class="info-grid">
                <div>
                    <div class="info-item">
                        <div class="info-label">Nama:</div>
                        <div>{{ $order->name }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Telepon:</div>
                        <div>{{ $order->phone }}</div>
                    </div>
                </div>
                <div>
                    <div class="info-item">
                        <div class="info-label">Alamat:</div>
                        <div>{{ $order->address }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="barcode">
            <div style="font-family: 'Courier New', monospace; font-size: 24px;">*FLORALISH-ORDER-#{{ $order->id }}-{{ $order->created_at->format('Ymd') }}*</div>
        </div>

        <div class="footer">
            <p>Terima kasih telah berbelanja di Floralish</p>
            <p>Resi ini adalah bukti pengiriman yang sah</p>
        </div>
    </div>

    <div class="no-print" style="text-align: center; margin-top: 20px;">
        <button onclick="window.print()" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Cetak Resi
        </button>
    </div>
</body>
</html> 