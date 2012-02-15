<?php
require_once 'src/SwDb.php';

class Project {
	
	protected $props;

	public function __construct($props) {
		$this->props = $props;
	}

	static public function getProjects() {
		$dbh = SwDb::getInstance();
		$sth = $dbh->prepare('SELECT * FROM projects ORDER BY `title` ASC');
		$sth->execute();
		return $sth->fetchAll();
	}

	public function getSummaryHtml() {

		$title = ( false === empty($this->props['image_source'])) ? 'title="Photo credit: '.$this->props['image_source'].'"' : '';

		return <<<html
<a href="/project_page.php?projectid={$this->props['id']}" class="project">
<img src="{$this->props['image']}" $title />
<h4>{$this->props['title']}</h4>
<p>{$this->props['summary']}</p>
</a>
html;

	}
}

?>