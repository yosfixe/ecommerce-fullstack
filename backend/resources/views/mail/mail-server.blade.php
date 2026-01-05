
@component('mail::message')
# Order Confirmation

Your order has been confirmed!

**Order ID:** {{ $order->id }}  
**Order Date:** {{ $order->created_at }}

Your invoice is attached as a PDF file.

Thanks for shopping with us

@endcomponent
