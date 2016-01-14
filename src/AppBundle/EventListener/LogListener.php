<?php
    namespace AppBundle\EventListener;

    use AppBundle\EventListener\GetResponseEvent;
    use Symfony\Bridge\Monolog\Logger;

    class LogListener
    {
        private $logger;

        public function __construct(Logger $logger)
        {
            $this->logger = $logger;
        }


        public function onKernelRequest ($event)
        {
            $request = $event->getRequest();
            $baseurl = $request->getScheme() . '://' . $request->getHttpHost() . $request->getRequestUri();
            $this->logger->info($baseurl);
        }
    }
