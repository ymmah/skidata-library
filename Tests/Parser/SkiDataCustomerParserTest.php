<?php

/*
 * This file is part of the skidata-library package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Library\SkiData\Tests\Parser;

use DateTime;
use PHPUnit_Framework_TestCase;
use WBW\Library\SkiData\Entity\SkiDataCustomerEntity;
use WBW\Library\SkiData\Parser\SkiDataCustomerParser;

/**
 * SkiData customer parser test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Library\SkiData\Tests\Parser
 * @final
 */
final class SkiDataCustomerParserTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests the parseEntity() method.
	 *
	 * @return void
	 */
	public function testParseEntity() {

		$obj = new SkiDataCustomerEntity();
		$obj->setCustomerNumber(123456789);
		$obj->setTitle("title");
		$obj->setSurname("surname");
		$obj->setFirstname("firstname");
		$obj->setStreet("street");
		$obj->setPCode("pCode");
		$obj->setCity("city");
		$obj->setCountry("abc");
		$obj->setTaxCode("taxCode");
		$obj->setIdDocumentNo("idDocumentNo");
		$obj->setTelephone("telephone");
		$obj->setRentalAgreementNo("rentalAgreementNo");
		$obj->setBeginDate(new DateTime("2017-09-21 10:30:00"));
		$obj->setTerminationDate(new DateTime("2017-09-30 10:30:00"));
		$obj->setDeposit(123456);
		$obj->setMaximumLevel(1234);
		$obj->setRemarks("remarks");
		$obj->setDatetimeLastModification(new DateTime("2017-09-21 10:35:00"));
		$obj->setBlocked(false);
		$obj->setBlockedDate(null);
		$obj->setDeletedRecord(false);
		$obj->setTicketReturnAllowed(true);
		$obj->setGroupCounting(true);
		$obj->setEntryMaxLevelAllowed(false);
		$obj->setMaxLevelCarPark(true);
		$obj->setRemarks2("remarks2");
		$obj->setRemarks3("remarks3");
		$obj->setDivision("division");
		$obj->setEmail("email");
		$obj->setCountingNeutralCards(false);
		$obj->setNationality("abc");
		$obj->setAccountingNumber("accountingNumber");

		$res = '123456789;"title";"surname";"firstname";"street";"pCode";"city";"abc";"taxCode";"idDocumentNo";"telephone";"rentalAgreementNo";20170921;20170930;000000123456;1234;"remarks";20170921 103500;0;;0;1;1;0;1;"remarks2";"remarks3";"division";"email";0;"abc";"accountingNumber"';
		$this->assertEquals($res, (new SkiDataCustomerParser())->parseEntity($obj));
	}

	/**
	 * Tests the parseLine() method.
	 *
	 * @return void
	 */
	public function testParseLine() {

		$obj = '123456789;"title";"surname";"firstname";"street";"pCode";"city";"abc";"taxCode";"idDocumentNo";"telephone";"rentalAgreementNo";20170921;20170930;000000123456;1234;"remarks";20170921 103500;0;;0;1;1;0;1;"remarks2";"remarks3";"division";"email";0;"abc";"accountingNumber"';

		$res = (new SkiDataCustomerParser())->parseLine($obj);
		$this->assertEquals(123456789, $res->getCustomerNumber());
		$this->assertEquals("title", $res->getTitle());
		$this->assertEquals("surname", $res->getSurname());
		$this->assertEquals("firstname", $res->getFirstname());
		$this->assertEquals("street", $res->getStreet());
		$this->assertEquals("pCode", $res->getPCode());
		$this->assertEquals("city", $res->getCity());
		$this->assertEquals("abc", $res->getCountry());
		$this->assertEquals("taxCode", $res->getTaxCode());
		$this->assertEquals("idDocumentNo", $res->getIdDocumentNo());
		$this->assertEquals("telephone", $res->getTelephone());
		$this->assertEquals("rentalAgreementNo", $res->getRentalAgreementNo());
		$this->assertEquals(new DateTime("2017-09-21 00:00:00"), $res->getBeginDate());
		$this->assertEquals(new DateTime("2017-09-30 00:00:00"), $res->getTerminationDate());
		$this->assertEquals(123456, $res->getDeposit());
		$this->assertEquals(1234, $res->getMaximumLevel());
		$this->assertEquals("remarks", $res->getRemarks());
		$this->assertEquals(new DateTime("2017-09-21 10:35:00"), $res->getDatetimeLastModification());
		$this->assertEquals(false, $res->getBlocked());
		$this->assertEquals(null, $res->getBlockedDate());
		$this->assertEquals(false, $res->getDeletedRecord());
		$this->assertEquals(true, $res->getTicketReturnAllowed());
		$this->assertEquals(true, $res->getGroupCounting());
		$this->assertEquals(false, $res->getEntryMaxLevelAllowed());
		$this->assertEquals(true, $res->getMaxLevelCarPark());
		$this->assertEquals("remarks2", $res->getRemarks2());
		$this->assertEquals("remarks3", $res->getRemarks3());
		$this->assertEquals("division", $res->getDivision());
		$this->assertEquals("email", $res->getEmail());
		$this->assertEquals(false, $res->getCountingNeutralCards());
		$this->assertEquals("abc", $res->getNationality());
		$this->assertEquals("accountingNumber", $res->getAccountingNumber());
	}

}
