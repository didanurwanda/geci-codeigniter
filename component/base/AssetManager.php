<?php

namespace GeCi\component\base;

class AssetManager extends \GeCi\component\Component
{
	public $assetDefault;
	public $assets;
	
	public function __construct()
	{
		$this->assets = \GeCi::config('asset_path');
		$this->assetDefault  = \GeCi::config('base_path').'/assets';
	}
	
	public function registerCoreAssets()
	{
		$this->registerAssets($this->assetDefault);
	}
	
	public function registerAssets($from)
	{
		if(ENVIRONMENT=='development')
		{
			$to = $this->assets.'/'.md5($from);
			@mkdir($this->assets);
			@mkdir($to);
			if(\GeCi::config('asset_load')==2)
				self::createAssets($from, $to, true);
			elseif(\GeCi::config('asset_load')==1)
				self::createAssets($from, $to, false);
		}
	}
	
	public function getCoreAssets()
	{
		return $this->getAssetUrl($this->assetDefault);
	}
	
	public function getAssetUrl($from)
	{
		return $this->assets.'/'.md5($from);
	}
	
	public function createAssets($from = '', $to = '', $replace = true)
	{
		if(is_dir($from))
		{
			@mkdir($to);
			$dir=scandir($from);
			
			foreach($dir as $row)
			{
				if($row!=='.' && $row!=='..')
				{
					if(is_dir($from.'/'.$row))
					{
						self::createAssets($from.'/'.$row,$to.'/'.$row);
					}	
					else
					{
						self::copy($from.'/'.$row, $to.'/'.$row, $replace);
					}
				}
			}
		}
		else
		{
			self::copy($from, $to, $replace);
		}
	}
	
	public function copy($from, $to, $replace = true)
	{
		if($replace)
			@copy($from, $to);
		elseif(!file_exists($to))
			@copy($from, $to);
	}
	
	public function clearAssets()
	{
		$this->deleteDir($this->assets);
	}
	
	public function deleteDir($path)
	{
		if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') 
		{
			$dirPath .= '/';
		}
		$files = glob($dirPath . '*', GLOB_MARK);
		foreach ($files as $file) 
		{
			if (is_dir($file)) 
			{
				self::deleteDir($file);
			} 
			else 
			{
				@unlink($file);
			}
		}
		@rmdir($dirPath);
	}
}