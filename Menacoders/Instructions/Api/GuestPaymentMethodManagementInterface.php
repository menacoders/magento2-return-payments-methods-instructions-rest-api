<?php

namespace Menacoders\Instructions\Api;

/**
 * Payment method management interface for guest carts.
 * @api
 */
interface GuestPaymentMethodManagementInterface
{
    /**
     * List available payment methods for a specified shopping cart.
     *
     * @param string $cartId The cart ID.
     * @return \Menacoders\Instructions\Api\Data\PaymentMethodsInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException The specified cart does not exist.
     */
    public function getPaymentMethodsList($cartId);
}
