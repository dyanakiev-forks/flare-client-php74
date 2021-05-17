<?php

namespace Spatie\FlareClient\Middleware;

use Spatie\FlareClient\Report;

class AnonymizeIp
{
    public function handle(Report $report, $next)
    {
        $context = $report->allContext();

        $context['request']['ip'] = null;

        $report->userProvidedContext($context);

        return $next($report);
    }
}
