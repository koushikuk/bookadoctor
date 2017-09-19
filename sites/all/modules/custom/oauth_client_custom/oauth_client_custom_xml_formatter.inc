<?php
/**
 * Overriding the default XML formatter
 */


class oauth_client_custom_xml_formatter implements ServicesFormatterInterface {
  public function render($data) {
    $doc = new DOMDocument('1.0', 'utf-8');
    //Modifying the root element of xml response
    if(isset($data['xml_root_element'])){
        $root = $doc->createElement($data['xml_root_element']);
        unset($data['xml_root_element']);
    }else{
        $root = $doc->createElement('result');
    }
    
    $doc->appendChild($root);

    $this->xml_recursive($doc, $root, $data);

    return $doc->saveXML();
  }

  private function xml_recursive(&$doc, &$parent, $data) {
    if (is_object($data)) {
      $data = get_object_vars($data);
    }

    if (is_array($data)) {
      $assoc = FALSE || empty($data);
      foreach ($data as $key => $value) {
        if (is_numeric($key)) {
          $key = 'item';
        }
        else {
          $assoc = TRUE;
          $key = preg_replace('/[^A-Za-z0-9_]/', '_', $key);
          $key = preg_replace('/^([0-9]+)/', '_$1', $key);
        }
        $element = $doc->createElement($key);
        $parent->appendChild($element);
        $this->xml_recursive($doc, $element, $value);
      }

      if (!$assoc) {
        $parent->setAttribute('is_array', 'true');
      }
    }
    elseif ($data !== NULL) {
      $parent->appendChild($doc->createTextNode($data));
    }
  }
}