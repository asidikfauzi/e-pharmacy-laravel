<div>
	<p><strong>Nota:</strong> {{ $payment->nota }}</p>
	<p><strong>Bukti Transaksi:</strong> <img src="{{ asset($payment->image) }}" alt="Bukti Transaksi" /></p>
	<p><strong>Alamat:</strong> {{ $payment->alamat }}</p>
	<p><strong>Total:</strong> Rp. {{ $payment->total }}</p>
	<!-- Add other payment details as needed -->

	<p><strong>List Produk:</strong></p>
	@foreach($payment->product as $product)
		<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
			<p><strong>Nama:</strong> {{ $product->nama }}</p>
			<p><strong>Harga:</strong> Rp. {{ number_format($product->price, 0, ',') }}</p>
			<p><img src="{{ asset($product->image) }}" alt="{{ $product->nama }}" style="max-width: 100px;"></p>
		</div>
	@endforeach
</div>