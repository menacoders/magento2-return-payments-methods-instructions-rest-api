<?php

namespace Menacoders\Instructions\Model\Data;

use Menacoders\Instructions\Api\Data\PaymentMethodsInterface;
use Magento\Framework\Api\AbstractExtensibleObject;

/**
 * Class PaymentMethod
 * @package Menacoders\Instructions\Model\Data
 */
class PaymentMethods extends AbstractExtensibleObject implements PaymentMethodsInterface
{
    /**
     * Get payment methods
     *
     * @return \Menacoders\Instructions\Api\Data\DataInterface[]|null
     */
    public function getPaymentMethods()
    {
        return $this->_get(self::PAYMENT_METHODS);
    }

    /**
     * Set payment methods
     *
     * @param \Menacoders\Instructions\Api\Data\DataInterface[] $methods /null
     * @return $this
     * @api
     */
    public function setPaymentMethods(array $methods = null)
    {
        return $this->setData(self::PAYMENT_METHODS, $methods);
    }
}