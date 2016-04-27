<?php


namespace Manager\Jobs;


use Illuminate\Contracts\Mail\Mailer;
use Manager\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class SendEmailJob extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;


    protected $count;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($count)
    {
        $this->count=$count;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $count=$this->count;
        $data=array('theCount' => $count);

        $mailer->send('emails.welcome', $data, function ($message)

        {
            $message->from('muyiwaawoniyi@yahoo.com', env('MAIL_NAME'));
            $message->to('muyiwaawoniyi@yahoo.com')->subject('Welcome!');
        });
    }
}
