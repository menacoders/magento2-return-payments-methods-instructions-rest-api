<?php

namespace Menacoders\Instructions\Plugin\Model;

use Magento\Quote\Api\Data\AddressInterface;
use Magento\Store\Model\StoreManager;
use Menacoders\Instructions\Helper\Data as Helper;

/**
 * Class StoreManager
 * @package Ced\Advance\Plugin\Model
 */
class ShippingMethodManagement
{
    /**
     * @var StoreManager
     */
    private $storeManager;

    /**
     * @var Helper
     */
    private $helper;

    /**
     * ShippingMethodManagement constructor.
     * @param StoreManager $storeManager
     * @param Helper $helper
     */
    public function __construct(
        StoreManager $storeManager,
        Helper $helper
    )
    {
        $this->storeManager = $storeManager;
        $this->helper = $helper;
    }

    /**
     * @param $subject
     * @param $websites
     * @param bool $withDefault
     * @param bool $codeKey
     * @return array
     */
    public function afterEstimateByExtendedAddress($subject, $shippingMethods, $cartId, AddressInterface $address){
        $modifiedShippingMethods = [];
        $storeId = $this->storeManager->getStore()->getId();
        foreach ($shippingMethods as $method) {
            $carrierCode = $method->getCarrierCode();
            $carrierTitle = $this->helper->getConfigValue('carriers/' . $carrierCode . '/title', $storeId);
            $methodTitle = $this->helper->getConfigValue('carriers/' . $carrierCode . '/name', $storeId);
            $modifiedShippingMethods[] = $method->setCarrierTitle($carrierTitle)
                                                ->setMethodTitle($methodTitle);
        }
        return $modifiedShippingMethods;
    }
}