<?php

namespace Menacoders\Instructions\Api;

/**
 * Interface for managing quote payment information
 * @api
 * @since 100.0.2
 */
interface PaymentInformationManagementInterface
{
    /**
     * Get payment information
     *
     * @param int $cartId
     * @return \Menacoders\Instructions\Api\Data\PaymentDetailsInterface
     */
    public function getPaymentInformation($cartId);
}
