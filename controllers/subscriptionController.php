<?php

abstract class SController
{
    abstract public function subscribe();
}

class SubscriptionController extends SController
{

    public function subscribe()
    {
        $data = Flight::request()->data;
        $subscription = new subscription($data);
        $subscription->store();
        Flight::redirect("/");
    }
}
