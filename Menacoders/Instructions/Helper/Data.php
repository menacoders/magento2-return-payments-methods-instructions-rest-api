<?php

namespace Menacoders\Instructions\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Payment\Model\MethodList;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{
    /**
     * @var CartRepositoryInterface
     */
    private $quoteRepository;

    /**
     * @var MethodList
     */
    private $methodList;

    /**
     * Data constructor.
     * @param Context $context
     * @param CartRepositoryInterface $quoteRepository
     * @param MethodList $methodList
     */
    public function __construct(
        Context $context,
        CartRepositoryInterface $quoteRepository,
        MethodList $methodList
    ) {
        parent::__construct($context);
        $this->quoteRepository = $quoteRepository;
        $this->methodList = $methodList;
    }

    /**
     * @param $cartId
     * @return \Magento\Payment\Model\MethodInterface[]
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getPaymentMethodsList($cartId)
    {
        /** @var \Magento\Quote\Model\Quote $quote */
        $quote = $this->quoteRepository->get($cartId);
        return $this->methodList->getAvailableMethods($quote);
    }

    /**
     * @param $path
     * @param null $storeId
     * @return mixed
     */
    public function getConfigValue($path, $storeId = null)
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE, $storeId);
    }
}
