<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\Quote;

use Generated\Shared\Transfer\QuoteTransfer;

interface QuoteClientInterface
{
    /**
     * Specification:
     * - Returns the stored quote.
     *
     * @api
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getQuote();

    /**
     * Specification:
     * - session strategy: set quote in session
     * - persistence strategy: set quote in session, throw exception when something is changed in quote which is stored in database
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function setQuote(QuoteTransfer $quoteTransfer);

    /**
     * Specification:
     * - Session strategy: clear it from session
     * - Persistent strategy: removes current quote from DB and session
     *
     * @api
     *
     * @return void
     */
    public function clearQuote();

    /**
     * Specification:
     * - Get quote storage strategy type
     *
     * @api
     *
     * @return string
     */
    public function getStorageStrategy();
}
