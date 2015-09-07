<?php

/*

	Copyright 2015 Max Thor <thormax5@gmail.com>

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.


*/

class Format{

	public function __construct(){
		
	}

	private function linkParse($text){
		$regexUrl = '%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@|\d{1,3}(?:\.\d{1,3}){3}|(?:(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)(?:\.(?:[a-z\d\x{00a1}-\x{ffff}]+-?)*[a-z\d\x{00a1}-\x{ffff}]+)*(?:\.[a-z\x{00a1}-\x{ffff}]{2,6}))(?::\d+)?(?:[^\s]*)?$%iu';
		if(preg_match($regexUrl, $text, $url)){
			return preg_replace($regexUrl, "<a href='{$url[0]}''>{$url[0]}</a> ", $text);
		}else{
			return $text;
		}
	}

	private function bold($text){
		$regex = "/\*([^\*]+)\*/";
		return preg_replace($regex, '&lt;b&gt;$1&lt;&sl;b&gt;', $text);
	}

	private function italic($text){
		$regex = "/\\/([^\\/]+)\\//";
		return preg_replace($regex, '&lt;i&gt;$1&lt;&sl;i&gt;', $text);
	}

	private function strike($text){
		$regex = "/~([^~]+)~/";
		return preg_replace($regex, '&lt;s&gt;$1&lt;&sl;s&gt;', $text);
	}

	private function toHTML($text){
		return str_replace("&lt;", "<", str_replace("&gt;", ">", str_replace("&sl;", "/", $text)));
	}

	public function format($text, $options){
		if(in_array("link", $options)){
			$text = $this->linkParse($text);
		}
		if(in_array("bold", $options)){
			$text = $this->bold($text);
		}
		if(in_array("italic", $options)){
			$text = $this->italic($text);
		}
		if(in_array("strike", $options)){
			$text = $this->strike($text);
		}
		return $this->toHTML($text);
	}
}
