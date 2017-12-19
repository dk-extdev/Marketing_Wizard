<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Exception;

class SendToRender implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $queueUrl, $messageBody;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($queueUrl, $messageBody)
    {
        $this->queueUrl = $queueUrl;
        $this->messageBody = $messageBody;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //$this->queueUrl
        //Queue::push('TestJob', $data', Config::get('queue.aliases.high'));
        
    }
    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        // Send user notification of failure, etc...
    }

}
