<?php
namespace MENAcoders\Instructions\Api\Data;

/**
 * Interface PaymentDetailsInterface
 * @api
 * @since 100.0.2
 */
interface PaymentDetailsInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const TOTALS = 'totals';

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

    /**
     * @return \Magento\Quote\Api\Data\TotalsInterface
     */
    public function getTotals();

    /**
     * @param \Magento\Quote\Api\Data\TotalsInterface $totals
     * @return $this
     */
    public function setTotals($totals);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Magento\Checkout\Api\Data\PaymentDetailsExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Magento\Checkout\Api\Data\PaymentDetailsExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Magento\Checkout\Api\Data\PaymentDetailsExtensionInterface $extensionAttributes
    );
}
