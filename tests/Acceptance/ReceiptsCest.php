<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class ReceiptsCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function createProduct(AcceptanceTester $I)
    {
        $I->amOnPage("/");
        $I->click("Добавить товар");
        $I->fillField("name", "asd");
        $I->fillField("price", "123");
        $I->fillField("article", "001");
        $I->click("Добавить");
        $I->canSee("asd");
        $I->canSee("123");
        $I->canSee("001");
    }
    public function createReceipt(AcceptanceTester $I)
    {
        $I->amOnPage("/entrance/");
        $I->click("Добавить");
        $I->fillField("date", "20122024");
        $I->selectOption("product_id", "asd");
        $I->fillField("amount", "100");
        $I->click("Добавить");
        $I->canSee("asd");
        $I->canSee("100");
        $I->canSee("2024-12-20 00:00:00");
    }
    public function updateReceipt(AcceptanceTester $I)
    {
        $I->amOnPage("/entrance/");
        $I->click("Изменить");
        $I->fillField("date", "21122024");
        $I->fillField("amount", "111");
        $I->click("Изменить");
        $I->canSee("asd");
        $I->canSee("111");
        $I->canSee("2024-12-21 00:00:00");
    }
    public function deleteReceipt(AcceptanceTester $I)
    {
        $I->amOnPage("/entrance/");
        $I->click("Удалить");
        $I->dontSee("asd");
        $I->dontSee("111");
        $I->dontSee("2024-12-21 00:00:00");
    }
}
