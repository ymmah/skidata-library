<?php

/*
 * This file is part of the skidata-library package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SkiData\Parser;

use DateTime;
use WBW\Library\SkiData\Entity\SkiDataStartRecordFormatEntity;
use WBW\Library\SkiData\Exception\SkiDataMissingStartRecordFormatException;
use WBW\Library\SkiData\Exception\SkiDataTooLongDataException;

/**
 * Abstract SkiData parser.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Parser
 * @abstract
 */
abstract class AbstractSkiDataParser implements SkiDataParserInterface {

	/**
	 * Start record format.
	 *
	 * @var SkiDataStartRecordFormatEntity
	 */
	private $startRecordFormat;

	/**
	 * Constructor.
	 */
	protected function __construct() {
		// NOTHING TO DO.
	}

	/**
	 * Decode a date string.
	 *
	 * @param string $str The string.
	 * @return DateTime Returns the decoded string into DateTime.
	 */
	protected final function decodeDate($str) {
		return $str === "" ? null : DateTime::createFromFormat("!" . self::DATE_FORMAT, $str);
	}

	/**
	 * Decode a datetime string.
	 *
	 * @param string $str The string.
	 * @return DateTime Returns the decoded string into DateTime.
	 */
	protected final function decodeDateTime($str) {
		return $str === "" ? null : DateTime::createFromFormat(self::DATETIME_FORMAT, $str);
	}

	/**
	 * Decode a integer string.
	 *
	 * @param string $str The string.
	 * @return integer Returns the decoded string into integer.
	 */
	protected final function decodeInteger($str) {
		return $str === "" ? null : intval($str);
	}

	/**
	 * Decode a string.
	 *
	 * @param string $str The string.
	 * @return string Returns the decoded string into string.
	 */
	protected final function decodeString($str) {
		return ($str === "" || strlen($str) === 2) ? "" : substr($str, 1, strlen($str) - 2);
	}

	/**
	 * Encode a boolean value.
	 *
	 * @param boolean $value The value.
	 * @return string Returns the encoded boolean value.
	 */
	protected final function encodeBoolean($value) {
		return $value === true ? "1" : "0";
	}

	/**
	 * Encode a date value.
	 *
	 * @param DateTime $value The value.
	 * @return string Returns the encoded datetime value.
	 */
	protected final function encodeDate(DateTime $value = null) {
		return !is_null($value) ? $value->format(self::DATE_FORMAT) : "";
	}

	/**
	 * Encode a datetime value.
	 *
	 * @param DateTime $value The value.
	 * @return string Returns the encoded datetime value.
	 */
	protected final function encodeDateTime(DateTime $value = null) {
		return !is_null($value) ? $value->format(self::DATETIME_FORMAT) : "";
	}

	/**
	 * Encode an integer value.
	 *
	 * @param integer $value The value.
	 * @param integer $length The length.
	 * @return string Returns the encoded integer.
	 * @throws SkiDataTooLongDataException Throws a SkiData too long data exception if the value exceeds the length.
	 */
	protected final function encodeInteger($value, $length) {
		$format	 = "%'.0" . $length . "d";
		$output	 = sprintf($format, $value);
		if ($length < strlen($output)) {
			throw new SkiDataTooLongDataException($value, $length);
		}
		return $output;
	}

	/**
	 * Encode a string value.
	 *
	 * @param string $value The value.
	 * @param integer $length The length.
	 * @return string Returns the encoded string.
	 * @throws SkiDataTooLongDataException Throws a SkiData too long data exception if the value exceeds the length.
	 */
	protected final function encodeString($value, $length = -1) {
		if ($length !== -1 && $length < strlen($value)) {
			throw new SkiDataTooLongDataException($value, $length);
		}
		return "\"" . substr($value, 0, ($length === -1 ? strlen($value) : $length)) . "\"";
	}

	/**
	 * Get the start record format.
	 *
	 * @return SkiDataStartRecordFormatEntity Returns the start record format.
	 */
	public final function getStartRecordFormat() {
		return $this->startRecordFormat;
	}

	/**
	 * Determines if the version of record structure is less or equal than $versionRecordStructure.
	 *
	 * @param integer $versionRecordStructure The version of record structure.
	 * @return boolean Returns true in case of success, false otherwise.
	 * @throws SkiDataMissingStartRecordFormatException Throws a SkiData missing start record format exception if the start record format is missing.
	 */
	protected final function isVersionRecordStructure($versionRecordStructure) {
		if (is_null($this->startRecordFormat)) {
			throw new SkiDataMissingStartRecordFormatException();
		}
		return $versionRecordStructure <= $this->startRecordFormat->getVersionRecordStructure();
	}

	/**
	 * Set the start record format.
	 *
	 * @param SkiDataStartRecordFormatEntity $startRecordFormat The start record format.
	 * @return AbstractSkiDataParser Returns the SkiData parser.
	 */
	public final function setStartRecordFormat(SkiDataStartRecordFormatEntity $startRecordFormat) {
		$this->startRecordFormat = $startRecordFormat;
		return $this;
	}

}
