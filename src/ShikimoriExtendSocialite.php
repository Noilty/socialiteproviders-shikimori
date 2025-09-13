<?php

declare(strict_types=1);

namespace Noilty\SocialiteProviders\Shikimori;

use SocialiteProviders\Manager\SocialiteWasCalled;

class ShikimoriExtendSocialite
{
    /**
     * Register the provider.
     *
     * @param SocialiteWasCalled $socialiteWasCalled
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled): void
    {
        $socialiteWasCalled->extendSocialite('shikimori', Provider::class);
    }
}
