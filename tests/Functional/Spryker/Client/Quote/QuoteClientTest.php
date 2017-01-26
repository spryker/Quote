<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Functional\Spryker\Client\Quote;

use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use PHPUnit_Framework_TestCase;
use Spryker\Client\Quote\QuoteClient;
use Spryker\Client\Session\SessionClient;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @group Functional
 * @group Spryker
 * @group Client
 * @group Quote
 * @group QuoteClientTest
 */
class QuoteClientTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $sessionContainer = new Session();
        $sessionClient = new SessionClient();
        $sessionClient->setContainer($sessionContainer);
    }

    /**
     * @return void
     */
    public function testGetQuoteShouldReturnQuoteTransfer()
    {
        $quoteClient = new QuoteClient();

        $this->assertInstanceOf(QuoteTransfer::class, $quoteClient->getQuote());
    }

    /**
     * @return void
     */
    public function testSetQuoteShouldStoreQuoteTransfer()
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteClient = new QuoteClient();

        $quoteClient->setQuote($quoteTransfer);
        $this->assertSame($quoteTransfer, $quoteClient->getQuote());
    }

    /**
     * @return void
     */
    public function testClearQuoteShouldSetEmptyQuoteTransfer()
    {
        $quoteTransfer = new QuoteTransfer();
        $quoteTransfer->addItem(new ItemTransfer());

        $quoteClient = new QuoteClient();
        $quoteClient->setQuote($quoteTransfer);
        $quoteClient->clearQuote();

        $this->assertNotSame($quoteTransfer, $quoteClient->getQuote());
    }

}
