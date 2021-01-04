<?php
namespace Menacoders\Instructions\Model;

use Menacoders\Instructions\Api\Data\PaymentMethodsInterface;

/**
 * @codeCoverageIgnoreStart
 */
class PaymentDetails extends \Magento\Framework\Model\AbstractExtensibleModel implements
    \Menacoders\Instructions\Api\Data\PaymentDetailsInterface
{

    /**
     * Get payment methods
     *
     * @return \Menacoders\Instructions\Api\Data\DataInterface[]|null
     */
    public function getPaymentMethods()
    {
        return $this->getData(self::PAYMENT_METHODS);
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

    /**
     * {@inheritdoc}
     */
    public function getTotals()
    {
        return $this->getData(self::TOTALS);
    }

    /**
     * {@inheritdoc}
     */
    public function setTotals($totals)
    {
        return $this->setData(self::TOTALS, $totals);
    }

    /**
     * {@inheritdoc}
     *
     * @return \Magento\Checkout\Api\Data\PaymentDetailsExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * {@inheritdoc}
     *
     * @param \Magento\Checkout\Api\Data\PaymentDetailsExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Magento\Checkout\Api\Data\PaymentDetailsExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
