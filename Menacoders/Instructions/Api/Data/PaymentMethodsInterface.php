<?php

namespace MENAcoders\Instructions\Api\Data;

/**
 * Interface PaymentMethodsInterface
 * @api
 * @since 100.0.2
 */
interface PaymentMethodsInterface
{
    const PAYMENT_METHODS = 'payment_methods';

    /**
     * Get payment methods
     *
     * @return \MENAcoders\Instructions\Api\Data\DataInterface[]|null
     */
    public function getPaymentMethods();

    /**
     * Set payment methods
     *
     * @api
     * @param \MENAcoders\Instructions\Api\Data\DataInterface[] $methods/null
     * @return $this
     */
    public function setPaymentMethods(array $methods = null);
}