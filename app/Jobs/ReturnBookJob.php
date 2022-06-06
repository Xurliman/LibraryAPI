<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ReturnBookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $order;
    private $book;
    private $targetBook;

    public function __construct($order, $book, $targetBook)
    {
        $this->order = $order;
        $this->book = $book;
        $this->targetBook = $targetBook;
    }

    public function handle()
    {
        $count = $this->order->count - $this->book['count'];
        $amount = $this->targetBook->amount + $this->book['count'];
        $this->order->update(['count' => $count]);
        $this->targetBook->update(['amount' => $amount]);
    }
}
