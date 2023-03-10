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

/**
 * Library autoloader - spl_autoload_register
 */
class PagSeguroAutoloader
{

    public static $loader;

    private static $dirs = array(
        'config',
        'resources',
        'log',
        'domain',
        'exception',
        'parser',
        'service',
        'utils',
        'helper'
    );

    private function __construct()
    {
        if (function_exists('__autoload')) {
            spl_autoload_register('__autoload');
        }
        spl_autoload_register(array($this, 'addClass'));
    }

    public static function init()
    {
        if (!function_exists('spl_autoload_register')) {
            throw new Exception("PagSeguroLibrary: Standard PHP Library (SPL) is required.");
        }
        if (self::$loader == null) {
            self::$loader = new PagSeguroAutoloader();
        }
        return self::$loader;
    }

    private function addClass($class)
    {
        foreach (self::$dirs as $key => $dir) {
            $file = PagSeguroLibrary::getPath() . DIRECTORY_SEPARATOR .
                $dir . DIRECTORY_SEPARATOR . $class . '.class.php';
            if (file_exists($file) && is_file($file)) {
                require_once $file;
            }
        }
    }
}
                                                   <?php
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
 * Encapsulates web service calls regarding PagSeguro payment requests
 */
class PagSeguroPaymentService
{

    /***
     *
     */
    const SERVICE_NAME = 'paymentService';

    /***
     * @param PagSeguroConnectionData $connectionData
     * @return string
     */
    private static function buildCheckoutRequestUrl(PagSeguroConnectionData $connectionData)
    {
        return $connectionData->getServiceUrl() . '/?' . $connectionData->getCredentialsUrlQuery();
    }

    /***
     * @param PagSeguroConnectionData $connectionData
     * @param $code
     * @return string
     */
    private static function buildCheckoutUrl(PagSeguroConnectionData $connectionData, $code)
    {
        return $connectionData->getPaymentUrl() . $connectionData->getResource('checkoutUrl') . "?code=$code";
    }

    /***
     * checkoutRequest is the actual implementation of the Register method
     * This separation serves as test hook to validate the Uri
     * against the code returned by the service
     * @param PagSeguroCredentials $credentials
     * @param PagSeguroPaymentRequest $paymentRequest
     * @return bool|string
     * @throws Exception|PagSeguroServiceException
     * @throws Exception
     */
    public static function checkoutRequest(
        PagSeguroCredentials $credentials,
        PagSeguroPaymentRequest $paymentRequest,
        $onlyCheckoutCode
    ) {

        LogPagSeguro::info("PagSeguroPaymentService.Register(" . $paymentRequest->toString() . ") - begin");

        $connectionData = new PagSeguroConnectionData($credentials, self::SERVICE_NAME);

        try {
            $connection = new PagSeguroHttpConnection();
            $connection->post(
                self::buildCheckoutRequestUrl($connectionData),
                PagSeguroPaymentParser::getData($paymentRequest),
                $connectionData->getServiceTimeout(),
                $connectionData->getCharset()
            );

            $httpStatus = new PagSeguroHttpStatus($connection->getStatus());

            switch ($httpStatus->getType()) {
                case 'OK':
                    $PaymentParserData = PagSeguroPaymentParser::readSuccessXml($connection->getResponse());

                    if ($onlyCheckoutCode) {
                        $paymentReturn = $PaymentParserData->getCode();
                    } else {
                        $paymentReturn = self::buildCheckoutUrl($connectionData, $PaymentParserData->getCode());
                    }
                    LogPagSeguro::info(
                        "PagSeguroPaymentService.Register(" . $paymentRequest->toString() . ") - end {1}" .
                        $PaymentParserData->getCode()
                    );
                    break;
                case 'BAD_REQUEST':
                    $errors = PagSeguroPaymentParser::readErrors($connection->getResponse());
                    $error = new PagSeguroServiceException($httpStatus, $errors);
                    LogPagSeguro::error(
                        "PagSeguroPaymentService.Register(" . $paymentRequest->toString() . ") - error " .
                        $error->getOneLineMessage()
                    );
                    throw $error;
                    break;
                default:
                    $error = new PagSeguroServiceException($httpStatus);
                    LogPagSeguro::error(
                        "PagSeguroPaymentService.Register(" . $paymentRequest->toString() . ") - error " .
                        $error->getOneLineMessage()
                    );
                    throw $error;
                    break;

            }
            return (isset($paymentReturn) ? $paymentReturn : false);

        } catch (PagSeguroServiceException $error) {
            throw $error;
        } catch (Exception $error) {
            LogPagSeguro::error("Exception: " . $error->getMessage());
            throw $error;
        }
    }
}
