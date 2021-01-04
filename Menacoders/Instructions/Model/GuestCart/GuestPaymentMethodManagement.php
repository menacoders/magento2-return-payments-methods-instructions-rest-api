<?php

namespace Menacoders\Instructions\Model\GuestCart;

use Menacoders\Instructions\Api\GuestPaymentMethodManagementInterface;
use Magento\Quote\Model\QuoteIdMaskFactory;
use Menacoders\Instructions\Model\Data\PaymentMethodsFactory;
use Menacoders\Instructions\Model\Data\DataFactory;
use Menacoders\Instructions\Helper\Data as Helper;
use Magento\Store\Model\StoreManager;

/**
 * Payment method management class for guest carts.
 */
class GuestPaymentMethodManagement implements GuestPaymentMethodManagementInterface
{
    /**
     * @var QuoteIdMaskFactory
     */
    protected $quoteIdMaskFactory;

    /**
     * @var PaymentMethodsFactory
     */
    protected $paymentMethodsFactory;

    /**
     * @var DataFactory
     */
    protected $dataFactory;

    /**
     * @var Helper
     */
    private $helper;

    /**
     * @var StoreManager
     */
    private $storeManager;

    /**
     * GuestPaymentMethodManagement constructor.
     * @param QuoteIdMaskFactory $quoteIdMaskFactory
     * @param PaymentMethodsFactory $paymentMethodsFactory
     * @param DataFactory $dataFactory
     * @param Helper $helper
     * @param StoreManager $storeManager
     */
    public function __construct(
        QuoteIdMaskFactory $quoteIdMaskFactory,
        PaymentMethodsFactory $paymentMethodsFactory,
        DataFactory $dataFactory,
        Helper $helper,
        StoreManager $storeManager
    ) {
        $this->quoteIdMaskFactory = $quoteIdMaskFactory;
        $this->paymentMethodsFactory = $paymentMethodsFactory;
        $this->dataFactory = $dataFactory;
        $this->helper = $helper;
        $this->storeManager = $storeManager;
    }

    public function getPaymentMethodsList($cartId)
    {
        $quoteIdMask = $this->quoteIdMaskFactory->create()->load($cartId, 'masked_id');
        $storeId = $this->storeManager->getStore()->getId();
        $methods = [];
        foreach ($this->helper->getPaymentMethodsList($quoteIdMask->getQuoteId()) as $methodInstance) {
            $instruction = null;
            if ($text = $methodInstance->getConfigData('instructions', $storeId)) {
                $instruction = $text;
            }
            $title = $methodInstance->getConfigData('title', $storeId);
            $data = $this->dataFactory->create();
            $data->setTitle($title)
                 ->setInstruction($instruction)
                 ->setCode($methodInstance->getCode());
            $methods[] = $data;
        }
        return $this->paymentMethodsFactory->create()->setPaymentMethods($methods);
    }
}
