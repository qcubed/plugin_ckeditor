<?php
	require('../../../qcubed/qcubed.inc.php');

	use QCubed\Plugin\QCKEditor;

/**
 * Class SampleForm2
 *
 * This example demonstrates how to call an initialization function to customize the ck editor
 */
	class SampleForm2 extends QForm {
		protected $txtEditor;
		protected $btnSubmit;
		protected $pnlResult;

		protected function Form_Create() {
			$this->txtEditor = new QCKEditor($this);
			$this->txtEditor->Text = '<b>Something</b> to start with.';
			$this->txtEditor->Configuration = 'ckConfig';

			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = "Submit";
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('submit_click'));

			$this->pnlResult = new QPanel($this);
			$this->pnlResult->HtmlEntities = true;
		}

		protected function submit_click($strFormId, $strControlId, $param) {
			$this->pnlResult->Text = $this->txtEditor->Text;
		}
	}

	SampleForm2::Run('SampleForm2');
