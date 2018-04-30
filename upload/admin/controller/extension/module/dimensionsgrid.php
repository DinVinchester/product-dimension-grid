<?php
class ControllerExtensionModuleDimensionsgrid extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('extension/module/dimensionsgrid');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('extension/cms/dimensionsgrid');
	}

	public function install() {
		$this->load->model('extension/cms/dimensionsgrid');
		$this->model_extension_cms_dimensionsgrid->install();

		$this->load->model('setting/extension');
		$this->model_setting_extension->install('module', 'dimensionsgrid');
	}

	public function uninstall() {
		$this->load->model('extension/cms/dimensionsgrid');
		$this->model_extension_cms_dimensionsgrid->uninstall();

		$this->load->model('setting/extension');
		$this->model_setting_extension->uninstall('module', 'dimensionsgrid');
	}
}
