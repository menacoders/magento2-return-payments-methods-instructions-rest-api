<?php

namespace Menacoders\Instructions\Model\Data;

use Menacoders\Instructions\Api\Data\DataInterface;
use Magento\Framework\Api\AbstractExtensibleObject;

/**
 * Class PaymentMethod
 * @package Menacoders\Instructions\Model\Data
 */
class Data extends AbstractExtensibleObject implements DataInterface
{
    /**
     * Get payment method code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->_get(self::CODE);
    }

    /**
     * Set payment method code
     *
     * @param string code
     * @return $this
     * @api
     */
    public function setCode($code)
    {
        return $this->setData(self::CODE, $code);
    }

    /**
     * Get payment method title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->_get(self::TITLE);
    }

    /**
     * Set payment method title
     * @param string title
     * @return $this
     * @api
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Get payment method Instructions
     *
     * @return string|null
     */
    public function getInstruction()
    {
        return $this->_get(self::INSTRUCTION);
    }

    /**
     * Set payment method Instructions
     **
     * @param string|null instruction
     * @return $this
     * @api
     */
    public function setInstruction($instruction)
    {
        return $this->setData(self::INSTRUCTION, $instruction);
    }
}