<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Scaly Pet',
        'product' => 'Exotic Animals',
        'street' => '1412 W. Washington',
        'location' => 'Boise, ID 83702',
        'phone' => '208-283-8654',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = null;

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'jeremyblc@gmail.com'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::useStripe()->noCardUpFront()->trialDays(0);

        Spark::freePlan()
            ->price(0)
            ->features([
                'View and Purchase from Sellers', 'Browse the Forums'
            ]);

        Spark::plan('Monthly', 'scaly-pet-monthly')
            ->price(3)
            ->trialDays(0)
            ->features([
                'Become a Seller!', 'Post in the Forums', 'Be a part of the community'
            ]);

        Spark::plan('Yearly', 'scaly-pet-yearly')
            ->price(30)
            ->trialDays(0)
            ->yearly()
            ->features([
                'Annual membership is 20% cheaper!', 'Sell Animals or Products', 'Post in the Forums', 'Be a part of the community'
            ]);
    }
}
