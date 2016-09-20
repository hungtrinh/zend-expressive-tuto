'use strict';

const webdriver = require('selenium-webdriver');
const Capabilities = require('selenium-webdriver/lib/capabilities').Capabilities;
const capabilities = Capabilities.firefox().set('marionette', true);
const test = require('tape');
const browser = new webdriver.Builder()
    .withCapabilities(capabilities)
    .build();


test('visit /album will show list album page', assert => {
    browser.get('http://localhost:8081/album');
    browser.getTitle().then(
        (title) => {
            const expected = 'Hello hung - zend-expressive';
            const actual = title;
            assert.equal(actual, expected);
            assert.end();
        }
    );
    browser.quit();
});