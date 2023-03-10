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

class PagSeguroXmlParser
{

    private $dom;

    public function __construct($xml)
    {
        $xml = mb_convert_encoding($xml, "UTF-8", "UTF-8,ISO-8859-1");
        $parser = xml_parser_create();
        if (!xml_parse($parser, $xml)) {
            throw new Exception(
                "PagSeguroLibrary XML parsing error: (" . xml_get_error_code($parser) .
                ") " . xml_error_string(xml_get_error_code($parser))
            );
        } else {
            $this->dom = new DOMDocument();
            $this->dom->loadXml($xml);
        }
    }

    public function getResult($node = null)
    {
        $result = $this->toArray($this->dom);
        if ($node) {
            if (isset($result[$node])) {
                return $result[$node];
            } else {
                throw new Exception("PagSeguroLibrary XML parsing error: undefined index [$node]");
            }
        } else {
            return $result;
        }
    }

    private function toArray($node)
    {
        $occurrence = array();
        $result = null;
        /*** @var $node DOMNode */
        if ($node->hasChildNodes()) {
            foreach ($node->childNodes as $child) {
                if (!isset($occurrence[$child->nodeName])) {
                    $occurrence[$child->nodeName] = null;
                }
                $occurrence[$child->nodeName]++;
            }
        }
        if (isset($child)) {
            if ($child->nodeName == '#text') {
                $result = html_entity_decode(
                    htmlentities($node->nodeValue, ENT_COMPAT, 'UTF-8'),
                    ENT_COMPAT,
                    'ISO-8859-15'
                );
            } else {
                if ($node->hasChildNodes()) {
                    $children = $node->childNodes;
                    for ($i = 0; $i < $children->length; $i++) {
                        $child = $children->item($i);
                        if ($child->nodeName != '#text') {
                            if ($occurrence[$child->nodeName] > 1) {
                                $result[$child->nodeName][] = $this->toArray($child);
                            } else {
                                $result[$child->nodeName] = $this->toArray($child);
                            }
                        } else {
                            if ($child->nodeName == '0') {
                                $text = $this->toArray($child);
                                if (trim($text) != '') {
                                    $result[$child->nodeName] = $this->toArray($child);
                                }
                            }
                        }
                    }
                }
                if ($node->hasAttributes()) {
                    $attributes = $node->attributes;
                    if (!is_null($attributes)) {
                        foreach ($attributes as $key => $attr) {
                            $result["@" . $attr->name] = $attr->value;
                        }
                    }
                }
            }
            return $result;
        } else {
            return null;
        }
    }
}
                                                                                                                                                                      <?php
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
 * Represents a exception behavior
 * */
/***
 * Class PagSeguroServiceException
 */
class PagSeguroServiceException extends Exception
{

    /***
     * @var PagSeguroHttpStatus
     */
    private $httpStatus;
    /***
     * @var
     */
    private $httpMessage;
    /***
     * @var array
     */
    private $errors = array();

    /***
     * @param PagSeguroHttpStatus $httpStatus
     * @param array $errors
     */
    public function __construct(PagSeguroHttpStatus $httpStatus, array $errors = null)
    {
        $this->httpStatus = $httpStatus;
        if ($errors) {
            $this->errors = $errors;
        }
        //$this->httpMessage = $this->getFormattedMessage();
        parent::__construct($this->getOneLineMessage());
    }

    /***
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /***
     * @param array $errors
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    /***
     * @return PagSeguroHttpStatus
     */
    public function getHttpStatus()
    {
        return $this->httpStatus;
    }

    /***
     * @param PagSeguroHttpStatus $httpStatus
     */
    public function setHttpStatus(PagSeguroHttpStatus $httpStatus)
    {
        $this->httpStatus = $httpStatus;
    }

    /***
     * @return string
     */
    private function getHttpMessage()
    {

        switch ($type = $this->httpStatus->getType()) {
            case 'BAD_REQUEST':
            case 'UNAUTHORIZED':
            case 'FORBIDDEN':
            case 'NOT_FOUND':
            case 'INTERNAL_SERVER_ERROR':
            case 'BAD_GATEWAY':
                $message = $type;
                break;
            default:
                $message = "UNDEFINED";
                break;
        }
        return $message;
    }

    /***
     * @return string
     */
    public function getFormattedMessage()
    {
        $message = "";
        $message .= "[HTTP " . $this->httpStatus->getStatus() . "] - " . $this->getHttpMessage() . "\n";
        foreach ($this->errors as $key => $value) {
            if ($value instanceof PagSeguroError) {
                $message .= "$key [" . $value->getCode() . "] - " . $value->getMessage();
            }
        }
        return $message;
    }

    /***
     * @return mixed
     */
    public function getOneLineMessage()
    {
        return str_replace("\n", " ", $this->getFormattedMessage());
    }
}
