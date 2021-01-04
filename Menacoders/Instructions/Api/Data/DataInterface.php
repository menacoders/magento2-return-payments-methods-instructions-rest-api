<?php

namespace MENAcoders\Instructions\Api\Data;

/**
 * Interface DataInterface
 * @api
 * @since 100.0.2
 */
interface DataInterface
{
    const CODE = 'code';
    const TITLE = 'title';
    const INSTRUCTION = 'instruction';

    /**
     * Get payment method code
     *
     * @return string
     */
    public function getCode();

    /**
     * Set payment method code
     *
     * @api
     * @param string code
     * @return $this
     */
    public function setCode($code);

    /**
     * Get payment method title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Set payment method title
     * @api
     * @param string title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Get payment method Instructions
     *
     * @return string|null
     */
    public function getInstruction();

    /**
     * Set payment method Instructions
     **
     * @api
     * @param string|null instruction
     * @return $this
     */
    public function setInstruction($instruction);
}