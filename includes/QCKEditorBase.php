<?php
/**
 * This file contains the QCKEditor Class.
 */

namespace QCubed\Plugin;
/**
 * Class QCKEditorBase: For creating a Rich text editor with CKEditor
 *
 * @package QCubed\Plugin
 *
 * @property-write string $ReadyFunction JS function to pass to the ckeditor creation instance
 * @property-write string $Configuration Configuration options to pass to the ckeditor instance
 */
class QCKEditorBase extends \QTextBoxBase {

	protected $strJsReadyFunc = 'function(){}';

	public function __construct($objParentObject, $strControlId = null) {
		parent::__construct($objParentObject, $strControlId);
		$this->registerFiles();

		$this->strCrossScripting = \QCrossScripting::Allow;
		$this->strTextMode = \QTextMode::MultiLine;
	}

	protected function registerFiles() {
		$this->AddPluginJavascriptFile("ckeditor", "QCKSetup.js");
		$this->AddJavascriptFile(__VENDOR_ASSETS__ . "/ckeditor/ckeditor/ckeditor.js");
		$this->AddJavascriptFile(__VENDOR_ASSETS__ . "/ckeditor/ckeditor/adapters/jquery.js");
	}

	public function getJqSetupFunction() {
		return 'ckeditor';
	}

	// currently cannot use ajax
	public function GetControlJavaScript() {
		$strFormId = $this->Form->FormId;
		$strControlId = $this->strControlId;
		$strReadyFunc = 'null';
		if ($this->strJsReadyFunc) {
			$strReadyFunc = $this->strJsReadyFunc;
		}
		$strJs = "function() {qcubed.qckeditor(this, '{$strFormId}', '{$strControlId}', {$strReadyFunc});}";
		return sprintf('jQuery("#%s").%s(%s)', $this->getJqControlId(), $this->getJqSetupFunction(), $strJs);
	}

	public function GetEndScript() {
		return  $this->GetControlJavaScript() . '; ' . parent::GetEndScript();
	}

	public function __set($strName, $mixValue) {

		//$this->blnModified = true;
		switch ($strName) {
			case "ReadyFunction":
				// The name of a javascript function to call after the CKEditor instance is ready, so that you can do further initialization
				// This function will receive the formId and controlId as parameters, and "this" will be the ckeditor instance.
				try {
					$this->strJsReadyFunc = \QType::Cast($mixValue, \QType::String);
					break;
				} catch (QInvalidCastException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
				break;

			default:
				try {
					parent::__set($strName, $mixValue);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}
				break;

		}
	}


}
