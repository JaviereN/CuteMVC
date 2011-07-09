<?php
class Profiler
{
	private function __construct() 
	{
		
	}
	
	//...
	
	private static function convertSize($size)
	{
		$unit=array('b','kb','mb','gb','tb','pb');
		return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
	}
	
	public static function display()
	{
		echo '<div style=" min-height:100%; position: fixed; background-color: #f7f7f7; background-image: -moz-linear-gradient(-90deg, #e4e4e4, #ffffff); background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e4e4e4), to(#ffffff)); top:30px; bottom: 0; left:0; margin:0; padding: 0; z-index: 6000000; width: 100%; font: 12px Verdana, Arial, sans-serif; text-align: left; color: #2f2f2f;">
					<div style="display: block; background-color: #2F2F2F; padding: 8px 20px; position: fixed; top: 0; left:0; width: 100%; font: 11px Verdana, Arial, sans-serif; text-align: left; color: #EEEEEE;">
						asdf
					</div>';
		
					echo timeEnd(TIMESTART)/1000;
					pr(get_included_files());
					echo self::convertSize(memory_get_usage());
					
		echo '</div>
			  <div style="position: fixed; background-color: #f7f7f7; background-image: -moz-linear-gradient(-90deg, #e4e4e4, #ffffff); background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#e4e4e4), to(#ffffff)); bottom: 0; left:0; margin:0; padding: 0; z-index: 6000000; width: 100%; border-top: 1px solid #bbb; font: 11px Verdana, Arial, sans-serif; text-align: left; color: #2f2f2f;">
			  	<span style="white-space:nowrap; color:#2f2f2f; display:inline-block; min-height:24px; border-right:1px solid #cdcdcd; padding:8px 7px 1px 4px; ">
		     		Cute Profiler
				</span>
				<span style="white-space:nowrap; color:#2f2f2f; display:inline-block; min-height:24px; border-right:1px solid #cdcdcd; padding:8px 7px 1px 4px; ">
		     		<span><a href="#" style="color: #2f2f2f">PHP '.phpversion().'</a></span>
					<span style="margin: 0; padding: 0; color: #979696;">|</span>
					<span style="color: #a33">xdebug</span>
					<span style="margin: 0; padding: 0; color: #979696">|</span>
					<span style="color: #759e1a">accel</span>
				</span>
				<span style="display:block; position:absolute; top:10px; right:30px; width:14px; height:14px; cursor: pointer;">
					close
				</span>
			  </div>';
	}
	
	private function __destruct() 
	{
		
	}
}
?>