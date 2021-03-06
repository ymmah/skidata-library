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

use WBW\Library\Core\Utility\BooleanUtility;
use WBW\Library\SkiData\Entity\SkiDataCustomerEntity;

/**
 * SkiData customer parser.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Parser
 * @final
 */
final class SkiDataCustomerParser extends AbstractSkiDataParser {

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Parse a SkiData customer entity.
	 *
	 * @param SkiDataCustomerEntity $entity The SkiData customer entity.
	 * @return string Returns the parsed SkiData customer entity.
	 */
	public function parseEntity(SkiDataCustomerEntity $entity) {

		// Initialise the output.
		$output = [];

		$output[]	 = $this->encodeInteger($entity->getCustomerNumber(), 9);
		$output[]	 = $this->encodeString($entity->getTitle(), 10);
		$output[]	 = $this->encodeString($entity->getSurname(), 25);
		$output[]	 = $this->encodeString($entity->getFirstname(), 25);
		$output[]	 = $this->encodeString($entity->getStreet(), 25);
		$output[]	 = $this->encodeString($entity->getPCode(), 10);
		$output[]	 = $this->encodeString($entity->getCity(), 25);
		$output[]	 = $this->encodeString($entity->getCountry(), 3);
		$output[]	 = $this->encodeString($entity->getTaxCode(), 16);
		$output[]	 = $this->encodeString($entity->getIdDocumentNo(), 15);
		$output[]	 = $this->encodeString($entity->getTelephone(), 20);
		$output[]	 = $this->encodeString($entity->getRentalAgreementNo(), 20);
		$output[]	 = $this->encodeDate($entity->getBeginDate());
		$output[]	 = $this->encodeDate($entity->getTerminationDate());
		$output[]	 = $this->encodeInteger($entity->getDeposit(), 12);
		$output[]	 = $this->encodeInteger($entity->getMaximumLevel(), 4);
		$output[]	 = $this->encodeString($entity->getRemarks(), 50);
		$output[]	 = $this->encodeDateTime($entity->getDatetimeLastModification());
		$output[]	 = $this->encodeBoolean($entity->getBlocked());
		$output[]	 = $this->encodeDate($entity->getBlockedDate());
		$output[]	 = $this->encodeBoolean($entity->getDeletedRecord());
		$output[]	 = $this->encodeBoolean($entity->getTicketReturnAllowed());
		$output[]	 = $this->encodeBoolean($entity->getGroupCounting());
		$output[]	 = $this->encodeBoolean($entity->getEntryMaxLevelAllowed());
		$output[]	 = $this->encodeBoolean($entity->getMaxLevelCarPark());
		$output[]	 = $this->encodeString($entity->getRemarks2(), 50);
		$output[]	 = $this->encodeString($entity->getRemarks3(), 50);
		$output[]	 = $this->encodeString($entity->getDivision(), 25);
		$output[]	 = $this->encodeString($entity->getEmail(), 120);
		$output[]	 = $this->encodeBoolean($entity->getCountingNeutralCards());
		$output[]	 = $this->encodeString($entity->getNationality(), 3);
		$output[]	 = $this->encodeString($entity->getAccountingNumber(), 20);

		// Return the output.
		return implode(";", $output);
	}

	/**
	 * Parse a line.
	 *
	 * @param string $line The line.
	 * @return SkiDataCustomerEntity Returns a SkiData customer entity.
	 */
	public function parseLine($line) {

		// Split the line.
		$data	 = explode(";", $line);
		$i		 = 0;

		// Initialize the entity.
		$entity = new SkiDataCustomerEntity();

		$entity->setCustomerNumber($this->decodeInteger($data[$i++]));
		$entity->setTitle($this->decodeString($data[$i++]));
		$entity->setSurname($this->decodeString($data[$i++]));
		$entity->setFirstname($this->decodeString($data[$i++]));
		$entity->setStreet($this->decodeString($data[$i++]));
		$entity->setPCode($this->decodeString($data[$i++]));
		$entity->setCity($this->decodeString($data[$i++]));
		$entity->setCountry($this->decodeString($data[$i++]));
		$entity->setTaxCode($this->decodeString($data[$i++]));
		$entity->setIdDocumentNo($this->decodeString($data[$i++]));
		$entity->setTelephone($this->decodeString($data[$i++]));
		$entity->setRentalAgreementNo($this->decodeString($data[$i++]));
		$entity->setBeginDate($this->decodeDate($data[$i++]));
		$entity->setTerminationDate($this->decodeDate($data[$i++]));
		$entity->setDeposit($this->decodeInteger($data[$i++]));
		$entity->setMaximumLevel($this->decodeInteger($data[$i++]));
		$entity->setRemarks($this->decodeString($data[$i++]));
		$entity->setDatetimeLastModification($this->decodeDateTime($data[$i++]));
		$entity->setBlocked(BooleanUtility::parseString($data[$i++]));
		$entity->setBlockedDate($this->decodeDate($data[$i++]));
		$entity->setDeletedRecord(BooleanUtility::parseString($data[$i++]));
		$entity->setTicketReturnAllowed(BooleanUtility::parseString($data[$i++]));
		$entity->setGroupCounting(BooleanUtility::parseString($data[$i++]));
		$entity->setEntryMaxLevelAllowed(BooleanUtility::parseString($data[$i++]));
		$entity->setMaxLevelCarPark(BooleanUtility::parseString($data[$i++]));
		$entity->setRemarks2($this->decodeString($data[$i++]));
		$entity->setRemarks3($this->decodeString($data[$i++]));
		$entity->setDivision($this->decodeString($data[$i++]));
		$entity->setEmail($this->decodeString($data[$i++]));
		$entity->setCountingNeutralCards(BooleanUtility::parseString($data[$i++]));
		$entity->setNationality($this->decodeString($data[$i++]));
		$entity->setAccountingNumber($this->decodeString($data[$i++]));

		// Return the entity.
		return $entity;
	}

}
