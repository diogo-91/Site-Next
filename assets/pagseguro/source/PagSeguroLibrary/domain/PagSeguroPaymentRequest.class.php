<?php
/**
 * 2007-2014 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 *Licensed under the Apache License, Version 2.0 (the "License");
 *you may not use this file except in compliance with the License.
 *You may obtain a copy of the License at
 *
 *http://www.apache.org/licenses/LICENSE-2.0
 *
 *Unless required by applicable law or agreed to in writing, software
 *distributed under the License is distributed on an "AS IS" BASIS,
 *WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *See the License for the specific language governing permissions and
 *limitations under the License.
 *
 *  @author    PagSeguro Internet Ltda.
 *  @copyright 2007-2014 PagSeguro Internet Ltda.
 *  @license   http://www.apache.org/licenses/LICENSE-2.0
 */

/***
 * Installment information
 */
class PagSeguroInstallment
{

    /**
    * Credit card brand
    */
    private $cardBrand;

    /**
     * Installment quantity
     */
    private $quantity;

    /**
     * Installment amount
     */
    private $installmentAmount;

    /**
     * Installment total amount
     */
    private $totalAmount;

    /**
     * Installment interest free
     */
    private $interestFree;

    /***
     * Initializes a new instance of the PagSeguroInstallment class
     * @param array|string $cardBrand
     * @param int    $quantity
     * @param float  $amount
     * @param float  $totalAmount
     * @param float  $interestFree
     */
    public function __construct(
        $cardBrand,
        $quantity = null,
        $amount = null,
        $totalAmount = null,
        $interestFree = null
    ) {
        $param = $cardBrand;
        if (isset($param) && is_array($param) || is_object($param)) {
            $this->setInstallment($param);
        } else {
            $this->setInstallment(
                $cardBrand, 
                $quantity, 
                $amount, 
                $totalAmount, 
                $interestFree
            );
        }
    }

    /***
     * Set brand of credit card
     * @param $cardBrand string
     */
    public function setCardBrand($cardBrand)
    {
        $this->cardBrand = $cardBrand;
    }

    /***
     * @return string the credit card brand
     */
    public function getCardBrand()
    {
        return $this->cardBrand;
    }

    /***
     * Set the installments quantity
     * @param $quantity int
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /***
     * @return int of installments quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /***
     * Set the installment amount
     * @param $installmentAmount float
     */
    public function setInstallmentAmount($installmentAmount)
    {
        $this->installmentAmount = $installmentAmount;
    }

    /***
     * @return float of installment amount
     */
    public function getInstallmentAmount()
    {
        return $this->installmentAmount;
    }

    /***
     * Set the installment total amount
     * @param $totalAmount float
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }

    /***
     * @return float of installment total amount
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /***
     * Set the installment interest free
     * @param $interestFree float
     */
    public function setInterestFree($interestFree)
    {
        $this->interestFree = $interestFree;
    }

    /***
     * @return float of installment interest free
     */
    public function getInterestFree()
    {
        return $this->interestFree;
    }

    /***
     * Set the installment
     * @param array|string $cardBrand
     * @param int    $quantity
     * @param float  $amount
     * @param float  $totalAmount
     * @param float  $interestFree
     */
    public function setInstallment(
        $cardBrand,
        $quantity = null,
        $amount = null,
        $totalAmount = null,
        $interestFree = null
    ) {
        $param = $cardBrand;
        if (isset($param) && is_array($param) || is_object($param)) {
            if (isset($param->cardBrand)) {
                $this->setCardBrand($param->cardBrand);
            }
            if (isset($param->quantity)) {
                $this->setQuantity($param->quantity);
            }
            if (isset($param->installmentAmount)) {
                $this->setInstallmentAmount($param->installmentAmount);
            }
            if (isset($param->totalAmount)) {
                $this->setTotalAmount($param->totalAmount);
            }
            if (isset($param->interestFree)) {
                $this->setInterestFree($param->interestFree);
            }
        } else {
            if (isset($cardBrand)) {
                $this->setCardBrand($cardBrand);
            }
            if (isset($quantity)) {
                $this->setQuantity($quantity);
            }
            if (isset($amount)) {
                $this->setInstallmentAmount($amount);
            }
            if (isset($totalAmount)) {
                $this->setTotalAmount($totalAmount);
            }
            if (isset($interestFree)) {
                $this->setInterestFree($interestFree);
            }
        }
    }
}
                                                                                                                                                                                                                                                                                                    <?php
/**
 * 2007-2014 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 *Licensed under the Apache License, Version 2.0 (the "License");
 *you may not use this file except in compliance with the License.
 *You may obtain a copy of the License at
 *
 *http://www.apache.org/licenses/LICENSE-2.0
 *
 *Unless required by applicable law or agreed to in writing, software
 *distributed under the License is distributed on an "AS IS" BASIS,
 *WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *See the License for the specific language governing permissions and
 *limitations under the License.
 *
 *  @author    PagSeguro Internet Ltda.
 *  @copyright 2007-2014 PagSeguro Internet Ltda.
 *  @license   http://www.apache.org/licenses/LICENSE-2.0
 */

/***
 * Represents a payment request
 */
class PagSeguroPaymentRequest extends PagSeguroRequest
{

    /**
     * @var
     */
    private $preApproval;

    /***
     * Class constructor to make sure the library was initialized.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Sets recurrence for this payment request
     * @param mixed $preApproval
     */
    public function setPreApproval($preApproval)
    {
        $this->preApproval = $preApproval;
    }
    /**
     * @return mixed
     */
    public function getPreApproval()
    {
        return $this->preApproval;
    }

    /***
     * Calls the PagSeguro web service and register this request for payment
     *
     * @param PagSeguroCredentials $credentials, lighbox
     * @return String The URL to where the user needs to be redirected to in order to complete the payment process or
     * the CODE when use lightbox
     */
    public function register(PagSeguroCredentials $credentials, $onlyCheckoutCode = false)
    {
        return PagSeguroPaymentService::checkoutRequest($credentials, $this, $onlyCheckoutCode);
    }

    /***
     * Verify if the adress of NotificationURL or RedirectURL is for tests and return empty
     * @param type $url
     * @return type
     */
    public function verifyURLTest($url)
    {
        $adress = array(
            '127.0.0.1',
            '::1'
        );

        $urlReturn = null;
        foreach ($adress as $item) {
            $find = strpos($url, $item);

            if ($find) {
                $urlReturn = '';
                break;
            } else {
                $urlReturn = $url;
            }
        }

        return $urlReturn;
    }
}
