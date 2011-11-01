<?php

class Resource {
	
	static public function factory($props) {
		switch($props['type']) {

			case 1: return new ReportResource($props); break;
			case 2: return new PaperResource($props); break;
			case 3: return new PresentationResource($props); break;
			case 4: return new VideoResource($props); break;
			default: throw new Exception('Type of resource was not recognized.');

		}
	}
}

class ReportResource {
	public function __constructor($props) {
		$this->props = $props;
	}
	public function toSummaryHtml() {
		//noop
	}
}

class PaperResource {
	public function __constructor($props) {
		$this->props = $props;
	}
	public function toSummaryHtml() {
		//noop
	}
}

class PresentationResource {
	public function __constructor($props) {
		$this->props = $props;
	}
	public function toSummaryHtml() {
		//noop
	}
}

class VideoResource {
	public function __constructor($props) {
		$this->props = $props;
	}
	public function toSummaryHtml() {
		//noop
	}
}


?>