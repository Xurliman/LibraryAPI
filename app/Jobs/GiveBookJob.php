<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GiveBookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $order;
    private $targetBook;
    private $requestedCount;
    
    public function __construct($order, $targetBook, $requestedCount)
    {
        $this->order = $order;
        $this->targetBook = $targetBook;
        $this->requestedCount = $requestedCount;    
    }

    public function handle()
    {
        $count = $this->requestedCount + $this->order->count;
        $this->order->update(['count' => $count]);
        $amount = $this->targetBook->amount - $this->requestedCount;
        $this->targetBook->update(['amount' => $amount]);
        $this->order->student()->update(['has_book' => 1]);
    }
}
