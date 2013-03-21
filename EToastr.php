<?php
/**
 * EToastr adds {@link http://codeseven.github.com/toastr/} for flash messages.
 * @author cherif bouchelaghem <cherif.bouchelaghem@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 * @version 0.1
 * @package ext.widgets.etoastr
 */
class EToastr extends CWidget
{
	public $options=array();
	public $responsive=false;
	public $message='';
	public $title;
	public $positionClass;
	public $flashMessagesOnly=false;

	public function init(){
		$this->registerClientScripts();
		parent::init();
	}

	public function run(){

		$toastrScript='';

		if(isset($this->options) && is_array($this->options)) {
			$toastrOptions=CJavaScript::encode($this->options);
		}else{
			$toastrOptions=CJavaScript::encode($this->defaultOptions());
		}

		$toastrOptions =CJavaScript::encode($this->options);
		$toastrScript .='toastr.options='. $toastrOptions.';';

		if($this->message && !$this->flashMessagesOnly){
			if(isset($this->title)){
				$toastrScript .='toastr.info("' . $this->message . '", "'. $this->title .'")'; 			
			}else {
					$toastrScript .='toastr.info("' . $this->message . '")';
				}		
				Yii::app()->clientScript->registerScript('toastr',$toastrScript);	
		}else{
			
			Yii::app()->clientScript->registerScript('toastrOptions',$toastrScript);
			
			$flashes=Yii::app()->user->getFlashes();

			foreach ($flashes as $type => $message) {
				Yii::app()->clientScript->registerScript('toastr_' . $type ,'toastr.'. $type . '("' . $message . '",null);');
			}
		}
	}

	public function registerClientScripts(){
		$cs=Yii::app()->clientScript;
		$cs->registerCoreScript('jquery');
		$assetsPath=dirname(__FILE__) . '/assets';
		$assetsUrl=Yii::app()->assetManager->publish($assetsPath,false, -1, YII_DEBUG);
		$cs->registerCssFile($assetsUrl.'/toastr.css');
		if($this->responsive)
			$cs->registerCssFile($assetsUrl.'/toastr-responsive.css',CClientScript::POS_HEAD);

		$cs->registerScriptFile($assetsUrl.'/toastr.js',CClientScript::POS_HEAD);

	}

	public function defaultOptions(){
		return array(

		);
	}
}