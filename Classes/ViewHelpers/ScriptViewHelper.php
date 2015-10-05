<?php

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * View helper for rendering script
 *
 * = Examples =
 */
class Tx_CalendarDisplay_ViewHelpers_ScriptViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * Inject JS file in the header code.
	 *
	 * @param mixed $src String filename or array of filenames
	 * @param bool $cache If true, file(s) is cached
	 * @param bool $concat If true, files are concatenated (makes sense if $file is array)
	 * @param bool $compress If true, files are compressed using JSPacker
	 * @param bool $forceOnTop
	 * @return string
	 */
	public function render($src = NULL, $cache = FALSE, $concat = FALSE, $compress = FALSE, $forceOnTop = FALSE) {

		if ($src === NULL) {
			$content = $this->renderChildren();
			/** @var $pagerender t3lib_pagerenderer */
			$pagerender = $GLOBALS['TSFE']->getPageRenderer();
			$pagerender->addJsInlineCode(md5($content), $content, $compress, $forceOnTop);
		} else if (is_array($src)) {
			foreach ($src as $file) {
				$file = $this->resolvePath($file);
				$tag = $this->getTag($file);
				$GLOBALS['TSFE']->additionalHeaderData[md5($file)] = $tag;
			}
		} else {
			$file = $this->resolvePath($src);
			$tag = $this->getTag($file);
			$GLOBALS['TSFE']->additionalHeaderData[md5($file)] = $tag;
		}
		return NULL;
	}

	/**
	 * Generate the tag
	 *
	 * @param string $file
	 * @return string
	 */
	protected function getTag($file) {
		$file = \TYPO3\CMS\Core\Utility\GeneralUtility::createVersionNumberedFilename($file);
		$tag = '<script src="' . htmlspecialchars($file) . '" type="text/javascript"></script>';
		return $tag;
	}

	/**
	 * Resolves the path
	 *
	 * @param string $filename
	 * @return string
	 */
	protected function resolvePath($filename) {
		if (substr($filename, 0, 4) == 'EXT:') { // extension
			list($extKey, $local) = explode('/', substr($filename, 4), 2);
			$filename = '';
			if (strcmp($extKey, '') && \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded($extKey) && strcmp($local, '')) {
				$filename = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath($extKey) . $local;
			}
		}
		return $filename;
	}
}