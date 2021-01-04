<?php

namespace Menacoders\Instructions\Model;

use Magento\Quote\Api\CartManagementInterface;
use Magento\Checkout\Model\PaymentDetailsFactory;
use Magento\Quote\Api\CartTotalRepositoryInterface;
use Menacoders\Instructions\Helper\Data as Helper;
use Menacoders\Instructions\Model\Data\DataFactory;
use Magento\Store\Model\StoreManager;

/**
 * Payment information management
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class PaymentInformationManagement implements \Menacoders\Instructions\Api\PaymentInformationManagementInterface
{
    /**
     * @var CartManagementInterface
     */
    protected $cartManagement;

    /**
     * @var PaymentDetailsFactory
     */
    protected $paymentDetailsFactory;

    /**
     * @var CartTotalRepositoryInterface
     */
    protected $cartTotalsRepository;

    /**
     * @var Helper
     */
    protected $helper;

    /**
     * @var DataFactory
     */
    private $dataFactory;

    /**
     * @var StoreManager
     */
    private $storeManager;

    /**
     * PaymentInformationManagement constructor.
     * @param CartManagementInterface $cartManagement
     * @param PaymentDetailsFactory $paymentDetailsFactory
     * @param CartTotalRepositoryInterface $cartTotalsRepository
     * @param DataFactory $dataFactory
     * @param Helper $helper
     * @param StoreManager $storeManager
     */
    public function __construct(
        CartManagementInterface $cartManagement,
        PaymentDetailsFactory $paymentDetailsFactory,
        CartTotalRepositoryInterface $cartTotalsRepository,
        DataFactory $dataFactory,
        Helper $helper,
        StoreManager $storeManager
    ) {
        $this->cartManagement = $cartManagement;
        $this->paymentDetailsFactory = $paymentDetailsFactory;
        $this->cartTotalsRepository = $cartTotalsRepository;
        $this->helper = $helper;
        $this->dataFactory = $dataFactory;
        $this->storeManager = $storeManager;
    }

    /**
     * @inheritdoc
     */
    public function getPaymentInformation($cartId)
    {
        /** @var \Magento\Checkout\Api\Data\PaymentDetailsInterface $paymentDetails */
        $paymentDetails = $this->paymentDetailsFactory->create();
        $storeId = $this->storeManager->getStore()->getId();
        $methods = [];
        foreach ($this->helper->getPaymentMethodsList($cartId) as $methodInstance) {
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
        $paymentDetails->setPaymentMethods($methods);
        $paymentDetails->setTotals($this->cartTotalsRepository->get($cartId));
        return $paymentDetails;
    }
}
