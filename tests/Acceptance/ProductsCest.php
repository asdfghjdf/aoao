<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class ProductsCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/index.php');
    }

    // tests
    public function create(AcceptanceTester $I)
    {
        $I->click("Добавить товар");
        $I->fillField("name", "asd");
        $I->fillField("price", "123");
        $I->fillField("article", "001");
        $I->click("Добавить");
        $I->canSee("asd");
        $I->canSee("123");
        $I->canSee("001");
    }

    public function update(AcceptanceTester $I)
    {
        $I->click("Изменить");
        $I->fillField("name", "qwe");
        $I->fillField("price", "321");
        $I->fillField("article", "002");
        $I->click("Изменить");
        $I->canSee("qwe");
        $I->canSee("321");
        $I->canSee("002");
    }
    public function delete(AcceptanceTester $I)
    {
        $I->click("Удалить");
        $I->dontSee("qwe");
        $I->dontSee("321");
        $I->dontSee("002");
    }
}
